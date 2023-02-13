<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\VersionOne\Farm;
use App\Models\VersionOne\Farmer;
use App\Models\VersionOne\FarmerCultivationDetail;
use App\Models\VersionOne\Group;
use App\Models\VersionOne\GroupAdministrator;
use App\Models\VersionOne\GroupMember;
use App\Models\VersionOne\Product;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Database\Factories\VersionOne\GroupFactory;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if(!app()->isProduction()){

            $this->call([
                ProductSeeder::class,
            ]);

            $usersFactoryTotal = 300;

            $datePeriod = CarbonPeriod::create('2018-06-14', '2023-06-20');
            $productCount = Product::count();
            $datePeriod = $datePeriod->toArray();
            $harvest_period =  CarbonPeriod::create('2022-02-15', '2024-1-30');

            $path = base_path('regions.sql');
            DB::unprepared(file_get_contents($path));
            $this->command->info('Region table seeded!');


            $this->command->info('Please wait while seed user with relationship!');

            User::factory($usersFactoryTotal)->create()->each(function (User $user) use ($datePeriod, $productCount,$harvest_period){
                $isPrimaryOwner = rand(0,1);

               $farmer = $user->farmer()->create([
                    'is_primary_owner' => $isPrimaryOwner,
                    'rent_end_date' => $isPrimaryOwner == 1 ? null
                        : $datePeriod[
                            rand(0,1800)]->format('Y-m-d') ,

                ]);

               $farmer->farms()->saveMany(Farm::factory(rand(1,3))->create([
                   'farmer_id' => $farmer->id,
               ])->each(function (Farm $farm) use($productCount,$harvest_period){

                   $harvest_period = $harvest_period->toArray();
                    $count = count($harvest_period)-1;
                    //echo $count."\n";

                    $prepareDate = $harvest_period[rand(1,$count)]->format('Y-m-d');
                    $time = strtotime($prepareDate);
                    $seedTypes = ['Hybrid seed','Local seed'];

                    $harvestDate = date('Y-m-d',  strtotime("+3 month", $time));
                    $isFuture = Carbon::parse($harvestDate)->isFuture();



                   $farm->farmerCultivationDetail()
                       ->saveMany(FarmerCultivationDetail::factory(1)->create([
                       'farmer_id' => $farm->farmer_id,
                       'farm_id' => $farm->id,
                       'product_id' => rand(1,$productCount),
                       //'last_harvest' => rand(20,300),
                       'expected_harvest' => rand(50,300),
                       'harvest' => $isFuture ? 0 : rand(40,370),
                       'prepare_date' => $prepareDate,
                       'plantation_date' => date('Y-m-d',  strtotime("+1 month", $time)),
                       'fertilizer_implementation_date' => date('Y-m-d',  strtotime("+2 month", $time)),
                       'harvest_date' => $harvestDate,
                       'is_have_irrigation_system' => rand(0,1),
                       'is_first_time' => rand(0,1),
                       'is_having_agriculture_skills' => rand(0,1),
                       'is_needs_loan' => rand(0,1),
                       'is_already_have_loan' => rand(0,1),
                       'is_have_disaster_history' => rand(0,1),
                       'is_using_fertilizer' =>  $isFuture ? 0 : rand(0,1),
                       'last_seed_type_used' => $seedTypes[rand(0,1)],
                   ]));
               }));
            });
            $this->command->info('User seeded!');

            Group::factory(10)->create()->each(function (Group $group){
                GroupAdministrator::create([
                   'user_id' => $group->created_by,
                   'group_id' => $group->id,
                   'updated_by'=>$group->id,
                ]);

                $group->groupMembers()
                    ->saveMany(GroupMember::factory(rand(30,45))->make());

            });

             $this->command->info('Group Seeded!');

             User::whereId(1)->update([
                 'email' => 'admin@mail.com',
                 'first_name' => 'System',
                 'last_name' => 'Admin',
                 'phone_number' => '255764272050',
                 'token' => '7682-8050',
                 'gender' => 'male',
             ]);
             $this->command->info('Update user email to admin@mail.com Successful!');


        }else{
            $this->command->info('Nothing to seed app is in production state!');
        }
    }
}

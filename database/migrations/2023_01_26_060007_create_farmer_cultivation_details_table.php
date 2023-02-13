<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmer_cultivation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\VersionOne\Farmer::class);
            $table->foreignIdFor(\App\Models\VersionOne\Farm::class);
            $table->foreignIdFor(\App\Models\User::class,'updated_by')->nullable();
            $table->foreignIdFor(\App\Models\VersionOne\Product::class);
            $table->date('prepare_date');
            $table->date('plantation_date');
            $table->date('fertilizer_implementation_date');
            $table->date('harvest_date');
            $table->double('expected_harvest');/*in torn*/
            $table->double('harvest');/*in torn*/
            $table->boolean('is_have_irrigation_system')->default(false);
            $table->boolean('is_first_time')->default(false);
            $table->boolean('is_having_agriculture_skills')->default(false);
            $table->boolean('is_needs_loan')->default(false);
            $table->boolean('is_already_have_loan')->default(false);
            $table->boolean('is_have_disaster_history')->default(false);
            $table->boolean('is_using_fertilizer')->default(false);
            $table->string('last_seed_type_used')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmer_cultivation_details');
    }
};

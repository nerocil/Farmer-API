<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\VersionOne\FarmerCultivationDetail
 *
 * @property int $id
 * @property int $farmer_id
 * @property int $farm_id
 * @property int|null $updated_by
 * @property float $expected_harvest
 * @property string $prepare_date
 * @property string $plantation_date
 * @property string $harvest_date
 * @property int $have_irrigation_system
 * @property int $is_first_time
 * @property int $having_agriculture_skills
 * @property int $needs_loan
 * @property int $already_have_loan
 * @property int $have_disaster_history
 * @property int $using_manure
 * @property string|null $seed_type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\VersionOne\FarmerCultivationDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereAlreadyHaveLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereExpectedHarvest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereFarmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHarvestDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHaveDisasterHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHaveIrrigationSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHavingAgricultureSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsFirstTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereNeedsLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail wherePlantationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail wherePrepareDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereSeedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereUsingManure($value)
 * @mixin \Eloquent
 * @property string $product
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereProduct($value)
 * @property int $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereProductId($value)
 * @property-read \App\Models\VersionOne\Farm|null $farm
 * @property-read \App\Models\VersionOne\Farmer|null $farmer
 * @property-read User|null $updatedBy
 * @method static Builder|FarmerCultivationDetail farmerCultivationDetail()
 */
class FarmerCultivationDetail extends Model
{
    use HasFactory, AttributesTraits;
    /*
 * The AttributesTraits holds custom cast functions for columns
 * */
    use AttributesTraits;

    public function farmer(): BelongsTo
    {
        return $this->belongsTo(Farmer::class);
    }

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }



    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by')->select(['id','first_name','last_name','email']);
    }





    public function harvestDate():Attribute{
        return  $this->getMakeTimeStamp();
    }

    public function plantationDate():Attribute{
        return  $this->getMakeTimeStamp();
    }

    public function prepareDate():Attribute{
        return  $this->getMakeTimeStamp();
    }



}

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
use Illuminate\Support\Collection;

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


    public function scopeExpectedHarvest(Builder $query,Collection $farmerCultivationDetailId, string $column): Builder
    {
        return $query->whereIn('id', $farmerCultivationDetailId)
            ->selectRaw("sum($column) as subtotal ")
            ->selectRaw("harvest_date")
            ->groupByRaw("harvest_date")
            ->orderBy('harvest_date');
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

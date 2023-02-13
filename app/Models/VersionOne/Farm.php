<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Farm extends Model
{
    use HasFactory, AttributesTraits;


    public function farmerCultivationDetailWithProduct(): HasMany
    {
        return $this->hasMany(FarmerCultivationDetail::class)->with('product');
    }

    public function farmerCultivationDetail(): HasMany
    {
        return $this->hasMany(FarmerCultivationDetail::class);
    }

    public function scopeAllUniqueRegions(Builder $query): Builder
    {
        return $query->select('region_id')->distinct();
    }


}

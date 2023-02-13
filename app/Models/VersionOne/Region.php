<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Request;


class Region extends Model
{
    use HasFactory, AttributesTraits;


    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }

    public function scopeRegionsUniqueName(Builder $query, string $search = null): Builder
    {
        return $query->when($search, function (Builder $query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->select('region')->distinct();
    }


    public function scopeHasFarms(Builder $query, string $regionName): Builder
    {
        return $query->whereHas('farms')->where('region', $regionName);
    }


    public function scopeRegionsHasFarm(Builder $query, string $regionName, string $productName): Builder
    {
        return $query->whereHas('farms')
            ->join('farms', 'farms.region_id', '=', 'regions.id')
            ->join('farmer_cultivation_details', 'farms.id', '=', 'farmer_cultivation_details.farm_id')
            ->join('products', 'products.id', '=', 'farmer_cultivation_details.product_id')
            ->select([
                'regions.id as regions_id',
                'region', 'farms.farm_size',
                'farms.id as farms_id',
                'farmer_cultivation_details.*',
                'products.name as product_name',
            ])
            ->where('region', $regionName)->where('products.name', $productName);
    }

    public function scopeRegions(Builder $query, string $search = null): Builder
    {
        return $query->when($search, function (Builder $query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('village_name', 'like', '%' . Request::get('search') . '%');
        });
    }
}


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


/**
 * App\Models\VersionOne\Region
 *
 * @property int $id
 * @property string $region
 * @property string $local_government_name
 * @property string $ward_name
 * @property string $village_name
 * @property string $full_hierarchy
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $status
 * @property string|null $deleted_at
 * @method static \Database\Factories\VersionOne\RegionFactory factory(...$parameters)
 * @method static Builder|Region newModelQuery()
 * @method static Builder|Region newQuery()
 * @method static Builder|Region query()
 * @method static Builder|Region regions(?string $search = null)
 * @method static Builder|Region regionsUniqueName(?string $search = null)
 * @method static Builder|Region whereCreatedAt($value)
 * @method static Builder|Region whereDeletedAt($value)
 * @method static Builder|Region whereFullHierarchy($value)
 * @method static Builder|Region whereId($value)
 * @method static Builder|Region whereLocalGovernmentName($value)
 * @method static Builder|Region whereRegion($value)
 * @method static Builder|Region whereStatus($value)
 * @method static Builder|Region whereUpdatedAt($value)
 * @method static Builder|Region whereVillageName($value)
 * @method static Builder|Region whereWardName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\Farm[] $farms
 * @property-read int|null $farms_count
 * @method static Builder|Region regionsHasFarm(string $regionName)
 * @property-read int|null $farmer_cultivation_detail_count
 * @method static Builder|Region hasFarms(string $regionName)
 */
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
        return $query->whereHas('farms')
            ->with(['farms' => function ($query) {
                $query->with(['farmerCultivationDetail' => function ( $query) {
                    $query->with(['product']);
                }]);
            }])
            ->where('region', $regionName);
    }


    public function scopeRegionsHasFarm(Builder $query, string $regionName): Builder
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
            ->where('region', $regionName);
    }

    public function scopeRegions(Builder $query, string $search = null): Builder
    {
        return $query->when($search, function (Builder $query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('village_name', 'like', '%' . Request::get('search') . '%');
        });
    }
}


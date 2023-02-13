<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\VersionOne\Farm
 *
 * @property int $id
 * @property int $farmer_id
 * @property int $region_id
 * @property float $farm_size
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read int|null $farmer_cultivation_detail_count
 * @method static \Database\Factories\VersionOne\FarmFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereFarmSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farm whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static Builder|Farm allUniqueRegions()
 * @property-read \App\Models\VersionOne\Product|null $product
 * @property-read \App\Models\VersionOne\FarmerCultivationDetail|null $farmerCultivationDetail
 */
class Farm extends Model
{
    use HasFactory, AttributesTraits;

    public function farmerCultivationDetail(): HasMany
    {
        return $this->hasMany(FarmerCultivationDetail::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeAllUniqueRegions(Builder $query): Builder
    {
        return $query->select('region_id')->distinct();
    }


}

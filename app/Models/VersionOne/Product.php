<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

/**
 * App\Models\VersionOne\Product
 *
 * @property int $id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\VersionOne\ProductFactory factory(...$parameters)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product products(?string $search = null)
 * @method static Builder|Product query()
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereCreatedBy($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product whereStatus($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static Builder|Product whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 * @property-read User|null $createdBy
 * @property-read User|null $updatedBy
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;
    /*
     * The AttributesTraits holds custom cast functions for columns
     * */
    use AttributesTraits;

    protected $guarded = [];


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->select(['id','first_name','last_name','email']);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by')->select(['id','first_name','last_name','email']);
    }

    public function scopeProducts(Builder $query, string $search = null): Builder
    {
        return $query->when($search,function (Builder $query) use ($search){
            $query->where('name','like','%'.$search.'%');
        });
    }
}

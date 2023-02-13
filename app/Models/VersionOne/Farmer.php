<?php

namespace App\Models\VersionOne;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\VersionOne\Farmer
 *
 * @property int $id
 * @property int $user_id
 * @property int $is_primary_owner
 * @property string|null $rent_end_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\Farm[] $farms
 * @property-read int|null $farms_count
 * @method static \Database\Factories\VersionOne\FarmerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereIsPrimaryOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereRentEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Farmer whereUserId($value)
 * @mixin \Eloquent
 */
class Farmer extends Model
{
    use HasFactory;

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}

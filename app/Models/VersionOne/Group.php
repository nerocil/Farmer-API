<?php

namespace App\Models\VersionOne;

use App\Models\AttributesTraits;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Request;

/**
 * App\Models\VersionOne\Group
 *
 * @property int $id
 * @property int $created_by
 * @property int|null $updated_by
 * @property string $name
 * @property string $profile_icon
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\GroupMember[] $groupMembers
 * @property-read int|null $group_members_count
 * @property-read User|null $updatedBy
 * @method static \Database\Factories\VersionOne\GroupFactory factory(...$parameters)
 * @method static Builder|Group groups(?string $search = null)
 * @method static Builder|Group newModelQuery()
 * @method static Builder|Group newQuery()
 * @method static \Illuminate\Database\Query\Builder|Group onlyTrashed()
 * @method static Builder|Group query()
 * @method static Builder|Group whereCreatedAt($value)
 * @method static Builder|Group whereCreatedBy($value)
 * @method static Builder|Group whereDeletedAt($value)
 * @method static Builder|Group whereId($value)
 * @method static Builder|Group whereName($value)
 * @method static Builder|Group whereProfileIcon($value)
 * @method static Builder|Group whereStatus($value)
 * @method static Builder|Group whereUpdatedAt($value)
 * @method static Builder|Group whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Group withoutTrashed()
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory, SoftDeletes;
    /*
     * The AttributesTraits holds custom cast functions for columns
     * */
    use AttributesTraits;

    protected $guarded = [];

    public function groupMembers(): HasMany
    {
        return $this->hasMany(GroupMember::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->select(['id','first_name','last_name','email']);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by')->select(['id','first_name','last_name','email']);
    }

    function profileIcon():Attribute{
        return Attribute::make(get: fn($value) => route('group.avatar',$value) );
    }

    public function scopeGroups(Builder $query, string $search=null): Builder
    {
        return $query->with(['createdBy','updatedBy'])
            ->when($search,function (Builder $query) use ($search){
            return $query->where('name', 'like', '%'. $search .'%');
        });
    }


}

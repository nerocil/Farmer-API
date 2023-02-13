<?php

namespace App\Models\VersionOne;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VersionOne\GroupAdministrator
 *
 * @property int $id
 * @property int $user_id
 * @property int $group_id
 * @property int|null $updated_by
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\VersionOne\GroupAdministratorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupAdministrator whereUserId($value)
 * @mixin \Eloquent
 */
class GroupAdministrator extends Model
{
    use HasFactory;
}

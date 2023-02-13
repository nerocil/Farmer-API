<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string|null $profile_image
 * @property string $phone_number
 * @property string|null $token
 * @property string|null $token_date_valid
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\VersionOne\Farmer|null $farmer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenDateValid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\FarmerCultivationDetail[] $farmerCultivationDetail
 * @property-read int|null $farmer_cultivation_detail_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\FarmerCultivationDetail[] $farmerCultivationDetailWithProduct
 * @property-read int|null $farmer_cultivation_detail_with_product_count
 * @method static \Illuminate\Database\Eloquent\Builder|Farm allUniqueRegions()
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
 */
	class Farm extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 */
	class Farmer extends \Eloquent {}
}

namespace App\Models\VersionOne{
/**
 * App\Models\VersionOne\FarmerCultivationDetail
 *
 * @property int $id
 * @property int $farmer_id
 * @property int $farm_id
 * @property int|null $updated_by
 * @property int $product_id
 * @property string $prepare_date
 * @property string $plantation_date
 * @property string $fertilizer_implementation_date
 * @property string $harvest_date
 * @property float $expected_harvest
 * @property float $harvest
 * @property int $is_have_irrigation_system
 * @property int $is_first_time
 * @property int $is_having_agriculture_skills
 * @property int $is_needs_loan
 * @property int $is_already_have_loan
 * @property int $is_have_disaster_history
 * @property int $is_using_fertilizer
 * @property string|null $last_seed_type_used
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\VersionOne\Farm|null $farm
 * @property-read \App\Models\VersionOne\Farmer|null $farmer
 * @property-read \App\Models\VersionOne\Product|null $product
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail expectedHarvest(\Illuminate\Support\Collection $farmerCultivationDetailId, string $column)
 * @method static \Database\Factories\VersionOne\FarmerCultivationDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereExpectedHarvest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereFarmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereFarmerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereFertilizerImplementationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHarvest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereHarvestDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsAlreadyHaveLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsFirstTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsHaveDisasterHistory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsHaveIrrigationSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsHavingAgricultureSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsNeedsLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereIsUsingFertilizer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereLastSeedTypeUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail wherePlantationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail wherePrepareDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FarmerCultivationDetail whereUpdatedBy($value)
 */
	class FarmerCultivationDetail extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\GroupMember[] $groupMembers
 * @property-read int|null $group_members_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Database\Factories\VersionOne\GroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Group groups(?string $search = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Query\Builder|Group onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereProfileIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Group withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Group withoutTrashed()
 */
	class Group extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 */
	class GroupAdministrator extends \Eloquent {}
}

namespace App\Models\VersionOne{
/**
 * App\Models\VersionOne\GroupMember
 *
 * @property int $id
 * @property int $user_id
 * @property int $group_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Database\Factories\VersionOne\GroupMemberFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUserId($value)
 */
	class GroupMember extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Database\Factories\VersionOne\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product products(?string $search = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models\VersionOne{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VersionOne\Farm[] $farms
 * @property-read int|null $farms_count
 * @method static \Database\Factories\VersionOne\RegionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Region hasFarms(string $regionName)
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region regions(?string $search = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Region regionsHasFarm(string $regionName, string $productName)
 * @method static \Illuminate\Database\Eloquent\Builder|Region regionsUniqueName(?string $search = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereFullHierarchy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereLocalGovernmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereVillageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereWardName($value)
 */
	class Region extends \Eloquent {}
}


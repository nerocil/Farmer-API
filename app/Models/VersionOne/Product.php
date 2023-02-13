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

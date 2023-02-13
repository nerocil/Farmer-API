<?php

namespace App\Models\VersionOne;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farmer extends Model
{
    use HasFactory;

    public function farms(): HasMany
    {
        return $this->hasMany(Farm::class);
    }
}

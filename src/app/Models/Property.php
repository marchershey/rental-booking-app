<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }

    /**
     * Get the photos for the property.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}

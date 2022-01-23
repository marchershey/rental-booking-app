<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [];

    /**
     * Get the photos for the property.
     */
    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('slot');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}

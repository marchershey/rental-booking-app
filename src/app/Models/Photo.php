<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public static function removeTempPhotos()
    {
        $storage = Storage::disk('local');

        foreach($storage->allFiles('temp') as $file){
            $hourAgo = now()->subMinute()->timestamp;
            if($storage->lastModified($file) < $hourAgo){
                $storage->delete($file);
            }
        }
    }
}

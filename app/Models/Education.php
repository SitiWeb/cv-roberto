<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Education extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'education';
    protected $fillable = [
        'opleiding',
        'instituut',
        'startdatum',
        'einddatum',
        'beschrijving',
    ];
}

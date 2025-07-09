<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class WorkExperience extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'werkgever',
        'functie',
        'startdatum',
        'einddatum',
        'beschrijving',
    ];

    public function image()
    {
        return $this->getFirstMedia('image');
    }

    public function imageUrl()
    {
        return $this->image() ? $this->image()->getUrl() : null;
    }

    // Als je mediaconversies of image handling wil: hier kun je die later toevoegen
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Skill extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['title', 'description', 'rating', 'type'];

    public function image()
    {
        return $this->getFirstMedia('image');
    }
    public function imageUrl()
    {
        return $this->image() ? $this->image()->getUrl() : null;
    }
}

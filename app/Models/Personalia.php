<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personalia extends Model
{
    protected $fillable = ['key', 'value', 'hidden', 'icon'];
    protected $table = 'personalia';
    protected $casts = [
        'hidden' => 'boolean',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    use HasFactory;

    protected $fillable = [
        'slideshow_image',
        'mobile_slideshow_image',
        'caption',
        'body',
        'uploaded_by'
    ];
}

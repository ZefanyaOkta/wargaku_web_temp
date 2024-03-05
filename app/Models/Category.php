<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'link',
        'type',
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : url('images/logo/wargaku_photo.png');
    }
}

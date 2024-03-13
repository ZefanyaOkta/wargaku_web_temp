<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'image',
        'link',
        'status',
        'auth_method',
        'auth_parameter',
    ];

    public function getImageAttribute($value)
    {
        return $value ? asset('storage/' . $value) : url('images/logo/wargaku_photo.png');
    }
}




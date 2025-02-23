<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = ['brand_name', 'brand_img'];
}

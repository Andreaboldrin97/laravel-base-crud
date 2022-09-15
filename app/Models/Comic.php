<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = array('title', 'description', 'image_url', 'price', 'series', 'sale_data', 'type');
}

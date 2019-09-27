<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'categories_Name', 'categories_description', 'isActive',
    ];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    // protected $fillable = [
    //     'item_id', 'product_name', 'category_id','isActive','main_image_path','product_description'
    // ];

    public $timestamps = false;
}

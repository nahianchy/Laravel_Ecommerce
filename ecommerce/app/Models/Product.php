<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];


    // protected $fillable = [
    //     'brand_id',
    //     'category_id',
    //     'subcategory_id',
    //     'subsubcategory_id',
    //     'product_name_en',
    //     'product_name_bn',
    //     'product_slug_en',
    //     'product_slug_bn',
    //     'product_qty',
    //     'product_tags_en',
    //     'product_tags_bn',
    //     'product_color_en',
    //     'product_color_bn',
    //     'selling_price',
    //     'discount_price',
    //     'short_descp_en',
    //     'short_descp_bn',
    //     'long_descp_en',
    //     'long_descp_bn',
    //     'product_thumbnail',
    //     'hot_deals',
    //     'featured',
    //     'special_offer',
    //     'special_deals',
    //     'status',
    // ];
}

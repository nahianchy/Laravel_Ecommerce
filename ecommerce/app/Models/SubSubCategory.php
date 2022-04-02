<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'subsubcategory_name_en',
        'subsubcategory_name_bn',
        'subsubcategory_slug_en',
        'subsubcategory_slug_bn',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subCategories()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }
}

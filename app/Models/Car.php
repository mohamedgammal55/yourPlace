<?php

namespace App\Models;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }//end fun

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }//end fun

    public function data()
    {
        return $this->hasMany(CarData::class,'car_id')->orderBy('id','ASC');
    }//end fun

    public function images()
    {
        return $this->hasMany(CarImages::class,'car_id');
    }//end fun


    public function owner()
    {
        return $this->belongsTo(Admin::class,'added_by');
    }//end fun

}//end class

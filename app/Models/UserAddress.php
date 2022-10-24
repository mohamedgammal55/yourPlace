<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $guarded = [];
    public $timestamps =false;
    protected $table = 'user_addresses';
}

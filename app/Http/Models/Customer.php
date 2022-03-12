<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $table = 'customers';
    protected $fillable = ['customer_name','email','phone','address'];

    public function lucky_number()
    {
        return $this->hasMany('App\Http\Models\Lucky_Number', 'customer_id');
    }
}

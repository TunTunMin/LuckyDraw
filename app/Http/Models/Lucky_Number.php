<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lucky_Number extends Model
{
    use SoftDeletes;
    protected $table = 'lucky_numbers';
    protected $fillable = ['lucky_number','customer_id'];
}

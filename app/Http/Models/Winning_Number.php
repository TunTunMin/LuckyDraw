<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Winning_Number extends Model
{
    use softDeletes;
    protected $table = 'winning_numbers';
    protected $fillable = ['prize_id','customer_id','winning_number'];
}

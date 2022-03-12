<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prize extends Model
{
    use SoftDeletes;
    protected $table = 'prizes';
    protected $fillable = ['prize_type','prize_type_id'];
}

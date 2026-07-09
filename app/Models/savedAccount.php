<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class savedAccount extends Model
{

    protected $fillable = ['siteName','email','password','user_id'];
    /** @use HasFactory<\Database\Factories\SavedAccountFactory> */
    use HasFactory;
}

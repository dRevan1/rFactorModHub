<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mod extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'type', 'name', 'category', 'description', 'thumbnail', 'downloads', 'likes'];
}

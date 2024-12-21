<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Track extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'name', 'description', 'thumbnail', 'downloads', 'likes'];
}

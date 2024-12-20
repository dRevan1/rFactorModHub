<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Other extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'name', 'category', 'description', 'downloads', 'likes'];
}

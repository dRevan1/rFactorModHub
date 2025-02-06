<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setup extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'name', 'description', 'vehicle', 'track', 'likes', 'downloads'];
}
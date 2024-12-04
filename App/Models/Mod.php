<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mod extends Model
{

    use HasFactory;
    protected $primaryKey = ['login', 'name'];
    protected $fillable = ['login', 'name', 'creation_date', 'update_date', 'description', 'downloads', 'likes'];
}

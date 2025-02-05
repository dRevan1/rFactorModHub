<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = ['author', 'name', 'description', 'thumbnail', 'mod_count'];

    public function collections() {
        return $this->belongsToMany(Mod::class);
    }
}
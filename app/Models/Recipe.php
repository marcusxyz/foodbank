<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'recipe_steps',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function user()
    // {
    //     return $this->hasOne(User::class);
    // }
}

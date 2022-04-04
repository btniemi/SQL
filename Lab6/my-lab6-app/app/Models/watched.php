<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class watched extends Model
{
    use HasFactory;

    protected $guarded = ['peopleId', 'movieId',];

    protected $fillable = [
        'stars',
        'comments',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;

    protected $guarded = ['peopleId', 'movieId',];

    protected $table = 'watched';

    protected $fillable = [
        'stars',
        'comments',
    ];

//this creates the relationship for the watched to the other tables needed
    public function getPerson()
    {
        return $this->belongsTo(Person::class, 'people_id', 'id');
    }

    public function getMovie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
}

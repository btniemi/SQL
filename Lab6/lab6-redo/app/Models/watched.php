<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class watched extends Model
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
        return $this->belongsTo(people::class, 'peopleId', 'id');
    }

    public function getMovie(){
        return $this->belongsTo(movies::class, 'movieId', 'id');
    }

}

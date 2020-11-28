<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(Movie::class);
    }

    protected $fillable = [
        'user_id',
        'movie_id',
        'return',
        'status',
    ];
}

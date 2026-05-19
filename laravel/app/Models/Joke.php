<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $fillable = [
        'type',
        'setup',
        'punchline',
        'origin',
    ];

    public static function randomOrFail(): ?Joke
    {
        return static::query()
            ->inRandomOrder()
            ->firstOrFail();
    }
}

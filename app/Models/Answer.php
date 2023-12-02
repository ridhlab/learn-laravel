<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Answer extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($answer) {
            $answer->{$answer->getKeyName()} = (string) Str::uuid();
        });
    }

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'content',
        'question_id',
    ];
}

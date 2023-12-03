<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'content',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($question) {
            $question->{$question->getKeyName()} = (string) Str::uuid();
        });
    }
}

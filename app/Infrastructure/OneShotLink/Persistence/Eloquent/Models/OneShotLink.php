<?php

namespace App\Infrastructure\OneShotLink\Persistence\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class OneShotLink extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['ttl', 'body'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id))
                $model->id = Str::uuid();
        });
    }
}

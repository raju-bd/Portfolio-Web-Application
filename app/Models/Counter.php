<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $table = 'counters';

    protected $fillable = [
        'type',
        'count',
        'label',
        'icon',
    ];

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type)->first();
    }

    public static function getByType($type)
    {
        return self::where('type', $type)->first();
    }
}

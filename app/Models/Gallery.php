<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'type',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeColleague($query)
    {
        return $query->where('type', 'colleague');
    }

    public function scopeScreenshot($query)
    {
        return $query->where('type', 'screenshot');
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}

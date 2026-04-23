<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
        'is_archived',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'is_archived' => 'boolean',
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeArchived($query)
    {
        return $query->where('is_archived', true);
    }

    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    public function markAsArchived()
    {
        $this->update(['is_archived' => true]);
    }
}

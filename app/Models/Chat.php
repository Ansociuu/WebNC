<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'conversation_id',
        'name',
        'email',
        'message',
        'sender_type',
        'status',
        'is_automated',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateConversationId($email)
    {
        return md5($email . date('Y-m-d'));
    }

    public function getConversation()
    {
        return Chat::where('conversation_id', $this->conversation_id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}

<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EmailMessage extends Model
{

    protected $table = 'pearlskin__email_messages';
    protected $fillable = [
        'parent_email_message_id',
        'sender_names',
        'sender_email',
        'receiver_email',
        'message_subject',
        'message_text',
        'is_read',
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function replies()
    {
        return $this->hasMany(EmailMessage::class, 'parent_email_message_id');
    }

    /**
     * Check if the post is in draft
     * @param Builder $query
     * @return bool
     */
    public function scopeParent(Builder $query)
    {
        return $query->whereParentEmailMessageId(NULL);
    }
}

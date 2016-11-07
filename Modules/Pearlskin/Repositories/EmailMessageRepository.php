<?php namespace Modules\Pearlskin\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;
use Modules\Pearlskin\Entities\EmailMessage;

interface EmailMessageRepository extends BaseRepository
{
    /**
     * Count all unread emails
     * @return int
     */
    public function countUnread();

    /**
     * Count all unread repliesForEmail
     * @param EmailMessage $emailMessage
     * @return int
     */
    public function countUnreadReplies(EmailMessage $emailMessage);
}

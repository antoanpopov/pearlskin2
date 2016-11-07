<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Pearlskin\Entities\EmailMessage;
use Modules\Pearlskin\Repositories\EmailMessageRepository;

class CacheEmailMessageDecorator extends BaseCacheDecorator implements EmailMessageRepository
{
    public function __construct(EmailMessageRepository $emailMessageRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.emailMessages';
        $this->repository = $emailMessageRepository;
    }

    public function countUnreadReplies(EmailMessage $emailMessage)
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember("{$this->locale}.{$this->entityName}.countUnreadReplies", $this->cacheTime,
                function () use ($emailMessage){
                    return $this->repository->countUnreadReplies($emailMessage);
                }
            );
    }

    /**
     * Count all unread emails
     * @return int
     */
    public function countUnread()
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember("{$this->locale}.{$this->entityName}.countUnread", $this->cacheTime,
                function () {
                    return $this->repository->countUnread();
                }
            );
    }
    /**
     * Return the latest x blog posts
     * @param int $amount
     * @return Collection
     */
    public function allParents()
    {
        return $this->cache
            ->tags([$this->entityName, 'global'])
            ->remember("{$this->locale}.{$this->entityName}.allParents", $this->cacheTime,
                function () {
                    return $this->repository->allParents();
                }
            );
    }

}

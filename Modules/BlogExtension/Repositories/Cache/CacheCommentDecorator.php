<?php

namespace Modules\BlogExtension\Repositories\Cache;

use Modules\BlogExtension\Repositories\CommentRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCommentDecorator extends BaseCacheDecorator implements CommentRepository
{
    public function __construct(CommentRepository $commentRepository)
    {
        parent::__construct();
        $this->entityName = 'comments';
        $this->repository = $commentRepository;
    }
}

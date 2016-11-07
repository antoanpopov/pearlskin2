<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\ContentBlockRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContentBlockDecorator extends BaseCacheDecorator implements ContentBlockRepository
{
    public function __construct(ContentBlockRepository $contentBlockRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.contentBlocks';
        $this->repository = $contentBlockRepository;
    }
}

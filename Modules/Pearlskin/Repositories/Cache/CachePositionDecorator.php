<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Pearlskin\Repositories\PositionRepository;

class CachePositionDecorator extends BaseCacheDecorator implements PositionRepository
{
    public function __construct(PositionRepository $positionRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.positions';
        $this->repository = $positionRepository;
    }
}

<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\ManipulationRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheManipulationDecorator extends BaseCacheDecorator implements ManipulationRepository
{
    public function __construct(ManipulationRepository $manipulation)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.manipulations';
        $this->repository = $manipulation;
    }
}

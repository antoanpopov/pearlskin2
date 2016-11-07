<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheClientDecorator extends BaseCacheDecorator implements ClientRepository
{
    public function __construct(ClientRepository $client)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.clients';
        $this->repository = $client;
    }
}

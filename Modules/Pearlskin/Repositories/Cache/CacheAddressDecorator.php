<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\AddressRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAddressDecorator extends BaseCacheDecorator implements AddressRepository
{
    public function __construct(AddressRepository $addressesRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.addresses';
        $this->repository = $addressesRepository;
    }

    public function allAddresses()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allAddresses", $this->cacheTime,
                function () {
                    return $this->repository->allAddresses();
                }
            );
    }
}

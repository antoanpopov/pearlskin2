<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\CarouselRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCarouselDecorator extends BaseCacheDecorator implements CarouselRepository
{
    public function __construct(CarouselRepository $carouselRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.carousels';
        $this->repository = $carouselRepository;
    }

    public function getCarouselsForPage()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.getCarouselForPage", $this->cacheTime,
                function () {
                    return $this->repository->getCarouselsForPage();
                }
            );
    }
}

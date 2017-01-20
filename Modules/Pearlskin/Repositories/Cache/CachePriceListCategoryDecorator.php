<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePriceListCategoryDecorator extends BaseCacheDecorator implements Repositories\PriceListCategoryRepository
{
    public function __construct(Repositories\PriceListCategoryRepository $repository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.priceListCategory';
        $this->repository = $repository;
    }


    public function findByTitleInLocale($slug, $locale)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findByTitleInLocale.{$slug}.{$locale}", $this->cacheTime,
                function () use ($slug, $locale) {
                    return $this->repository->findByTitleInLocale($slug, $locale);
                }
            );
    }
}

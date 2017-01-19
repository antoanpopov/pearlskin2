<?php namespace Modules\Pearlskin\Repositories\Cache;

use Illuminate\Database\Eloquent\Collection;
use Modules\Pearlskin\Repositories\ProcedureCategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProcedureCategoryDecorator extends BaseCacheDecorator implements ProcedureCategoryRepository
{
    public function __construct(ProcedureCategoryRepository $procedure)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.procedures';
        $this->repository = $procedure;
    }

    public function allProcedureCategories()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allProcedureCategories", $this->cacheTime,
                function () {
                    return $this->repository->allProcedureCategories();
                }
            );
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

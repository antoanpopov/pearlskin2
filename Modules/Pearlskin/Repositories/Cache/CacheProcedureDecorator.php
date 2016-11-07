<?php namespace Modules\Pearlskin\Repositories\Cache;

use Illuminate\Database\Eloquent\Collection;
use Modules\Pearlskin\Repositories\ProcedureRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProcedureDecorator extends BaseCacheDecorator implements ProcedureRepository
{
    public function __construct(ProcedureRepository $procedure)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.procedures';
        $this->repository = $procedure;
    }

    public function allProcedures()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allProcedures", $this->cacheTime,
                function () {
                    return $this->repository->allProcedures();
                }
            );
    }
}

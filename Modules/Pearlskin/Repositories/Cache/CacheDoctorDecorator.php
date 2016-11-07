<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\DoctorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDoctorDecorator extends BaseCacheDecorator implements DoctorRepository
{
    public function __construct(DoctorRepository $doctor)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.doctors';
        $this->repository = $doctor;
    }

    public function allDoctors()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.allDoctors", $this->cacheTime,
                function () {
                    return $this->repository->allDoctors();
                }
            );
    }
}

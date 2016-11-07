<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\ScheduleRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheScheduleDecorator extends BaseCacheDecorator implements ScheduleRepository
{
    public function __construct(ScheduleRepository $schedule)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.schedules';
        $this->repository = $schedule;
    }
}

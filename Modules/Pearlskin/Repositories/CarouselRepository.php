<?php namespace Modules\Pearlskin\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Core\Repositories\BaseRepository;

interface CarouselRepository extends BaseRepository
{
    
    public function getCarouselsForPage($page);
}

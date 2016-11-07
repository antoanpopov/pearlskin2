<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\Carousel;
use Modules\Pearlskin\Events\CarouselWasCreated;
use Modules\Pearlskin\Repositories\CarouselRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarouselRepository extends EloquentBaseRepository implements CarouselRepository
{
    public function create($data)
    {

        $carousel = $this->model->create($data);

        event(new CarouselWasCreated($carousel, $data));

        return $carousel;
    }

    public function getCarouselsForPage($page)
    {

        return Carousel::where('page_id','=',$page)->where('is_visible','=',1)->get();
    }

}

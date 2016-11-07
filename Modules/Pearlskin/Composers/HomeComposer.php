<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\CarouselRepository;
use Modules\Pearlskin\Repositories\ProcedureRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class HomeComposer
{

    public function __construct(CarouselRepository $carouselRepository)
    {
        $this->carouselRepository = $carouselRepository;
    }

    public function compose(View $view){
        $view->with('carousel', $this->carouselRepository);
    }

}
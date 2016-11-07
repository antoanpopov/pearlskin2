<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\DoctorRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class DoctorComposer
{

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function compose(View $view){
        $view->with('doctors', $this->doctorRepository->allDoctors());
    }

}
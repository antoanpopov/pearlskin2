<?php
namespace Modules\Pearlskin\Http\Controllers;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Pearlskin\Repositories\DoctorRepository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/25/16
 * Time: 8:56 PM
 */
class DoctorController extends BasePublicController
{
    /**
     * @var DoctorRepository
     */
    private $doctorRepository;

    /**
     * @var Application
     */
    private $application;

    public function __construct(DoctorRepository $doctorRepository, Application $application)
    {
            $this->doctorRepository = $doctorRepository;
            $this->application = $application;
            parent::__construct();
    }

    public function get($slug)
    {
        $doctor = $this->doctorRepository->findByNamesInLocale($slug, $this->locale);

        $this->throw404IfNotFound($doctor);

        return view('doctor.show', compact('doctor'));
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $doctor
     */
    private function throw404IfNotFound($doctor)
    {
        if (is_null($doctor)) {
            $this->application->abort('404');
        }
    }

}
<?php
namespace Modules\Pearlskin\Http\Controllers;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Pearlskin\Repositories\ProcedureRepository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/25/16
 * Time: 8:56 PM
 */
class ProcedureController extends BasePublicController
{
    /**
     * @var ProcedureRepository
     */
    private $procedureRepository;

    /**
     * @var Application
     */
    private $application;

    public function __construct(ProcedureRepository $procedureRepository, Application $application)
    {
            $this->procedureRepository = $procedureRepository;
            $this->application = $application;
            parent::__construct();
    }

    public function get($slug)
    {
        $procedure = $this->procedureRepository->findByTitleInLocale($slug, $this->locale);

        $this->throw404IfNotFound($procedure);

        return view('procedure.show', compact('procedure'));
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $procedure
     */
    private function throw404IfNotFound($procedure)
    {
        if (is_null($procedure)) {
            $this->application->abort('404');
        }
    }

}
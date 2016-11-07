<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\ProcedureRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class ProceduresComposer
{

    public function __construct(ProcedureRepository $procedureRepository)
    {
        $this->procedures = $procedureRepository;
    }

    public function compose(View $view){
        $view->with('procedures', $this->procedures->allProcedures());
    }

}
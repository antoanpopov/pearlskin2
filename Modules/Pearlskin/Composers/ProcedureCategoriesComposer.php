<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Entities\ProcedureCategory;
use Modules\Pearlskin\Repositories\ProcedureCategoryRepository;
use Modules\Pearlskin\Repositories\ProcedureRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class ProcedureCategoriesComposer
{

    public function __construct(ProcedureCategoryRepository $procedureCategoryRepository)
    {
        $this->procedureCategoriesRepository = $procedureCategoryRepository;
    }

    public function compose(View $view){
        $view->with('procedureCategories', $this->procedureCategoriesRepository->allProcedureCategories());
    }

}

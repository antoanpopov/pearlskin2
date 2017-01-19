<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Media\Repositories\FileRepository;
use Modules\Pearlskin\Entities\ProcedureCategory;
use Modules\Pearlskin\Repositories\ProcedureCategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProcedureCategoryController extends AdminBaseController
{
    /**
     * @var ProcedureCategoryRepository
     */
    private $procedureCategoryRepository;

    public function __construct(ProcedureCategoryRepository $procedureCategoryRepository)
    {
        parent::__construct();

        $this->procedureCategoryRepository = $procedureCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $procedureCategories = $this->procedureCategoryRepository->all();

        return view('pearlskin::admin.procedures_categories.index', compact('procedureCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.procedures_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $request->all()['created_by_user_id']= $request->user()->id;
        $request->all()['updated_by_user_id']= $request->user()->id;
        $this->procedureCategoryRepository->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::procedures.title.procedures')]));

        return redirect()->route('admin.pearlskin.procedures_categories.index');
    }


    /**
     * @param ProcedureCategory $procedureCategory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ProcedureCategory $procedureCategory)
    {
        return view('pearlskin::admin.procedures_categories.edit', compact('procedureCategory'));
    }


    public function update(ProcedureCategory $procedureCategory, Request $request)
    {
        $procedureCategory->updated_by_user_id = $request->user()->id;
        $this->procedureCategoryRepository->update($procedureCategory, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::procedures.title.procedures')]));

        return redirect()->route('admin.pearlskin.procedures_categories.index');
    }


    /**
     * @param ProcedureCategory $procedureCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(ProcedureCategory $procedureCategory)
    {
        $this->procedureCategoryRepository->destroy($procedureCategory);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::procedures_categories.title.procedures categories')]));

        return redirect()->route('admin.pearlskin.procedures_categories.index');
    }
}

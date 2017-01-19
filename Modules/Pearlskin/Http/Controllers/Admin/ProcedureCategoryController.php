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
        $procedures = $this->procedureCategoryRepository->all();

        return view('pearlskin::admin.procedures_categories.index', compact('procedures'));
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
     * @param ProcedureCategory $procedure
     * @param FileRepository $fileRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ProcedureCategory $procedure, FileRepository $fileRepository)
    {
        $image = $fileRepository->findFileByZoneForEntity('image', $procedure);
        return view('pearlskin::admin.procedures_categories.edit', compact('procedure_category', 'image'));
    }


    public function update(ProcedureCategory $procedureCategory, Request $request)
    {
        $procedureCategory->updated_by_user_id = $request->user()->id;
        $this->procedureCategoryRepository->update($procedureCategory, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::procedures.title.procedures')]));

        return redirect()->route('admin.pearlskin.procedure.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Procedure $procedure
     * @return Response
     */
    public function destroy(Procedure $procedure)
    {
        $this->procedure->destroy($procedure);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::procedures.title.procedures')]));

        return redirect()->route('admin.pearlskin.procedure.index');
    }
}

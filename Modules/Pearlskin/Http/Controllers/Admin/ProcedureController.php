<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Media\Repositories\FileRepository;
use Modules\Pearlskin\Entities\Procedure;
use Modules\Pearlskin\Repositories\ProcedureRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProcedureController extends AdminBaseController
{
    /**
     * @var ProcedureRepository
     */
    private $procedure;

    public function __construct(ProcedureRepository $procedure)
    {
        parent::__construct();

        $this->procedure = $procedure;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $procedures = $this->procedure->all();

        return view('pearlskin::admin.procedures.index', compact('procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.procedures.create');
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
        $this->procedure->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::procedures.title.procedures')]));

        return redirect()->route('admin.pearlskin.procedure.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Procedure $procedure
     * @return Response
     */
    public function edit(Procedure $procedure, FileRepository $fileRepository)
    {
        $image = $fileRepository->findFileByZoneForEntity('image', $procedure);
        return view('pearlskin::admin.procedures.edit', compact('procedure', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Procedure $procedure
     * @param  Request $request
     * @return Response
     */
    public function update(Procedure $procedure, Request $request)
    {
        $procedure->updated_by_user_id = $request->user()->id;
        $this->procedure->update($procedure, $request->all());

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

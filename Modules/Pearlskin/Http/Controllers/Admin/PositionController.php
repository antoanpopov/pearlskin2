<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Position;
use Modules\Pearlskin\Repositories\PositionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PositionController extends AdminBaseController
{
    /**
     * @var PositionRepository
     */
    private $positionRepository;

    public function __construct(PositionRepository $positionRepository)
    {
        parent::__construct();

        $this->positionRepository = $positionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $positions = $this->positionRepository->all();

        return view('pearlskin::admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->positionRepository->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::positions.title.positions')]));

        return redirect()->route('admin.pearlskin.position.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Position $position
     * @return Response
     */
    public function edit(Position $position)
    {
        return view('pearlskin::admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Position $position
     * @param  Request $request
     * @return Response
     */
    public function update(Position $position, Request $request)
    {
        $this->positionRepository->update($position, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::positions.title.positions')]));

        return redirect()->route('admin.pearlskin.position.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Position $position
     * @return Response
     */
    public function destroy(Position $position)
    {
        $this->positionRepository->destroy($position);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::positions.title.positions')]));

        return redirect()->route('admin.pearlskin.position.index');
    }
}

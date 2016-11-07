<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Manipulation;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Pearlskin\Repositories\DoctorRepository;
use Modules\Pearlskin\Repositories\ManipulationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Pearlskin\Repositories\ProcedureRepository;

class ManipulationController extends AdminBaseController
{
    /**  @var ManipulationRepository */
    private $manipulationRepository;

    /** @var  ClientRepository */
    private $clientRepository;

    /** @var  DoctorRepository */
    private $doctorRepository;

    /** @var  ProcedureRepository */
    private $procedureRepository;

    public function __construct(
        ManipulationRepository $manipulationRepository,
        ClientRepository $clientRepository,
        DoctorRepository $doctorRepository,
        ProcedureRepository $procedureRepository
    )
    {
        parent::__construct();

        $this->manipulationRepository = $manipulationRepository;
        $this->clientRepository = $clientRepository;
        $this->doctorRepository = $doctorRepository;
        $this->procedureRepository = $procedureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $manipulations = $this->manipulationRepository->all();

        return view('pearlskin::admin.manipulations.index', compact('manipulations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = $this->clientRepository->all();
        $doctors = $this->doctorRepository->all();
        $procedures = $this->procedureRepository->all();

        return view('pearlskin::admin.manipulations.create')->with(compact('clients','doctors', 'procedures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->manipulationRepository->create($request->all());

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation created'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manipulation $manipulation
     * @return Response
     */
    public function edit(Manipulation $manipulation)
    {

        $clients = $this->clientRepository->all();
        $doctors = $this->doctorRepository->all();
        $procedures = $this->procedureRepository->all();

        return view('pearlskin::admin.manipulations.edit', compact('manipulation','clients','doctors', 'procedures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Manipulation $manipulation
     * @param  Request $request
     * @return Response
     */
    public function update(Manipulation $manipulation, Request $request)
    {
        $this->manipulationRepository->update($manipulation, $request->all());

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manipulation $manipulation
     * @return Response
     */
    public function destroy(Manipulation $manipulation)
    {
        $this->manipulationRepository->destroy($manipulation);

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation deleted'));;
    }
}

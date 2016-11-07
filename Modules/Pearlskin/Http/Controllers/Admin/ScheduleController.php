<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Client;
use Modules\Pearlskin\Entities\Doctor;
use Modules\Pearlskin\Entities\Schedule;
use Modules\Pearlskin\Repositories\ScheduleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ScheduleController extends AdminBaseController
{
    /**
     * @var ScheduleRepository
     */
    private $schedule;

    public function __construct(ScheduleRepository $schedule)
    {
        parent::__construct();

        $this->schedule = $schedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $schedules = $this->schedule->all();

        return view('pearlskin::admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clientModel = new Client();
        $doctorModel = new Doctor();
        $clients = $clientModel->all();
        $doctors = $doctorModel->all();

        return view('pearlskin::admin.schedules.create', compact('clients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request['appointed_at'] = Carbon::parse($request->get('appointed_at'));
        $this->schedule->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::schedules.title.schedules')]));

        return redirect()->route('admin.pearlskin.schedule.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Schedule $schedule
     * @return Response
     */
    public function edit(Schedule $schedule)
    {
        $doctorModel = new Doctor();
        $clientsModel = new Client();
        $clients = $clientsModel->all();
        $doctors = $doctorModel->all();

        return view('pearlskin::admin.schedules.edit', compact('schedule', 'clients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Schedule $schedule
     * @param  Request $request
     * @return Response
     */
    public function update(Schedule $schedule, Request $request)
    {
        $request['appointed_at'] = Carbon::parse($request->get('appointed_at'));
        $this->schedule->update($schedule, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::schedules.title.schedules')]));

        return redirect()->route('admin.pearlskin.schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Schedule $schedule
     * @return Response
     */
    public function destroy(Schedule $schedule)
    {
        $this->schedule->destroy($schedule);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::schedules.title.schedules')]));

        return redirect()->route('admin.pearlskin.schedule.index');
    }
}

<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Media\Repositories\FileRepository;
use Modules\Pearlskin\Entities\Doctor;
use Modules\Pearlskin\Repositories\DoctorRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DoctorController extends AdminBaseController
{
    /**
     * @var DoctorRepository
     */
    private $doctor;

    public function __construct(DoctorRepository $doctor)
    {
        parent::__construct();

        $this->doctor = $doctor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $doctors = $this->doctor->all();

        return view('pearlskin::admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->doctor->create($request->all());
        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::doctors.title.doctors')]));

        return redirect()->route('admin.pearlskin.doctor.index');
    }

    /**
     * @param Doctor $doctor
     * @param FileRepository $fileRepository
     * @return Response
     */
    public function edit(Doctor $doctor, FileRepository $fileRepository)
    {
        $image = $fileRepository->findFileByZoneForEntity('image', $doctor);
        return view('pearlskin::admin.doctors.edit', compact('doctor', 'image'))->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::doctors.title.doctors')]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Doctor $doctor
     * @param  Request $request
     * @return Response
     */
    public function update(Doctor $doctor, Request $request)
    {
        $this->doctor->update($doctor, $request->all());

        return redirect()->route('admin.pearlskin.doctor.index')->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::doctors.title.doctors')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Doctor $doctor
     * @return Response
     */
    public function destroy(Doctor $doctor)
    {
        $this->doctor->destroy($doctor);


        return redirect()->route('admin.pearlskin.doctor.index')->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::doctors.title.doctors')]));
    }
}

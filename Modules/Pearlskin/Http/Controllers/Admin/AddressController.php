<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Address;
use Modules\Pearlskin\Repositories\AddressRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AddressController extends AdminBaseController
{
    /**
     * @var AddressRepository
     */
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        parent::__construct();

        $this->addressRepository = $addressRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $addresses = $this->addressRepository->all();

        return view('pearlskin::admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->addressRepository->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::addresses.title.addresses')]));

        return redirect()->route('admin.pearlskin.address.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Address $address
     * @return Response
     */
    public function edit(Address $address)
    {
        return view('pearlskin::admin.addresses.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Address $address
     * @param  Request $request
     * @return Response
     */
    public function update(Address $address, Request $request)
    {
        $this->addressRepository->update($address, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::addresses.title.addresses')]));

        return redirect()->route('admin.pearlskin.address.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Address $address
     * @return Response
     */
    public function destroy(Address $address)
    {
        $this->addressRepository->destroy($address);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::addresses.title.addresses')]));

        return redirect()->route('admin.pearlskin.address.index');
    }
}

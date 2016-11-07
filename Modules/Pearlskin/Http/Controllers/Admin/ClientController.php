<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Client;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ClientController extends AdminBaseController
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        parent::__construct();

        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->clientRepository->all();

        return view('pearlskin::admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->clientRepository->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::clients.title.clients')]));

        return redirect()->route('admin.pearlskin.client.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return Response
     */
    public function edit(Client $client)
    {
        return view('pearlskin::admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Client $client
     * @param  Request $request
     * @return Response
     */
    public function update(Client $client, Request $request)
    {
        $this->clientRepository->update($client, $request->all());

        return redirect()->route('admin.pearlskin.client.index')->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::clients.title.clients')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        $this->clientRepository->destroy($client);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::clients.title.clients')]));

        return redirect()->route('admin.pearlskin.client.index');
    }
}

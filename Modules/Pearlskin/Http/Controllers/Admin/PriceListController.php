<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Repositories;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PriceListController extends AdminBaseController
{
    /**
     * @var Repositories\PriceListRepository
     */
    private $priceListRepository;
    /**
     * @var Repositories\PriceListCategoryRepository
     */
    private $priceListCategoryRepository;

    /**
     * @var Repositories\ProcedureRepository
     */
    private $procedureRepository;

    public function __construct(
        Repositories\PriceListRepository $priceListRepository,
        Repositories\PriceListCategoryRepository $priceListCategoryRepository,
        Repositories\ProcedureRepository $procedureRepository
    )
    {
        parent::__construct();

        $this->priceListRepository = $priceListRepository;
        $this->priceListCategoryRepository = $priceListCategoryRepository;
        $this->procedureRepository = $procedureRepository;
    }


    public function index()
    {
        $priceLists = $this->priceListRepository->all();

        return view('pearlskin::admin.priceLists.index', compact('priceLists'));
    }


    public function create()
    {
        $priceListCategories = $this->priceListCategoryRepository->all();
        $procedures = $this->procedureRepository->all();
        return view('pearlskin::admin.priceLists.create')->with(compact('priceListCategories', 'procedures'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $request->all()['created_by_user_id'] = $request->user()->id;
        $request->all()['updated_by_user_id'] = $request->user()->id;
        $this->priceListRepository->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::priceLists.title.module')]));

        return redirect()->route('admin.pearlskin.priceLists.index');
    }

    /**
     * @param Entities\PriceList $priceList
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Entities\PriceList $priceList)
    {
        $priceListCategories = $this->priceListCategoryRepository->all();
        return view('pearlskin::admin.priceLists.edit', compact('priceList', 'priceListCategories'));
    }

    /**
     * @param Entities\PriceList $priceList
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Entities\PriceList $priceList, Request $request)
    {
        $priceList->updated_by_user_id = $request->user()->id;
        $this->priceListRepository->update($priceList, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::priceLists.title.module')]));

        return redirect()->route('admin.pearlskin.priceLists.index');
    }

    public function destroy(Entities\PriceList $priceList)
    {
        $this->priceListRepository->destroy($priceList);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::priceLists.title.module')]));

        return redirect()->route('admin.pearlskin.priceLists.index');
    }
}

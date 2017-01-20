<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Repositories;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PriceListCategoryController extends AdminBaseController
{
    /**
     * @var Repositories\ProcedureCategoryRepository
     */
    private $priceListCategoryRepository;

    public function __construct(Repositories\PriceListCategoryRepository $priceListCategoryRepository)
    {
        parent::__construct();

        $this->priceListCategoryRepository = $priceListCategoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $priceListCategories = $this->priceListCategoryRepository->all();

        return view('pearlskin::admin.priceListsCategories.index', compact('priceListCategories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('pearlskin::admin.priceListsCategories.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $request->all()['created_by_user_id']= $request->user()->id;
        $request->all()['updated_by_user_id']= $request->user()->id;
        $this->priceListCategoryRepository->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::priceLists.title.module')]));

        return redirect()->route('admin.pearlskin.priceListsCategories.index');
    }

    /**
     * @param Entities\PriceListCategory $priceListCategory
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Entities\PriceListCategory $priceListCategory)
    {
        return view('pearlskin::admin.priceListsCategories.edit', compact('priceListCategory'));
    }

    /**
     * @param Entities\PriceListCategory $priceListCategory
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Entities\PriceListCategory $priceListCategory, Request $request)
    {
        $priceListCategory->updated_by_user_id = $request->user()->id;
        $this->priceListCategoryRepository->update($priceListCategory, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::priceLists.title.module')]));

        return redirect()->route('admin.pearlskin.priceListsCategories.index');
    }

    /**
     * @param Entities\PriceListCategory $priceListCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Entities\PriceListCategory $priceListCategory)
    {
        $this->priceListCategoryRepository->destroy($priceListCategory);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::priceListsCategories.title.module')]));

        return redirect()->route('admin.pearlskin.priceListsCategories.index');
    }
}

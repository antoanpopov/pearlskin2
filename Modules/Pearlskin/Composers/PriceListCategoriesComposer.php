<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Repositories;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class PriceListCategoriesComposer
{

    public function __construct(Repositories\PriceListCategoryRepository $priceListCategoryRepository)
    {
        $this->priceListCategoryRepository = $priceListCategoryRepository;
    }

    public function compose(View $view){
        $view->with('priceListCategories', $this->priceListCategoryRepository->all());
    }

}

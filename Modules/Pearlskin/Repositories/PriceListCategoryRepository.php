<?php namespace Modules\Pearlskin\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PriceListCategoryRepository extends BaseRepository
{
    /**
     * @return mixed
     */
    public function allWithPriceLists();

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale);
}

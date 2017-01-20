<?php namespace Modules\Pearlskin\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PriceListCategoryRepository extends BaseRepository
{
    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale);
}

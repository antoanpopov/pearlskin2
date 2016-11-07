<?php namespace Modules\Pearlskin\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface ArticleRepository extends BaseRepository
{
    
    public function latestArticles();
    
    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale);
}

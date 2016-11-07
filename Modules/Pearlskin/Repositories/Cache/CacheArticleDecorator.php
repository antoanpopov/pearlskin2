<?php namespace Modules\Pearlskin\Repositories\Cache;

use Modules\Pearlskin\Repositories\ArticleRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheArticleDecorator extends BaseCacheDecorator implements ArticleRepository
{
    public function __construct(ArticleRepository $articleRepository)
    {
        parent::__construct();
        $this->entityName = 'pearlskin.articles';
        $this->repository = $articleRepository;
    }

    public function latestArticles()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.latestArticles", $this->cacheTime,
                function () {
                    return $this->repository->latestArticles();
                }
            );
    }
}

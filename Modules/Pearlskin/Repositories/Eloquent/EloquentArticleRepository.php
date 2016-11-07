<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\Article\Article;
use Modules\Pearlskin\Events\ArticleWasCreated;
use Modules\Pearlskin\Repositories\ArticleRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentArticleRepository extends EloquentBaseRepository implements ArticleRepository
{
    public function create($data)
    {

        $article = $this->model->create($data);

        event(new ArticleWasCreated($article, $data));

        return $article;
    }

    public function latestArticles()
    {

        return Article::where('is_active','=',1)->orderBy('sort_order','DESC')->limit(3)->get();
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('title', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('title', $slug)->where('locale', $locale)->first();
    }

}

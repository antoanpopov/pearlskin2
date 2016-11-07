<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\ArticleRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class ArticleComposer
{

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articles = $articleRepository;
    }

    public function compose(View $view){
        $view->with('articles', $this->articles);
    }

}
<?php

namespace Modules\Pearlskin\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Pearlskin\Repositories\ArticleRepository;
use Illuminate\Contracts\Foundation\Application;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/25/16
 * Time: 8:56 PM
 */
class ArticleController extends BasePublicController
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var Application
     */
    private $application;

    public function __construct(ArticleRepository $articleRepository, Application $application)
    {
            $this->articleRepository = $articleRepository;
            $this->application = $application;
            parent::__construct();
    }

    public function get($slug)
    {
        $article = $this->articleRepository->findByTitleInLocale($slug, $this->locale);

        $this->throw404IfNotFound($article);

        return view('article.show', compact('article'));
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $article
     */
    private function throw404IfNotFound($article)
    {
        if (is_null($article)) {
            $this->application->abort('404');
        }
    }

}
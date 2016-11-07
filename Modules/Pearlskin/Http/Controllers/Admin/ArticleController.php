<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Repositories\PageRepository;
use Modules\Pearlskin\Entities\Article\Article;
use Modules\Pearlskin\Repositories\ArticleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ArticleController extends AdminBaseController
{
    /**
     * @var ArticleRepository
     */
    private $article;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    public function __construct(ArticleRepository $article)
    {
        parent::__construct();

        $this->article = $article;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->article->all();

        return view('pearlskin::admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['created_by_user_id']= $request->user()->id;
        $requestData['updated_by_user_id']= $request->user()->id;
        
        $this->article->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::articles.title.articles')]));

        return redirect()->route('admin.pearlskin.article.index');
    }

    /**
     * @param Article $article
     * @param FileRepository $fileRepository
     * @return Response
     */
    public function edit(Article $article, FileRepository $fileRepository)
    {

        $image = $fileRepository->findFileByZoneForEntity('image', $article);
        return view('pearlskin::admin.articles.edit', compact('article', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Article $article
     * @param  Request $request
     * @return Response
     */
    public function update(Article $article, Request $request)
    {
        $article->updated_by_user_id = $request->user()->id;
        $this->article->update($article, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::articles.title.articles')]));

        return redirect()->route('admin.pearlskin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        $this->article->destroy($article);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::articles.title.articles')]));

        return redirect()->route('admin.pearlskin.article.index');
    }
}

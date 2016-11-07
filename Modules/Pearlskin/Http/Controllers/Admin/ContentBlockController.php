<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Entities\Page;
use Modules\Pearlskin\Entities\ContentBlock;
use Modules\Pearlskin\Entities\Position;
use Modules\Pearlskin\Repositories\ContentBlockRepository;

class ContentBlockController extends AdminBaseController
{
    /**
     * @var ContentBlockRepository
     */
    private $contentBlockRepository;

    public function __construct(ContentBlockRepository $contentBlockRepository)
    {
        parent::__construct();

        $this->contentBlockRepository = $contentBlockRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contentBlocks = $this->contentBlockRepository->all();

        return view('pearlskin::admin.contentBlocks.index', compact('contentBlocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pageModel = new Page();
        $positionModel = new Position();
        $pages = $pageModel->all();
        $positions = $positionModel->all();

        return view('pearlskin::admin.contentBlocks.create', compact('pages', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        $this->contentBlockRepository->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::contentBlocks.title.contentBlocks')]));

        return redirect()->route('admin.pearlskin.contentBlock.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ContentBlock $contentBlock
     * @return Response
     */
    public function edit(ContentBlock $contentBlock, FileRepository $fileRepository)
    {
        $pageModel = new Page();
        $positionModel = new Position();
        $pages = $pageModel->all();
        $positions = $positionModel->all();
        $image = $fileRepository->findFileByZoneForEntity('image', $contentBlock);

        return view('pearlskin::admin.contentBlocks.edit', compact('contentBlock', 'pages', 'positions', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentBlock $contentBlock
     * @param  Request $request
     * @return Response
     */
    public function update(ContentBlock $contentBlock, Request $request)
    {
        $this->contentBlockRepository->update($contentBlock, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::contentBlocks.title.contentBlocks')]));

        return redirect()->route('admin.pearlskin.contentBlock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContentBlock $contentBlock
     * @return Response
     */
    public function destroy(ContentBlock $contentBlock)
    {
        $this->contentBlockRepository->destroy($contentBlock);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::contentBlocks.title.contentBlocks')]));

        return redirect()->route('admin.pearlskin.contentBlock.index');
    }
}

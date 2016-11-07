<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Repositories\PageRepository;
use Modules\Pearlskin\Entities\Carousel;
use Modules\Pearlskin\Repositories\CarouselRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CarouselController extends AdminBaseController
{
    /**
     * @var CarouselRepository
     */
    private $carousel;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    public function __construct(CarouselRepository $carousel, PageRepository $pageRepository)
    {
        parent::__construct();

        $this->carousel = $carousel;
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $carousels = $this->carousel->all();

        return view('pearlskin::admin.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $pages = $this->pageRepository->all();
        return view('pearlskin::admin.carousels.create', compact('pages'));
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
        
        $this->carousel->create($requestData);

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pearlskin::carousels.title.carousels')]));

        return redirect()->route('admin.pearlskin.carousel.index');
    }

    /**
     * @param Carousel $carousel
     * @param FileRepository $fileRepository
     * @return Response
     */
    public function edit(Carousel $carousel, FileRepository $fileRepository)
    {
        $pages = $this->pageRepository->all();
        $background_image = $fileRepository->findFileByZoneForEntity('background_image', $carousel);
        $secondary_image = $fileRepository->findFileByZoneForEntity('secondary_image', $carousel);
        return view('pearlskin::admin.carousels.edit', compact('carousel', 'pages', 'background_image', 'secondary_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Carousel $carousel
     * @param  Request $request
     * @return Response
     */
    public function update(Carousel $carousel, Request $request)
    {
        $carousel->updated_by_user_id = $request->user()->id;
        $this->carousel->update($carousel, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pearlskin::carousels.title.carousels')]));

        return redirect()->route('admin.pearlskin.carousel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Carousel $carousel
     * @return Response
     */
    public function destroy(carousel $carousel)
    {
        $this->carousel->destroy($carousel);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pearlskin::carousels.title.carousels')]));

        return redirect()->route('admin.pearlskin.carousel.index');
    }
}

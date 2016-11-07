<?php
namespace Modules\Pearlskin\Composers;
use Illuminate\Contracts\View\View;
use Modules\Pearlskin\Repositories\ContentBlockRepository;

/**
 * Created by PhpStorm.
 * User: cowwando
 * Date: 7/21/16
 * Time: 8:42 AM
 */
class ContentBlockComposer
{

    public function __construct(ContentBlockRepository $contentBlockRepository)
    {
        $this->contentBlocks = $contentBlockRepository;
    }

    public function compose(View $view){
        $view->with('contentBlocks', $this->contentBlocks);
    }

}
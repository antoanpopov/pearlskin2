<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\ContentBlock;
use Modules\Pearlskin\Events\ContentBlockWasCreated;
use Modules\Pearlskin\Repositories\ContentBlockRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentContentBlockRepository extends EloquentBaseRepository implements ContentBlockRepository
{

    public function create($data)
    {

        $contentBlock = $this->model->create($data);

        event(new ContentBlockWasCreated($contentBlock, $data));

        return $contentBlock;
    }

    public function getContentBlocksByPageAndPosition($pageId, $positionSlug, $limit = null)
    {

        return ContentBlock::where('page_id', '=', $pageId)
            ->whereHas('position', function ($query) use ($positionSlug) {
                $query->where('slug', '=', $positionSlug);
            })
            ->where('is_active', '=', 1)
            ->orderBy('sort_order', 'ASC')
            ->take($limit)
            ->get();
    }
}

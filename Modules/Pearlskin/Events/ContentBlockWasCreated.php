<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\ContentBlock;
use Modules\Media\Contracts\StoringMedia;

class ContentBlockWasCreated implements StoringMedia
{
    /**
     * @var ContentBlock
     */
    public $contentBlock;
    /**
     * @var array
     */
    public $data;

    public function __construct($contentBlock, array $data)
    {
        $this->contentBlock = $contentBlock;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->contentBlock;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}

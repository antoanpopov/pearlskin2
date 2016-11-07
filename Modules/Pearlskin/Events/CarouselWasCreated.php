<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\Carousel;
use Modules\Media\Contracts\StoringMedia;

class CarouselWasCreated implements StoringMedia
{
    /**
     * @var Carousel
     */
    public $carousel;
    /**
     * @var array
     */
    public $data;

    public function __construct($carousel, array $data)
    {
        $this->carousel = $carousel;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->carousel;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}

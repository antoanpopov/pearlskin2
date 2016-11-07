<?php

namespace Modules\Pearlskin\Events;

use Modules\Pearlskin\Entities\Article\Article;
use Modules\Media\Contracts\StoringMedia;

class ArticleWasCreated implements StoringMedia
{
    /**
     * @var Article
     */
    public $article;
    /**
     * @var array
     */
    public $data;

    public function __construct($article, array $data)
    {
        $this->article = $article;
        $this->data = $data;
    }

    public function getEntity()
    {
        return $this->article;
    }

    public function getSubmissionData()
    {
        return $this->data;
    }
}

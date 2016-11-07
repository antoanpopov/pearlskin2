<?php namespace Modules\Pearlskin\Entities\Article;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content'];
    protected $table = 'pearlskin__articles_translations';
}

<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class ContentBlockTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'content'];
    protected $table = 'pearlskin__content_blocks_translations';
}

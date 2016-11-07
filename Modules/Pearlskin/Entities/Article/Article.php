<?php namespace Modules\Pearlskin\Entities\Article;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Article extends Model
{
    use Translatable,
        MediaRelation;
    
    protected $table = 'pearlskin__articles';
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = [
        'is_active',
        'sort_order',
        // Translatable fields
        'title',
        'content',
        'created_at',
        'updated_at',
        'created_by_user_id',
        'updated_by_user_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];
}

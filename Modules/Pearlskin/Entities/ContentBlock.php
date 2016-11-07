<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Page\Entities\Page;

class ContentBlock extends Model
{
    use Translatable,
        MediaRelation;
    
    protected $table = 'pearlskin__content_blocks';
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = [
        'is_active',
        'page_id',
        'position_id',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}

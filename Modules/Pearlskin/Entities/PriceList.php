<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Pearlskin\Traits\AuthorAndEditorTrait;

class PriceList extends Model
{
    use Translatable,
        AuthorAndEditorTrait;

    protected $table = 'pearlskin__price_list';
    public $translatedAttributes = ['title'];
    protected $fillable = [
        'price',
        'created_by_user_id',
        'updated_by_user_id',
        'procedure_id',
        'price_list_category_id',
        'is_visible',
        'use_procedure_price',
        // Translatable fields
        'title',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'use_procedure_price' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(PriceListCategory::class, 'price_list_category_id');
    }
}

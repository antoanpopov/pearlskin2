<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Pearlskin\Traits\AuthorAndEditorTrait;
use Modules\Pearlskin\Entities;

class PriceListCategory extends Model
{
    use Translatable,
        AuthorAndEditorTrait;

    protected $table = 'pearlskin__price_list_cats';
    public $translatedAttributes = ['title'];
    protected $fillable = [
        'created_by_user_id',
        'updated_by_user_id',
        'is_visible',
        'sort_order',
        // Translatable fields
        'title',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function priceLists()
    {
        return $this->hasMany(Entities\PriceList::class);
    }
}

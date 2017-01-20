<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class PriceListCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'pearlskin__price_list_cats_trans';
}

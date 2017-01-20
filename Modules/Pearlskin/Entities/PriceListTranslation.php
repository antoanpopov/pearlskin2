<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class PriceListTranslation extends Model
{
    protected $table = 'pearlskin__price_list_trans';
    public $timestamps = false;
    protected $fillable = ['title'];
}

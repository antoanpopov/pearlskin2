<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    protected $table = 'pearlskin__addresses';
    protected $fillable = [
        'name',
        'email',
        'address_line_1' ,
        'address_line_2' ,
        'mobile_phone',
        'stationary_phone',
        'created_at',
        'updated_at',
        'created_by_user_id',
        'updated_by_user_id'
    ];

    protected $dates = ['created_at', 'updated_at'];
}

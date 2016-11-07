<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class Manipulation extends Model
{

    protected $table = 'pearlskin__manipulations';
    protected $fillable = [
        'title',
        'description',
        'learnt_from',
        'client_id',
        'doctor_id',
        'client_has_discount',
        'amount_total',
        'amount_discount',
        'amount_paid',
        'amount_dept',
        'created_by_user_id',
        'updated_by_user_id',
        'date_of_manipulation'
    ];

    protected $dates = ['created_at', 'updated_at', 'date_of_manipulation'];

    protected $casts = [
        'client_has_discount' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function procedures()
    {
        return $this->belongsToMany(Procedure::class , 'pearlskin__manipulations_procedures')->withPivot('quantity');
    }
}

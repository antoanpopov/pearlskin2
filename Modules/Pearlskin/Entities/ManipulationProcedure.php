<?php namespace Modules\Pearlskin\Entities;

use Illuminate\Database\Eloquent\Model;

class ManipulationProcedure extends Model
{

    protected $table = 'pearlskin__manipulations_procedures';
    protected $fillable = [
        'manipulation_id',
        'quantity',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manipulation()
    {
        return $this->belongsTo(Manipulation::class);
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['details', 'customer_id'];

    /**
     * Get the customer of the transactions.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

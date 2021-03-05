<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Post
 *
 * @mixin Builder
 */
class Customer extends Model
{
    protected $table = 'customer';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'phone', 'address'];

    /**
     * Get the customer transactions.
     */
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function details()
    {
        return $this->belongsTo('App\user', 'user_id');
    }
}

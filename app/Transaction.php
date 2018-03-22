<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = ['customerId', 'amount' ];

    protected $primaryKey = 'transactionId';

    public function client()
    {
        return $this->belongsTo('App\Client', 'customerId');
    }

}

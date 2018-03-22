<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{

    protected $fillable = ['customerId', 'amount' ];

    protected $primaryKey = 'transactionId';

    protected $dateFormat = 'U';

    public function client()
    {
        return $this->belongsTo('App\Client', 'customerId');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $primaryKey = 'transactionId';

    protected $appends = ['date'];

    protected $fillable = ['customerId', 'amount' ];

    protected $visible = ['transactionId', 'customerId', 'amount', 'date'];


    public function client()
    {
        return $this->belongsTo('App\Client', 'customerId');
    }

    public function scopeOfClientsTransactions($query, $params)
    {
        $query->where('customerId', $params['customerId']);
        return $query;
    }

    public function getDateAttribute()
    {
        return $this->attributes['created_at'];
    }
}

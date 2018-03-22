<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        $to_date = Carbon::createFromFormat('d-m-Y H:s:i', $params['date'].' 00:00:00')->toDateTimeString();
        $from_date = Carbon::createFromFormat('d-m-Y H:s:i', $params['date'].' 24:60:60')->toDateTimeString();
        $query->where('customerId', $params['customerId']);
        $query->where('amount', $params['amount']);
        $query->whereBetween('created_at', array($to_date, $from_date));
        return $query;
    }

    public function getDateAttribute()
    {
        return $this->attributes['created_at'];
    }
}

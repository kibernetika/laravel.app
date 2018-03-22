<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $table = 'client';

    protected $fillable = ['name', 'cnp'];

    public function transaction()
    {
        return $this->hasMany('Transaction', 'customerId');
    }

}

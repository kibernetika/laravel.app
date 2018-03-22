<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = ['name', 'cnp'];

    protected $dateFormat = 'U';

    public function transaction()
    {
        return $this->hasMany('Transaction', 'customerId');
    }

}

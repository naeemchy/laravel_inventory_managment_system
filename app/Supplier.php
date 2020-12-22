<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address','type','photo','shop','account_holder','account_number','bank_name','branch_name','city'
    ];
}

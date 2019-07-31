<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;

class customer extends Authenticatable
{
    use Billable;
    protected $guarded = [];
}

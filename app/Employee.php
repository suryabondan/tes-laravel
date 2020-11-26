<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name', 'email', 'company_id',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}

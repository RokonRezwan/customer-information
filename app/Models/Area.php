<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_name',
        'area_code'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "suppliers";

    protected $fillable = ['name', 'address', 'phone'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function carModel()
    {
        return $this->hasMany(Car_Model::class);
    }
}

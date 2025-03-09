<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function ruang()
    {
        return $this->hasMany(Ruang::class);
    }

    public function pinjamanBarang()
    {
        return $this->hasMany(PinjamBarang::class);
    }

    public function pinjamanRuang()
    {
        return $this->hasMany(PinjamRuang::class);
    }
}

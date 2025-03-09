<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'status_peminjaman';

    protected $fillable = ['nama'];

    public function pinjamanBarang()
    {
        return $this->hasMany(PinjamBarang::class, 'status');
    }

    public function pinjamanRuang()
    {
        return $this->hasMany(PinjamRuang::class, 'status');
    }
}

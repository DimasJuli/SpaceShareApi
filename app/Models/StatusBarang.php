<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusBarang extends Model
{
    use HasFactory;

    protected $table = 'status_barang';

    protected $fillable = ['nama'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'status');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusRuang extends Model
{
    use HasFactory;

    protected $table = 'status_ruang';

    protected $fillable = ['nama'];

    public function ruang()
    {
        return $this->hasMany(Ruang::class, 'status');
    }
}

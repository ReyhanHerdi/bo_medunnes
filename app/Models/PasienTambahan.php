<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;

class PasienTambahan extends Model
{
    use HasFactory;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded();
        // Chain fluent methods for configuration options
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }


    protected $table = "pasien_tambahan";

    protected $fillable = [
        'id_pasien_tambahan',
        'pasien_id',
        'nama_pasien_tambahan',
        'TB',
        'BB',
        'jenis_kelamin',
        'tgl_lahir',
        'hubungan_keluarga',
    ];

    protected $primaryKey = 'id_pasien_tambahan';
}

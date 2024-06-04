<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class janji extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded();
        // Chain fluent methods for configuration options
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id' );
    }

    public function dokter() {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function pasienTambahan() {
        return $this->belongsTo(PasienTambahan::class, 'pasien_tambahan_id');
    }

    public function sesi() {
        return $this->belongsTo(Sesi::class, 'sesi_id');
    }

    protected $table = "janji";

    protected $fillable = [
        'id_janji',
        'pasien_id',
        'dokter_id',
        'pasien_tambahan_id',
        'sesi_id',
        'datetime',
        'catatan',
        'status'
    ];

    protected $primaryKey = "id_janji";


}

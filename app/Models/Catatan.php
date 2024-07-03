<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Catatan extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded();
        // Chain fluent methods for configuration options
    }

    public function konsultasi() {
        return $this->belongsTo(Konsultasi::class, 'konsultasi_id');
    }

    protected $table = "catatan";

    protected $fillable = [
        'id_catatan',
        'konsultasi_id',
        'gejala',
        'diagnosis',
        'catan',
    
    ];

    protected $primaryKey = "id_catatan";
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Konsultasi extends Model
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



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_konsultasi',
        'pasien_id',
        'mahasiswa_id',
        'topik',
        'created_at'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'konsultasi';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_konsultasi';
}

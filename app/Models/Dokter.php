<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

// class Dokter extends Model
// {
//     use HasFactory;
//     use LogsActivity;

//     public function getActivitylogOptions(): LogOptions
//     {
//         return LogOptions::defaults()
//         ->logUnguarded();
//         // Chain fluent methods for configuration options
//     }

//     // mahasiswa.php

//     public function konsultasi()
//     {
//         return $this->hasMany(Konsultasi::class, 'mahasiswa_id', 'id_mahasiswa');
//     }

//     public function rating()
//     {
//         return $this->hasMany(Rating::class, 'mahasiswa_id', 'id_mahasiswa');
//     }


//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array<int, string>
//      */
//     protected $fillable = [
//         'user_id',
//         'nama_mahasiswa',
//         'nim',
//         'poli_id',
//         'img_mahasiswa',
//         'alamat',
//         'no_tlp',
//         'tempat_kerja',
//         'tahun_lulus',
//         'tgl_mulai_aktif',
//         'alumni_kampus',
//         'no_reg',
//         'jenis_kelamin',
//         'status'
//     ];

//     /**
//      * The table associated with the model.
//      *
//      * @var string
//      */
//     protected $table = 'user_mahasiswa';

//     /**
//      * The primary key associated with the table.
//      *
//      * @var string
//      */
//     protected $primaryKey = 'id_mahasiswa';
// }

class Dokter extends Model
{
    use HasFactory;
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logUnguarded();
        // Chain fluent methods for configuration options
    }

    public function konsultasi()
    {
        return $this->hasMany(Konsultasi::class, 'dokter_id', 'id_dokter');
    }

    public function janji()
    {
        return $this->hasMany(janji::class, 'dokter_id', 'id_dokter');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class, 'dokter_id', 'id_dokter');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title_depan',
        'nama_dokter',
        'title_belakang',
        'spesialis_id',
        'img_dokter',
        'alamat',
        'no_tlp',
        'tempat_kerja',
        'tahun_lulus',
        'tgl_mulai_aktif',
        'alumni_kampus',
        'no_reg',
        'jenis_kelamin',
        'status'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_dokter';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_dokter';
}


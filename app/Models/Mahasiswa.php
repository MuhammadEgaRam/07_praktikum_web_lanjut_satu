<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
use App\Models\Kelas;


class Mahasiswa extends Model //Definisi Model
{
    protected $table="mahasiswas"; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    protected $primaryKey = 'Nim'; // Memanggil isi DB Dengan primarykey
    protected $timestamp = false;
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'Email',
        'Nim',
        'Nama',
        'Tanggal_Lahir',
        'kelas_id',
        'Jurusan',
        'No_Handphone',
    ];

    public function kelas()
    {
        return $this-> belongsTo(Kelas::class);
    }
};

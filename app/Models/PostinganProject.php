<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PostinganProject
 *
 * @property int $id_pengguna                ID pengguna yang terkait dengan postingan
 * @property int $id_project                  ID proyek yang terkait dengan postingan
 * @property string $judul_postingan          Judul postingan
 * @property string $deskripsi_postingan      Deskripsi postingan
 * @property string $waktu_buat               Waktu saat postingan dibuat
 * @property string $waktu_ubah               Waktu saat postingan diubah
 */
class PostinganProject extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'postingan_project';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pengguna',
        'id_project',
        'judul_postingan',
        'deskripsi_postingan',
        'waktu_buat',
        'waktu_ubah'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    public function idPengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id');
    }
    public function idProject()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }

}

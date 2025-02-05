<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_milestone
 * @property int $id_pembayaran
 * @property string $waktu_buat
 * @property string $waktu_ubah
 */
class BatchPembayaran extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'batch_pembayaran';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_milestone',
        'id_pembayaran',
        'waktu_buat',
        'waktu_ubah',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

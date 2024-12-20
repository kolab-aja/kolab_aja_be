<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BillingRekening
 *
 * @property int $id_user           ID pengguna
 * @property int $id_bank           ID bank terkait
 * @property string $nomor_rekening Nomor rekening bank
 * @property string $nama_pemilik   Nama pemilik rekening
 * @property string $waktu_buat     Waktu data dibuat
 * @property string $waktu_ubah     Waktu data diubah
 */
class BillingRekening extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billing_rekening';

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
        'id_user',
        'id_bank',
        'nomor_rekening',
        'nama_pemilik',
        'waktu_buat',
        'waktu_ubah',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Handle before saving the model, which covers both creating and updating
        static::saving(function ($model) {
            $currentTimestamp = $model->freshTimestamp();

            if (!$model->exists) {
                // This is a new model instance (creating)
                $model->waktu_buat = $currentTimestamp;
            }

            // Always update 'waktu_ubah' when saving (updating)
            $model->waktu_ubah = $currentTimestamp;
        });
    }
}

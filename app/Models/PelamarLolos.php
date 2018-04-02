<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PelamarLolos
 */
class PelamarLolos extends Authenticatable
{
    use SoftDeletes;
    
    protected $table = 'pelamar_lolos';

    protected $primaryKey = 'id_pelamar_lolos';

	public $timestamps = true;

    protected $fillable = [
        'id_jabatan_lamaran',
        'id_pelamar',
        'id_penempatan',
        'status'
    ];

    protected $guarded = [];

    public function jabatan_lamaran()
    {
        return $this->belongsTo('App\Models\JabatanLamaran', 'id_jabatan_lamaran');
    }

    public function penempatan()
    {
        return $this->belongsTo('App\Models\Penempatan', 'id_penempatan');
    }

}
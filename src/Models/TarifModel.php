<?php

namespace Bantenprov\PemakaianBahuJalan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TarifModel extends Model 
{

    protected $table = 'pbj_tarifs';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('uuid', 'uraian', 'tarif', 'wilayah_kota', 'wilayah_kabupaten', 'satuan', 'master_tarif_id');

    public function getMasterTarif()
    {
        return $this->hasOne('MasterTarif', 'master_tarif_id');
    }

    public function getItem()
    {
        return $this->hasMany('Item', 'id');
    }

}
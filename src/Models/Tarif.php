<?php

namespace Bantenprov\RetribusiPelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarif extends Model 
{

    protected $table = 'tarifs';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('uuid', 'uraian', 'tarif', 'jasa_pelayanan', 'jasa_sarana', 'satuan', 'master_tarif_id');

    public function getMasterTarif()
    {
        return $this->hasOne('MasterTarif', 'master_tarif_id');
    }

    public function getItem()
    {
        return $this->hasMany('Item', 'id');
    }

}
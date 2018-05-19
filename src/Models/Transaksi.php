<?php

namespace Bantenprov\TarifPelayananKesehatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model 
{

    protected $table = 'transaksies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('id', 'uuid', 'nomor', 'total', 'denda', 'potongan', 'admin_id', 'customer_transaksi_id', 'tarif_id');

    public function getitem()
    {
        return $this->hasMany('Item', 'id');
    }

    public function getCustomer()
    {
        return $this->hasOne('CustomerRetribusi', 'customer_retribusi_id');
    }

    public function getAdmin()
    {
        return $this->hasOne('Admin', 'admin_id');
    }

}
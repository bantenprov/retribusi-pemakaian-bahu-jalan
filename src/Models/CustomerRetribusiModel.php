<?php

namespace Bantenprov\PemakaianBahuJalan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerRetribusiModel extends Model 
{

    protected $table = 'pbj_customer_retribusies';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('customers_id', 'daftar_retribusi_id');

    public function getTransaksi()
    {
        return $this->hasMany('Transaksi', 'id');
    }

    public function getDaftarRetribusi()
    {
        return $this->hasOne('DaftarRetribusi', 'daftar_retribusi_id');
    }

    public function getCustomer()
    {
        return $this->hasOne('Customer', 'customer_id');
    }

}
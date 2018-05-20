<?php namespace Bantenprov\PemakaianBahuJalan\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The PemakaianBahuJalanModel class.
 *
 * @package Bantenprov\PemakaianBahuJalan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PemakaianBahuJalanModel extends Model
{
    /**
    * Table name.
    *
    * @var string
    */
    protected $table = 'pemakaian_bahu_jalan';

    /**
    * The attributes that are mass assignable.
    *
    * @var mixed
    */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}

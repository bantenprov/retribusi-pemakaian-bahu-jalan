<?php namespace Bantenprov\PemakaianBahuJalan\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PemakaianBahuJalan facade.
 *
 * @package Bantenprov\PemakaianBahuJalan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PemakaianBahuJalan extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pemakaian-bahu-jalan';
    }
}

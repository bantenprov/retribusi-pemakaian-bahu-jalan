<?php namespace Bantenprov\PemakaianBahuJalan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PemakaianBahuJalan\Facades\PemakaianBahuJalan;
use Bantenprov\PemakaianBahuJalan\Models\PemakaianBahuJalanModel;

/**
 * The PemakaianBahuJalanController class.
 *
 * @package Bantenprov\PemakaianBahuJalan
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PemakaianBahuJalanController extends Controller
{
    public function demo()
    {
        return PemakaianBahuJalan::welcome();
    }
}

<?php

use Azuriom\Plugin\Firewall\Controllers\FirewallHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Azuriom\Plugin\Firewall\Middleware\HandleFirewall;
use Shieldon\Firewall\Panel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', [FirewallHomeController::class, 'index']);
Route::any('/painel/{params?}', function (Request $request) {
    $panel = new Panel();
    $panel->csrf(['_token' => csrf_token()]);
    $panel->entry();
})->where('params', '.*');


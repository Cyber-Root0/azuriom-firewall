<?php

namespace Azuriom\Plugin\Firewall\Controllers;

use Azuriom\Http\Controllers\Controller;

class FirewallHomeController extends Controller
{
    /**
     * Show the home plugin page.
     */
    public function index()
    {
        return view('azuriom-firewall::index');
    }
}

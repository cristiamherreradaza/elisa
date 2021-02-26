<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function inicio()
    {
        // echo "holas";
        return view('panel.inicio');
    }
}

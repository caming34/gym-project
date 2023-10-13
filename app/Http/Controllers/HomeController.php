<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resourHomee.
     */
    public function index()
    {
        $homes = Equipment::all();
        return view('index_Gym', compact('homes'));
    }
}

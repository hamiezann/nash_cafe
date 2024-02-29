<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function showNearestStore()
    {
        return view('user.store');
    }

    public function index(Request $request)
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 1.61040079,
                    'lng' => 103.31336881
                ],
                'label' => ['color' => 'white', 'text' => 'A'],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 2.19108546,
                    'lng' => 102.24765769
                ],
                'label' => ['color' => 'white', 'text' => 'B'],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => null, // Leave latitude and longitude null for 'ME'
                    'lng' => null,
                ],
                'label' => ['color' => 'white', 'text' => 'YOU'],
                'draggable' => true
            ]
        ];

        return view('user.store', compact('initialMarkers'));
    }
}

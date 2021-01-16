<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Dashboard',
            'list' => [
                [
                    'name' => 'Dashboard'
                ]
            ]
        ];

        return view('dashboard.index', [
            'breadcrumb' => $breadcrumb
        ]);
    }
}

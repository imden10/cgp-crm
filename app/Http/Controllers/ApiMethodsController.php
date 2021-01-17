<?php

namespace App\Http\Controllers;

class ApiMethodsController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Api methods',
            'list' => [
                [
                    'name' => 'Api methods'
                ]
            ]
        ];

        return view('api_methods.index', [
            'breadcrumb' => $breadcrumb
        ]);
    }
}

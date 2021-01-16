<?php

use App\Models\Companies;

/* @var Companies $model */
/* @var array $breadcrumb */

?>

@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    @include('.layouts.components._breadcrumb',['breadcrumb' => $breadcrumb])
    <!-- /.Breadcrumb -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$breadcrumb['title']}}</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body">
                        @include('.companies._form', [
                            'model'  => $model,
                            'action' => 'edit'
                        ])
                    </div>
                    <div class="card-footer clearfix">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

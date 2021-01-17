<?php
use App\Models\Companies;

/* @var Companies $model*/
/* @var array $breadcrumb*/

?>

@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    @include('.layouts.components._breadcrumb',['breadcrumb' => $breadcrumb])
    <!-- /.Breadcrumb -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$breadcrumb['title']}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td><strong>Name</strong></td>
                                    <td>{{$model->getName()}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td>{{$model->getPhone()}}</td>
                                </tr>
                                <tr>
                                    <td><strong>E-mail</strong></td>
                                    <td>{{$model->getEmail()}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Web site</strong></td>
                                    <td>{{$model->getWebsite()}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Address</strong></td>
                                    <td>{{$model->getAddress()}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Created</strong></td>
                                    <td>{{$model->getCreatedAt()->format('d.m.Y H:i')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Description
                        </h3>
                    </div>
                    <div class="card-body">
                        {!! $model->getDescription() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Company client list</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>E-mail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model->clients as $key => $client)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>
                                            <a href="{{route('clients.show', $client->getId())}}">{{$client->getFullName()}}</a>
                                        </td>
                                        <td>{{$client->getPhone()}}</td>
                                        <td>{{$client->getEmail()}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

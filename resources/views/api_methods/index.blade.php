<?php
/* @var array $breadcrumb*/
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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            GET Companies
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        curl --location --request GET 'http://cgp-crm/api/companies' \
                                        --header 'Authorization: Bearer fbff0db4843426520e7085170495fcd1' \
                                        --header 'Content-Type: application/json' \
                                        --data-raw '{
                                        "pagination": {
                                        "page": 1,
                                        "page_size": 5
                                        }
                                        }'
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            GET Clients
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        curl --location --request GET 'http://cgp-crm/api/clients' \
                                        --header 'Authorization: Bearer fbff0db4843426520e7085170495fcd1' \
                                        --header 'Content-Type: application/json' \
                                        --data-raw '{
                                        "company_id": 1,
                                        "pagination": {
                                        "page": 1,
                                        "page_size": 5
                                        }
                                        }'
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            GET Client companies
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        curl --location --request GET 'http://cgp-crm/api/client_companies' \
                                        --header 'Authorization: Bearer fbff0db4843426520e7085170495fcd1' \
                                        --header 'Content-Type: application/json' \
                                        --data-raw '{
                                        "client_id": 10018,
                                        "pagination": {
                                        "page": 1,
                                        "page_size": 5
                                        }
                                        }'
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

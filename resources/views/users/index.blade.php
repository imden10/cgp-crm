<?php
use App\Models\User;

/* @var User $model */
/* @var array $breadcrumb */

$num = ($model->count() * ($model->currentPage() - 1)) + 1;
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
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Api Token</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $item)
                                <tr>
                                    <td>{{$num}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <div class="input-group input-group-sm tooltip-copy" style="width: 300px">
                                            <input type="text" class="form-control" id="api_token" readonly value="{{$item->api_token}}" style="z-index: 1 !important;">
                                            <span class="input-group-append">
                                            <button type="button" class="btn btn-info btn-flat" id="copy_btn">
                                                <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                <i class="far fa-copy"></i> Copy
                                            </button>
                                          </span>
                                        </div>
                                    </td>
                                    <td>{{$item->created_at->format('d.m.Y H:i')}}</td>
                                </tr>
                                <?php $num++?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{ $model->links('.layouts.components._pagination',['paginator' => $model]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .tooltip-copy {
            position: relative;
        }

        .tooltip-copy .tooltiptext {
            visibility: hidden;
            min-width: 140px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 150%;
            left: 50%;
            margin-left: -75px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-copy .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 70px;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip-copy:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
            z-index: 9999;
        }
    </style>
@endpush

@push('script')
    <script>
        $("#copy_btn").on("click",function(){
            var copyText = document.getElementById("api_token");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied: " + copyText.value;
        })

        $("#copy_btn").on("mouseout",function(){
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copy token";
        })
    </script>
@endpush

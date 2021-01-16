<?php
/* @var array $breadcrumb*/
?>

@if(!is_null($breadcrumb))
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$breadcrumb['title']}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @foreach($breadcrumb['list'] as $item)
                            <li class="breadcrumb-item @if(isset($item['link'])) active @endif">
                                @if(isset($item['link']))
                                    <a href="{{$item['link']}}">{{$item['name']}}</a>
                                @else
                                    {{$item['name']}}
                                @endif
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endif

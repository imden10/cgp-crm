<?php
use App\Models\Companies;

/* @var Companies $model*/
/* @var array $breadcrumb*/

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
                            <a href="{{route('companies.create')}}" class="btn btn-block btn-success btn-xs">
                                <i class="fas fa-magic"></i>
                                Create
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Web site</th>
                                <th>Created</th>
                                <th class="text-right">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $item)
                                    <tr>
                                        <td>{{$num}}</td>
                                        <td>{{$item->getName()}}</td>
                                        <td>{{$item->getPhone()}}</td>
                                        <td>{{$item->getEmail()}}</td>
                                        <td>{{$item->getWebsite()}}</td>
                                        <td>{{$item->getCreatedAt()->format('d.m.Y H:i')}}</td>
                                        <td class="text-right" style="width: 210px">
                                            <form action="{{ route('companies.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary btn-xs" href="{{route('companies.show', $item->id)}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-xs" href="{{route('companies.edit', $item->id)}}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger btn-xs delete-item-btn">
                                                    <i class="fas fa-trash"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
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

@push('script')
    <script>
        $(function () {
            $('.delete-item-btn').on('click', function(e){
                if(!confirm("Are you sure you want to delete this entry?")){
                    e.preventDefault();
                    return false;
                }
            })
        })
    </script>
@endpush

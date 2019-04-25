@extends('adminlte::page')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Lista de Classificações
</span>

<a class="btn btn-success btn-sm" href="{{ route('classifications.create') }}">
    <i class="fa fa-plus"></i> Inserir uma nova Classificação
</a>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="active">Lista de Classificações</li>
</ol>
@stop

@section('content')
<div class="panel panel-default">
<!-- Default panel contents -->
    <div class="panel-heading">
        Relação de registros de Classificação
    </div>

    <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th class='text-center'>Data de Criação</th>
                    <th class='text-center'>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classifications as $classification)
                <tr>
                    <td>{{ $classification->id }}</td>
                    <td>{{ $classification->descricao }}</td>
                    <td class='text-center' style='width:150px'>{{ $classification->created_at->format('d/m/Y h:m') }}</td>
                    <td class='text-right' style="width: 140px">
                        <a class='btn btn-primary btn-sm' href='{{ route("classifications.show", $classification->id) }}' role='button'>
                            <i class='fa fa-eye'></i>
                        </a>
                        <a class='btn btn-warning btn-sm' href='{{ route("classifications.edit", $classification->id) }}' role='button'>
                            <i class='fa fa-pencil'></i>
                        </a>
                        <a class='btn btn-danger btn-sm' href="{{ route('classifications.destroy', $classification->id) }}">
                            <i class='fa fa-trash'></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="panel-footer">{{ $classifications->links() }}</div>
</div>
@stop
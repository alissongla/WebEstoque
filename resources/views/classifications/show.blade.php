@extends('adminlte::page')
@section('title', config('adminlte.title'))

@section('content_header')
<h1>
    <i class='fa fa-database'></i> Exibindo os detalhes do registro de Classificação
</h1>
<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('classifications.index') }}">Lista de Classificações</a>
    </li>
    <li class="active">Exibindo dados</li>
</ol>

@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <span>
            <a class='' href='{{ route('classifications.index') }}'><i class='fa fa-chevron-circle-left'></i> Retorna para a tela de consulta</a>
        </span>
    </div>
    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td class='col-sm-2'>ID</td>
                    <td class='col-sm-10'>{{ $classification->id }}</td>
                </tr>
                <tr>
                    <td class='col-sm-1'>Descrição</td>
                    <td class='col-sm-10'>{{ $classification->descricao }}</td>
                </tr>
                <tr>
                    <td class='col-sm-2'>Data de Criação</td>
                    <td class='col-sm-10'>{{$classification->created_at->format('d/m/Y h:i') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        <span>
            <a class='' href='{{ route('classifications.index') }}'><i class='fa fa-chevron-circle-left'></i> Retorna para a tela de consulta</a>
        </span>
    </div>
</div>
@stop
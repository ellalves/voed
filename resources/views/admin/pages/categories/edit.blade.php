@extends('adminlte::page')

@section('title', "Editar Categoria {{ $category->name }}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}"> Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.edit', $category->id) }}" class="active"> Editar</a></li>
    </ol>
    <h1> Editar Categoria {{ $category->name }} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form">
                @method('PUT')
                @include('admin.pages.categories._partials.form')
            </form>
        </div>
    </div>
@stop
@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div>
                <h2>Elenco dei Type</h2>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Aggiungi Type</a>
            </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}    
            </div>            
        @endif
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Numero di Post</th>
                    <th>Azioni</th>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>{{ count($type->posts) }}</td>
                            <td>
                                <a href="{{ route('admin.types.show', $type->slug) }}" title="Visualizza Type" class="btn btn-square btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.types.edit', $type->slug) }}" title="Modifica Type" class="btn btn-square btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-square btn-danger" title="Elimina Type">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
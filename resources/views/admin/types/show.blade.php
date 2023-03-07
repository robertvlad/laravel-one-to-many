@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="py-3">Tipologia: {{ $type->name }}</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}    
                </div>            
            @endif
            <div class="d-flex gap-3 pb-3">
                <a href="{{ route('admin.types.index') }}" class="btn btn-square btn-primary">Torna all'elenco</a>
                <a href="{{ route('admin.types.edit', $type->slug) }}" title="Modifica tipologia" class="btn btn-square btn-warning">
                    Modifica
                </a>
                <form class="d-inline-block" action="{{ route('admin.types.destroy', $type->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-square btn-danger">
                        Elimina
                    </button>
                </form>
            </div>
            <div>
                <p>Slug: {{ $type->slug }}</p>
            </div>
            <div class="col-12">
                <h4>Post con questo type: {{ count($type->posts) }}</h4>
                <div class="row">
                    @forelse ($type->posts as $post)
                    <div class="col-6">
                        <div class="card text-center m-3 p-2 bg-dark text-light">
                            <h4>{{ $post->title }}</h4>
                            <h6>Creato il: {{ $post->created_at }}</h6>
                            <a class="btn btn-primary btn-sm" href="{{ route('admin.posts.show', $post->slug) }}">Apri il post</a> 
                        </div>    
                    </div>                    
                @empty
                    <h6 class="text-center">Non ci sono posto per questa categoria</h6>
                @endforelse
                </div>               
            </div>
        </div>
    </div>
</div>

@endsection
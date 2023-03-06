@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <div>
                <h2>Elenco dei Posts</h2>
            </div>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Aggiungi Post</a>
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
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Data creazione</th>
                    <th>Ultima modifica</th>
                    <th>Azioni</th>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post['id']}}</td>
                            <td>{{ $post['title']}}</td>
                            <td>{{ $post['slug']}}</td>
                            <td>{{ $post['created_at']}}</td>
                            <td>{{ $post['updated_at']}}</td>                            
                            <td>
                                <a href="{{ route('admin.posts.show', ['post' => $post['slug']]) }}" title="Visualizza Post" class="btn btn-square btn-primary btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.posts.edit', ['post' => $post['slug']]) }}" title="Modifica Post" class="btn btn-square btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{ route('admin.posts.destroy', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-square btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>  
                        @empty
                        <tr>
                            <td scope='row'>
                                Nessun Post presente. <a href="{{ route('admin.posts.create') }}">CLICCA QUI</a> per creare un nuovo Post.    
                            </td>  
                        </tr>                   
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
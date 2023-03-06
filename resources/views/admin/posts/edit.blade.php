@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="py-3">
                <h2>Modifica Post</h2>
            </div>
            <div class="d-flex gap-3 pb-3">
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Annulla</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>                        
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <form action="{{ route('admin.posts.update', ['post' => $post['slug']])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">TITOLO</label>
                        <input type="text" class="form-control" placeholder="Titolo" id="title" name="title" value="{{ old('title') ?? $post['title']}}">
                        @error('title')
                            <div class="text-danger">** {{ $message }}</div>                            
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">CONTENUTO</label>
                        <textarea name="content" id="content" cols="30" rows="10" placeholder="Contenuto" class="form-control">{{ old('title') ?? $post['title']}}</textarea>
                    </div>
                    <div class="form-group my-2">
                        <button type="submit" class="btn btn-success">Salva</button>                        
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
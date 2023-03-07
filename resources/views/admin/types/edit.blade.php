@extends('layouts.admin');

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="py-3">
                <h2>Modifica Type</h2>
            </div>
            <div class="d-flex gap-3 pb-3">
                <a href="{{ route('admin.types.index') }}" class="btn btn-primary">Annulla</a>
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
                <form action="{{ route('admin.types.update', $type->slug)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">NOME</label>
                        <input type="text" class="form-control" placeholder="Nome" id="name" name="name" value="{{ old('name') ?? $type['name']}}">
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
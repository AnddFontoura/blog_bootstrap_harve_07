@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('post.save') }}" method="POST">
                <div class="card">
                    <div class="card-header">Criar nova publicação </div>
                    <div class="card-body">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nome do Post</label>
                            <input type="text" class="form-control @error('postName')  is-invalid  @endif" name="postName" value="{{ old('postName') }}"></input>
                            
                            @error('postName')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Conteúdo do Post</label>
                            <textarea type="text" class="form-control" name="postContent">{{ old('postContent') }}</textarea>
                            
                            @error('postContent')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" class="btn btn-success" value="Cadastrar"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar nova publicação </div>
                <div class="card-body">
                <div class="form-group mb-3">
                        <label>Nome do Usuário</label>
                        <p>{{$post->userInformation->name}}</p>
                    </div>                    
                    
                    <div class="form-group mb-3">
                        <label>Nome do Post</label>
                        <p>{{$post->name}}</p>
                    </div>

                    <div class="form-group">
                        <label>Conteúdo do Post</label>
                        <p>{{$post->content}}</p>
                    </div>

                    <div class="form-group">
                        <label>Criado em</label>
                        <p>{{$post->created_at}}</p>
                    </div>

                    <div class="form-group">
                        <label>Atualizado em</label>
                        <p>{{$post->updated_at}}</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar nova publicação </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <h3>Nome do Usuário</h3>
                        <h5>{{$post->userInformation->name}}</h5>
                    </div>

                    <div class="form-group mb-3">
                        <h3>Nome do Post</h3>
                        <h5>{{$post->name}}</h5>
                    </div>

                    <div class="form-group mb-3">
                        <h3>Conteúdo do Post</h3>
                        <h5>{{$post->content}}</h5>
                    </div>

                    <div class="form-group mb-3">
                        <h3>Criado em</h3>
                        <h5>{{$post->created_at->format('d/m/Y h:i:s')}}</h5>
                    </div>

                    <div class="form-group mb-3">
                        <h3>Atualizado em</h3>
                        <h5>{{$post->updated_at->format('d/m/Y h:i:s')}}</h5>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
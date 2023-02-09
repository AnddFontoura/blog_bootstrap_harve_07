@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('post.form') }}" class='btn btn-danger mt-3 mb-3'> Criar Publicação </a>
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                    @if (count($posts) == 0)
                    <div class="alert alert-danger"> Não há publicações criadas </div>
                    @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>OPÇÕES</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th>{{ $post->id }}</th>
                                <th>{{ $post->name }}</th>
                                <th>
                                    <a class="btn btn-primary" href="{{ route('post.form_update', [$post->id])}}"> Editar</a>
                                    <a class="btn btn-secondary" href="{{ route('post.form_view', [$post->id])}}"> Visualizar</a>
                                    <a class="btn btn-danger" href="{{ route('post.form_update', [$post->id])}}"> Deletar</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
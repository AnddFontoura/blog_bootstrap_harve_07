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
                                <th>{{ $post->id }}</th>
                                <th>{{ $post->name }}</th>
                                <th></th>
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
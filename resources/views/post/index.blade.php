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
                                    <button class="btn btn-danger btnDelete" data-id="{{ $post->id }}">Deletar</button>
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

@section('page_js')
<script>
    $('.btnDelete').on('click', function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Cuidado!',
            text: 'Deseja realmente excluir essa publicação?',
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, desejo'
        }).then((result) => {
            if (result.value) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var request = $.ajax({
                    url: "{{ url('posts/delete') }}",
                    method: "DELETE",
                    data: {
                        id: id
                    },
                    dataType: "json"
                });
                request.done(function() {
                    Swal.fire({
                            title: 'SUCESSO',
                            text: 'Sua publicação foi deletada, não adianta chorar',
                            type: 'success',
                            buttons: true,
                        })
                        .then((buttonClick) => {
                            if (buttonClick) {
                                location.reload();
                            }
                        });
                });
                request.fail(function() {
                    Swal.fire(
                        'Algo deu errado',
                        'Cheque a rota',
                        'error'
                    )
                });
            } else if (result.dismiss === 'cancel') {
                Swal.fire(
                    'Operação cancelada',
                    'Nada foi executado',
                    'error'
                )
            }
        });
    });
</script>
@endsection
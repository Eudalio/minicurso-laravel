@extends('admin.layouts.app')
@section('content')
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> Todos</h3>
            </div>
            @if(Session::has('success'))
                <div class="box-body">
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('success')}}
                    </div>
                </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body">
                <!-- Tabela com usuários-->
                @if(!$books->isEmpty())
                    <table id="books" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Nome</th>
                            <th>Autor</th>
                            <th>Ano</th>
                            <th>Gênero</th>
                            <th>Localização</th>
                            <th>Quantidade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr onmouseover="this.style.cursor='pointer'" onclick="setPageEditBook({{$book->id}})">
                                <td>
                                    {{!is_null($book->isbn) ? $book->isbn : '-'}}
                                </td>
                                <td>
                                    {{$book->book_name}}
                                </td>
                                <td>
                                    {{$book->author}}
                                </td>
                                <td>
                                    {{$book->year}}
                                </td>
                                <td>
                                    {{$book->genre}}
                                </td>
                                <td>
                                    {{$book->location}}
                                </td>
                                <td>
                                    {{$book->amount}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fa fa-info-circle"></i> Nenhum livro cadastrado.
                </div>
            @endif
        </div>
    </div>
    <script>
        function setPageEditBook(id) {
            window.location.href = window.location.pathname +'/' +  id + '/edit';
        }
        $(function () {
            $('#books').DataTable()
        })
    </script>
@endsection
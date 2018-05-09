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
                @if(!$loans->isEmpty())
                    <table id="loans" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Série</th>
                            <th>Livro</th>
                            <th>Autor</th>
                            <th>Data empréstimo</th>
                            <th>Data devolução</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loans as $loan)
                            <tr>
                                <td>
                                    {{$loan->name}}
                                </td>
                                <td>
                                    {{$loan->serie}}
                                </td>
                                <td>
                                    {{$loan->book_name}}
                                </td>
                                <td>
                                    {{$loan->author}}
                                </td>
                                <td>
                                    {{date('d/m/Y', strtotime($loan->loan))}}
                                </td>
                                <td>
                                    {{date('d/m/Y', strtotime($loan->devolution))}}
                                </td>
                                <td>
                                    @if($loan->status == 1)
                                        <span class="label label-success">Devolvido</span>
                                    @else
                                        <span class="label label-warning">Pendente</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary" role="button"  data-toggle="modal" data-target="#modalEditStatus{{$loan->id}}"><i class="fa fa-pencil"></i></a>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger" role="button"  data-toggle="modal" data-target="#modalDelete{{$loan->id}}{{$loan->location}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Editar status -->
                            <div class="modal fade" id="modalEditStatus{{$loan->id}}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Devolução - {{$loan->book_name}} [{{$loan->name}}]</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post" action="{{route('admin::loan.update', $loan->id)}}">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option selected disabled>-- Selecione uma opção --</option>
                                                        <option value="1" {{$loan->status == 1 ? 'selected' : ''}}>Devolvido</option>
                                                        <option value="0" {{$loan->status == 0 ? 'selected' : ''}}>Pendente</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Data de devolução:</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input required name="devolution" type="date" class="form-control pull-right">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success btn-block">Editar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalDelete{{$loan->id}}{{$loan->location}}" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Devolução - {{$loan->book_name}} [{{$loan->name}}]</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                            <form action="{{route('admin::loan.destroy', $loan->id)}}" method="post">
                                <div class="col-md-offset-3">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </div>
                                    <p>Deseja realmente excluir este empréstimo?</p>
                                    <button type="submit" class="btn btn-danger btn-block">Excluir</button>
                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
            </div>
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fa fa-info-circle"></i> Nenhum empréstimo cadastrado.
                </div>
            @endif
        </div>
    </div>
    <script>
        $(function () {
            $('#loans').DataTable()
        });
    </script>
@endsection
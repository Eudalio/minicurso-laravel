@extends('admin.layouts.app')
@section('content')
    <style>
        textarea {
            resize: none;
        }
    </style>
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastro</h3>
            </div>
            @if(Session::has('success'))
                <div class="box-body">
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('success')}}
                    </div>
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="box-body">
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span class="sr-only">Error:</span>
                        @foreach($errors->all() as $error)
                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> {{$error}}<br>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="box-body">
                <form @if($data['type'] == 'edit') action="{{route($data['route'], $data['id'])}}" @else action="{{route($data['route'])}}" @endif method="{{$data['method']}}">
                    @if($data['type'] == 'edit')
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @else
                    <!-- CSRF Token -->
                        {{ csrf_field() }}
                    @endif
                    @if(!$students->isEmpty() && !$books->isEmpty())
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Aluno</label>
                                <select required name="student" class="form-control select2" style="width: 100%;">
                                    <option disabled selected value>Selecione o aluno</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}" {{$data['type'] == 'edit' && $data['student'] == $student->id ? 'selected' : ''}}>{{$student->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Livro</label>
                                <select required name="book" class="form-control select2" style="width: 100%;">
                                    <option disabled selected value>Selecione o livro</option>
                                    @foreach($books as $book)
                                        <option @if($book->amount == 0) disabled @endif value="{{$book->id}}" {{$data['type'] == 'edit' && $data['book'] == $book->id ? 'selected' : ''}}>{{$book->book_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Data de empréstimo - Data de devolução</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input name="dates" type="text" class="form-control pull-right" id="reservation"/>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="checkbox">
                                <label>
                                    <input name="status" type="checkbox" {{$data['type'] == 'edit' && $data['status'] == 1 ? 'checked' : ''}}> Devolvido
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-primary">@if($data['type'] == 'create')Cadastrar @else Editar @endif</button>
                        @if($data['type'] == 'edit')
                            &nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-danger" role="button"  data-toggle="modal" data-target="#myModalExcluir{{$data['id']}}">Excluir</a>
                        @endif
                    </div>
                </form>
            @if($data['type'] == 'edit')
                <!--Exluir-->
                    <div class="modal fade" id="myModalExcluir{{$data['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir empréstimo para - {{$data['name']}}</h5>
                                </div>
                                <form action="{{route('admin::loan.destroy', $data['id'])}}" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">Você realmente deseja excluir este empréstimo?</div>
                                        <div class="row">
                                            <div class="col-md-offset-3">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
                @if($data['type'] == 'edit')
                    <div class="box-body">
                        <a href="{{route('admin::loan.index')}}" class="link"><i class="fa fa-angle-left"></i> Voltar</a>
                    </div>
                @endif
            </div>
            @else
                <div class="box-body">
                    <div class="alert alert-info alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="fa fa-info-circle"></i> Antes de fazer um empréstimo é necessário cadastrar alunos e livros.
                    </div>
                </div>
            @endif
            @if($data['type'] != 'edit')
                <div class="box-body pull-right">
                    <a href="{{route('admin::loan.index')}}" class="link">  Listar todos <i class="fa fa-angle-right"></i></a>
                </div>
            @endif
        </div>
    </div>
    <script>
        function setEditModalIndexAdmin(id){
            $('#statusModal' + id).modal('show');
        }
    </script>
@endsection
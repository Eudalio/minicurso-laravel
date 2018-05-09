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
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Matrícula <small style="color: #999;">(Opcional)</small></label>
                                <input name="registration" type="text" class="form-control" value="{{$data['type'] == 'create' ? old('registration') : $data['registration']}}" id="exampleInputEmail1"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nome</label>
                                <input required name="name" type="text" value="{{$data['type'] == 'create' ? old('name') : $data['name']}}" class="form-control" id="exampleInputEmail1">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email <small style="color: #999;">(Opcional)</small></label>
                                <input name="email" type="email" class="form-control" value="{{$data['type'] == 'create' ? old('email') : $data['email']}}" id="exampleInputEmail1"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefone <small style="color: #999;">(Opcional)</small></label>
                                <input data-inputmask='"mask": "(99) 9999-9999"' data-mask name="phone" type="text" class="form-control" value="{{$data['type'] == 'create' ? old('phone') : $data['phone']}}" id="exampleInputEmail1"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Série</label>
                                <input required name="serie" type="text" class="form-control" value="{{$data['type'] == 'create' ? old('serie') : $data['serie']}}" id="exampleInputEmail1"/>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Excluir aluno - {{$data['name']}}</h5>
                                </div>
                                <form action="{{route('admin::student.destroy', $data['id'])}}" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group">Você realmente deseja excluir este aluno?</div>
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
                        <a href="{{route('admin::student.index')}}" class="link"><i class="fa fa-angle-left"></i> Voltar</a>
                    </div>
                @endif
            </div>
            @if($data['type'] != 'edit')
                <div class="box-body pull-right">
                    <a href="{{route('admin::student.index')}}" class="link">  Listar todos <i class="fa fa-angle-right"></i></a>
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
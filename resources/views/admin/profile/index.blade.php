@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <div class="text-center">
                <i style="font-size: 100px;" class="fa fa-user-circle"></i>
            </div>
            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

            <p class="text-muted text-center">Administrador</p>

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
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('admin::profile.update', Auth::user()->id)}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input required name="name" type="text" value="{{Auth::user()->name}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input required name="email" type="text" value="{{Auth::user()->email}}" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Senha</label>
                        <input name="password" type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection
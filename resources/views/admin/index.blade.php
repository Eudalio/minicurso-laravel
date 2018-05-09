@extends('admin.layouts.app')
@section('content')
    <!-- Info boxes -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-sad-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Pendências</span>
                <span class="info-box-number">{{$pendencies}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-happy-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Devoluções</span>
                <span class="info-box-number">{{$returns}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Quantidade de Livros</span>
                <span class="info-box-number">{{$books}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Número de Alunos</span>
                <span class="info-box-number">{{count($students)}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.row -->

    <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">  <i class="fa fa-bell"></i> Notificações</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Tabela com usuários-->
                    @if(!$loans->isEmpty())
                        <table id="students" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Ordenar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($loans as $loan)
                                @if(date('Y-m-d') > $loan->devolution)
                                    <tr>
                                        <td>
                                            <span style="color:red;">{{$loan->name}}</span> do
                                            <span style="color:red;">{{$loan->serie}}</span>
                                            está com a data de devolução do livro
                                            <span style="color:red;">{{$loan->book_name}}</span>
                                            atrasado.
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                </div>
                @else
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle"></i> Nenhuma notificação.
                    </div>
                @endif
            </div>
    </div>
        <script>
            $(function () {
                $('#students').DataTable()
            })
        </script>
@endsection
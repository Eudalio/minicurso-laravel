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
                @if(!$students->isEmpty())
                    <table id="books" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Série</th>
                            <th>Email</th>
                            <th>Telefone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr onmouseover="this.style.cursor='pointer'" onclick="setPageEditStudent({{$student->id}})">
                                <td>
                                    {{!is_null($student->registration) ? $student->registration : '-'}}
                                </td>
                                <td>
                                    {{$student->name}}
                                </td>
                                <td>
                                    {{$student->serie}}
                                </td>
                                <td>
                                    {{!is_null($student->email) ? $student->email : '-'}}
                                </td>
                                <td>
                                    {{!is_null($student->phone) ? $student->phone : '-'}}
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
        function setPageEditStudent(id) {
            window.location.href = window.location.pathname +'/' +  id + '/edit';
        }

        $(function () {
            $('#books').DataTable();
        });
    </script>
@endsection
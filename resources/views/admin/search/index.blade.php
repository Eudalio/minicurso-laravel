@extends('admin.layouts.app')
@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Resultado para &ldquo;<em>{{$data['search']}}</em>&rdquo;</h3>
            </div>
            <div class="box-body">
                @if(!is_null($data['count']))
                    @if(!$data['searchBooks']->isEmpty())
                        <h4 class="card-title">Acervo literário</h4>
                        <hr>
                        @foreach($data['searchBooks'] as $book)
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="{{route('admin::book.edit', $book->id)}}">
                                    Nome: {{$book->book_name}},
                                    Autor: {{$book->author}}...</a>
                                <br>
                        @endforeach
                        <br>
                    @endif

                    @if(!$data['searchStudents']->isEmpty())
                        <h4 class="card-title">Alunos</h4>
                        <hr>
                        @foreach($data['searchStudents'] as $student)
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="{{route('admin::student.edit', $student->id)}}">
                                    Nome: {{$student->name}},
                                    Série: {{$student->serie}},
                                    Email: {{$student->email}}...</a>
                                <br>
                        @endforeach
                        <br>
                    @endif

                    @if(!$data['searchLoan']->isEmpty())
                        <h4 class="card-title">Empéstimos</h4>
                        <hr>
                        @foreach($data['searchLoan'] as $loan)
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                <a href="{{route('admin::loan.index')}}">
                                    Aluno: {{$loan->name}}, Livro: {{$loan->book_name}}
                                   ...</a><br>
                        @endforeach
                    @endif
                @else
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-info-circle"></i> Nenhum resultado encontrado.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
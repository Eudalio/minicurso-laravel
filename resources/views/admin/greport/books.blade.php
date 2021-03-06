<?php date_default_timezone_set('America/Fortaleza');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RELATÓRIO DOS {{mb_strtoupper($type)}}</title>
    <link rel="stylesheet" href="{{asset('report/app.css')}}" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{asset('dist/img/logo.png')}}" alt="LOGO">
    </div>
    <h1>RELATÓRIO DOS {{mb_strtoupper($type)}}
    </h1>

    <div id="company" class="clearfix">
        <div>EEM João Alves Moreira</div>
        <div>Praça Cônego Demétrio Elizeu de Lima,<br /> Vazantes, Aracoiaba - CE</div>
        <div>(85) 3337-4061</div>
        <div><a href="mailto:jmoreira@escola.ce.gov.br">jmoreira@escola.ce.gov.br</a></div>
    </div>
    <div id="project">
        <div><label style="color: #999;">USUÁRIO</label> {{$user}}</div>
        <div><label style="color: #999;">MATRÍCULA</label> {{$registration}}</div>
        <div><label style="color: #999;">EMISSÃO</label> {{date('d/m/Y')}} às {{date('H:i')}}</div>
    </div>
</header>
<main>
    @if(!$books->isEmpty())
    <table>
        <thead>
        <tr>
            <th class="service">ISBN</th>
            <th class="desc">TÍTULO</th>
            <th>AUTOR</th>
            <th>ANO</th>
            <th>GÊNERO/ÁREA</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
        <tr>
            <td class="service">{{!is_null($book->isbn) ? $book->isbn : '-'}}</td>
            <td class="desc">{{$book->book_name}}</td>
            <td class="desc">{{$book->author}}</td>
            <td class="desc">{{$book->year}}</td>
            <td class="desc">{{$book->genre}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div><h4>TOTAL DE {{mb_strtoupper($type)}}: {{$amount}}</h4></div>
    @else
        <div id="notices">
            <div style="font-size: 15px;">ALERTA:</div>
            <div class="notice" style="font-size: 15px;">Nenhum livro cadastrado.</div>
        </div>
    @endif
</main>
</body>
</html>
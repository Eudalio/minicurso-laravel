<?php date_default_timezone_set('America/Fortaleza');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>RELATÓRIO DOS EMPRÉSTIMOS</title>
    <link rel="stylesheet" href="{{asset('report/app.css')}}" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="{{asset('dist/img/logo.png')}}" alt="LOGO">
    </div>
    <h1>RELATÓRIO DOS EMPRÉSTIMOS
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
    @if(!$loans->isEmpty())
        <table>
            <thead>
            <tr>
                <th class="service">ALUNO</th>
                <th class="desc">LIVRO</th>
                <th>DATA EMPRÉSTIMO</th>
                <th>DATA DEVOLUÇÃO</th>
                <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($loans as $loan)
                <tr>
                    <td class="service">{{$loan->name}}</td>
                    <td class="desc">{{$loan->book_name}}</td>
                    <td class="desc">{{date('d/m/Y', strtotime($loan->loan))}}</td>
                    <td class="desc">{{date('d/m/Y', strtotime($loan->devolution))}}</td>
                    <td class="desc">{{$loan->status == 1 ? 'DEVOLVIDO' : 'PENDENTE'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            <h4>TOTAL DE LIVROS DEVOLVIDOS: {{$returns}} <br>  TOTAL DE LIVROS PENDENTES: {{$pendencies}} <br>  TOTAL DE EMPRÉSTIMOS: {{count($loans)}}</h4>
        </div>
    @else
        <div id="notices">
            <div style="font-size: 15px;">ALERTA:</div>
            <div class="notice" style="font-size: 15px;">Nenhum empréstimo cadastrado.</div>
        </div>
    @endif
</main>
</body>
</html>
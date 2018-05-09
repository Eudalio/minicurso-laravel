<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'MultimeiosV2') }} | {{$page}}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('dist/img/favicon.png')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('bower_components/Ionicons/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{url('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('bower_components/morris.js/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{url('bower_components/jvectormap/jquery-jvectormap.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <!-- jQuery 3 -->
    <script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Header -->
    @include('admin.layouts.header')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <i class="fa fa-user-circle" style="color: white; font-size: 30px;"></i>
                </div>
                <div class="pull-left info">
                    <p>{{mb_strimwidth(Auth::user()->name, 0, 16, "...")}}</p>
                </div>
            </div>
            <!-- search form -->
            <form action="{{route('admin::search')}}" method="POST" class="sidebar-form">
                <!-- CSRF Token -->
                {{ csrf_field() }}
                <div class="input-group">
                    <input required type="text" name="q" class="form-control" placeholder="Pesquisar...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li>
                    <a href="{{route('admin::dashboard.index')}}">
                        <i class="fa fa-th"></i> <span>Dashboard</span>
                        <span class="pull-right-container">
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i> <span>Acervo literário</span>
                        <span class="pull-right-container">
                        </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin::book.create')}}"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                        <li><a href="{{route('admin::book.index')}}"><i class="fa fa-circle-o"></i> Listar</a></li>
                        <li><a target="_blank" href="{{route('admin::greport.books')}}"><i class="fa fa-circle-o"></i> Gerar relatório</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span>Alunos</span>
                        <span class="pull-right-container">
                        </span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin::student.create')}}"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                        <li><a href="{{route('admin::student.index')}}"><i class="fa fa-circle-o"></i> Listar</a></li>
                        <li><a target="_blank" href="{{route('admin::greport.students')}}"><i class="fa fa-circle-o"></i> Gerar relatório</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-clipboard"></i>
                        <span>Empréstimos</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin::loan.create')}}"><i class="fa fa-circle-o"></i> Cadastrar</a></li>
                        <li><a href="{{route('admin::loan.index')}}"><i class="fa fa-circle-o"></i> Listar</a></li>
                        <li><a target="_blank" href="{{route('admin::greport.loans')}}"><i class="fa fa-circle-o"></i> Gerar relatório</a></li>
                    </ul>
                </li>
                <li class="header">ALERTAS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Crítico</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Atenção</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Informação</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-success"></i> <span>Sucesso</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$page}}
            </h1>
            @if(Route::currentRouteName() != 'admin::dashboard.index')
                <ol class="breadcrumb">
                    <li><a href="{{route('admin::dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">{{$page}}</li>
                </ol>
            @endif
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- Content -->
                @yield('content')
            </div>
        </section>
    </div>
    <!-- Scripts and Footer-->
    @include('admin.layouts.footer')
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <!-- /.control-sidebar-menu -->
                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
            </div>
    </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery UI 1.11.4 -->
<script src="{{url('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{url('js/bootbox.min.js')}}"></script>

<script src="{{url('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{url('plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{url('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>

<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.js')}}"></script>

<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>

<script src="{{url('js/scripts.js')}}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.carousel').carousel();
        $('[data-mask]').inputmask();
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        );
        //Date range picker
        $('#reservation').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
    });
</script>
</body>
</html>
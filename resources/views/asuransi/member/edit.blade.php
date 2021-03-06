<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    @if(Auth::user()->type=="admin")
        <title>D' Assurance - Admin</title>
    @else(Auth::user()->type=="user")
        <title>D' Assurance - Member</title>
    @endif

    <!-- Bootstrap Core CSS -->
    {!! HTML::style('member/css/bootstrap.min.css') !!}
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    {!! HTML::style('member/css/sb-admin.css') !!}
   <!--  <link href="css/sb-admin.css" rel="stylesheet"> -->

    <!-- Morris Charts CSS -->
    {!! HTML::style('member/css/plugins/morris.css') !!}
    <!-- <link href="css/plugins/morris.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    {!! HTML::style('member/font-awesome/css/font-awesome.min.css') !!}
    <!-- <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/asuransi/member/index">Welcome {{ Auth::user()->nama }}</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->nama }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/asuransi/member/setting"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/asuransi/member/index"><i class="fa fa-fw fa-desktop"></i> Home</a>
                    </li>
                    @if(Auth::user()->type=="user")
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#input"><i class="fa fa-fw fa-arrows-v"></i> Input <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="input" class="collapse">
                                <li>
                                    <a href="/asuransi/member/permintaan"><i class="fa fa-fw fa-edit"></i> Permintaan</a>
                                </li>
                                <li>
                                    <a href="/asuransi/member/setoran"><i class="fa fa-fw fa-edit"></i> Setoran</a>
                                </li>
                            </ul>
                        </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#history"><i class="fa fa-fw fa-arrows-v"></i> History <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="history" class="collapse">
                            <li>
                                <a href="/asuransi/member/history/permintaan"><i class="fa fa-fw fa-table"></i> History Permintaan</a>
                            </li>
                            <li>
                                <a href="/asuransi/member/history/setoran"><i class="fa fa-fw fa-table"></i> History Setoran</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->type=="admin")
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#history"><i class="fa fa-fw fa-arrows-v"></i> History <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="history" class="collapse">
                                <li>
                                    <a href="/asuransi/member/histori/permintaan"><i class="fa fa-fw fa-table"></i> History Permintaan</a>
                                </li>
                                <li>
                                    <a href="/asuransi/member/histori/setoran"><i class="fa fa-fw fa-table"></i> History Setoran</a>
                                </li>
                                <li>
                                    <a href="/asuransi/member/histori/kritik-saran"><i class="fa fa-fw fa-table"></i> History Kritik/Saran </a>
                                </li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="/asuransi/member/list"><i class="fa fa-fw fa-table"></i> List Anggota</a>
                        </li>
                    @endif
                    <li>
                        <a href="/asuransi/member/setting"><i class="fa fa-fw fa-wrench"></i> Setting Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
@if(Auth::user()->type=="admin")
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            List Anggota
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-desktop"></i>  <a href="/asuransi/member/index">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> List Anggota
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            
                <div class="row">
                <div class="col-lg-6">
                        <h2>Edit</h2>
                        <div class="table-responsive">
                            <form action="{{ url('asuransi/member/edit/update') }}" method="POST">
                            <table class="table hovered" style="width: 100%">
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                                <tr>
                                    <td>Nama</td><td>:</td>
                                    <td><div class="input-control text full-size">
                                                <input class="form-control" type="text" value="{{ $data->nama }}" name="nama" autocomplete="off">
                                            </div></td>
                                </tr>
                                <tr>
                                    <td>Username</td><td>:</td>
                                    <td><div class="input-control text full-size">
                                                <input class="form-control" type="text" value="{{ $data->username }}" name="username" autocomplete="off" disabled>
                                            </div></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td><td>:</td>
                                    <td>
                                        <select class="form-control" name="jenisKelamin">
                                        @if($data->jenisKelamin=='Laki-laki')
                                            <option selected>Laki-Laki</option>
                                            <option>Perempuan</option>
                                        @else
                                            <option>Laki-Laki</option>
                                            <option selected>Perempuan</option>
                                        @endif 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td><td>:</td>
                                    <td><div class="input-control text" data-role="datepicker">
                                            <input class="form-control" type="text" name="ttl" value="{{ $data->ttl }}">                                                    
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td><td>:</td>
                                    <td><div class="input-control text" data-role="datepicker">
                                            <textarea class="form-control" type="text" name="alamat">{{ $data->alamat }}</textarea>                                                    
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No Telepon/HP</td><td>:</td>
                                    <td><div class="input-control text" data-role="datepicker">
                                            <input class="form-control" type="text" name="no_tlp" value="{{ $data->no_tlp }}">                                                    
                                        </div>
                                    </td>
                                </tr>
                            </table>    
                            <button type="submit" class="btn btn-default">Edit</button>
                            <a href="{{ url('asuransi/member/detail/'.$data->id) }}"><div class="btn btn-default" onclick="return confirm('Batal ?')">Batal</div></a>
                            </form>   
                            <br>      
                    <!-- <div class="col-lg-6">
                        <h2>Bordered Table</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                <!-- /.row -->

                <!-- <div class="row">
                    <div class="col-lg-6">
                        <h2>Basic Table</h2>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Striped Rows</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- <div class="row">
                    <div class="col-lg-6">
                        <h2>Contextual Classes</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Page</th>
                                        <th>Visits</th>
                                        <th>% New Visits</th>
                                        <th>Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="active">
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr class="success">
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr class="warning">
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr class="danger">
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2>Bootstrap Docs</h2>
                        <p>For complete documentation, please visit <a target="_blank" href="http://getbootstrap.com/css/#tables">Bootstrap's Tables Documentation</a>.</p>
                    </div>
                </div> -->
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    @else(Auth::user()->type=="user")
    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <a href="/asuransi/member/index">Go Back</a>
                        </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-desktop"></i>  <a href="/asuransi/member/index">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> <a href="/asuransi/member/index">Back off</a>
                            </li>
                        </ol> -->
                    </div>
                </div>
                <br>
                 </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    @endif
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!! HTML::script('member/js/jquery.js') !!}
    <!-- /*<script src="js/jquery.js"></script>*/ -->

    <!-- Bootstrap Core JavaScript -->
    {!! HTML::script('member/js/bootstrap.min.js') !!}
    <!-- /*<script src="js/bootstrap.min.js"></script>*/ -->

</body>

</html>

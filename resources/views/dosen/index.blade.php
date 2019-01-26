<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{URL::asset('public/bare/vendor/bootstrap/css/bootstrap.min.css')}}">

    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
<!--    <div class="container">-->
<!--      <div class="row">-->
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Welcome, {{Session::get('name')}}</h1>
        </div>
                
            @if (session('alert'))
                <div class="alert">
                    {{ session('alert') }}
                </div>
            @endif
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-body">
                    <h4 style="display:inline-block; float:left;">Data Bimbingan Revisi {{Session::get('name')}} </h4>
                    <a href="{{route('changepassword')}}" style="float: right;">Change Password?</a>
                    <div class="table" style="overflow: auto">
                    <table id="revisi" class="table table-bordered table-striped">
                        <thead align="center" valign="center">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Revisi</th>
                                <th>Proposal</th>
                                <th>Proposal Revisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rev as $r)
                            <tr>
                                <td>{{$r->nim}}</td>
                                <td>{{$r->nama}}</td>
                                <td>{{$r->judul}}</td>
                                <td><pre>{{$r->revisi}}</pre></td>
                                <td><a href="public/upload/{{$r->proposal}}" download>{{$r->proposal}}</a></td>
                                <td><a href="public/upload/{{$r->revisi_proposal}}" download>{{$r->revisi_proposal}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>  
          
            <div class="box box-primary">
                <div class="box-body">
                    <h4 style="display:inline-block; float:left;">Data Semua Bimbingan {{Session::get('name')}} </h4>
                    <div class="table" style="overflow: auto">
                    <table id="dosen" class="table table-bordered table-striped">
                        <thead align="center" valign="center">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Keterangan</th>
                                <th>Jadwal</th>
                                <th>Proposal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mhs as $m)
                            <tr>
                                <td>{{$m->nim}}</td>
                                <td>{{$m->nama}}</td>
                                <td>{{$m->judul}}</td>
                                <td>{{$m->keterangan}}</td>
                                <td>{{$m->tanggal}}<br>{{$m->jam}}<br>{{$m->ruangan}}</td>
                                <td><a href="public/upload/{{$m->proposal}}" download>{{$m->proposal}}</a></td>
                                <td>{{$m->status}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>  
        </div>  
<!--      </div>-->
<!--    </div>-->

    <!-- Bootstrap core JavaScript -->
    <script src="public/bare/vendor/jquery/jquery.min.js"></script>
    <script src="public/bare/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
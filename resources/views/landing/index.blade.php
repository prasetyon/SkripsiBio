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
<!--        Change per Role as Session      -->
             @if(Session::get('role')=='admin')  <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
             @elseif(Session::get('role')=='dosen')  <a class="nav-link" href="{{ route('dosen') }}">Profil</a>
             @elseif(Session::get('role')=='mhs')  <a class="nav-link" href="{{ route('mahasiswa') }}">Profil</a>
             @else  <a class="nav-link" href="{{ route('login') }}">Login</a>
            @endif
            </li>
            @if(Session::has('role')) 
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a> 
              </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Monitoring Proposal, Skripsi, dan Thesis</h1>
          <p class="lead">Departemen Biologi, FST, Universitas Airlangga</p>
        </div>
        
      </div>
    </div>

      <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-body">
<!--                    <h3 class="text-center">Data Skrispi dan Thesis</h3>-->
                    <div class="table-responsive" style="overflow: auto">
                    <table id="data" class="table table-bordered table-striped">
                    @php $count = 1 @endphp
                        <thead align="center" valign="center">
                          <tr>
                            <th width="10%">Status</th>
                            <th width="5%">NIM</th>
                            <th width="12%">Nama</th>
                            <th width="28%">Judul</th>
                            <th width="10%">Pelaksanaan</th>
                            <th width="7%">Penguji 1</th>
                            <th width="7%">Penguji 2</th>
                            <th width="7%">Penguji 3</th>
                            <th width="7%">Penguji 4</th>
                            <th width="7%">Penguji 5</th>
                          </tr>
                        </thead>
                        @if(count($data))
                        <tbody>
                          @foreach($data as $d)
                          <tr>
                            <td>{{$d->status}}</td>
                            <td>{{$d->nim}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->judul}}</td>
                            <td>{{$d->tanggal}}<br>{{$d->jam}}<br>{{$d->ruangan}}</td>
                            <td>{{$d->pembimbing1}}</td>
                            <td>{{$d->pembimbing2}}</td>
                            <td>{{$d->penguji1}}</td>
                            <td>{{$d->penguji2}}</td>
                            <td>{{$d->penguji3}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                        @endif
                      </table>
                    </div> 
                </div>
            </div>
        </div>
      
    <!-- Bootstrap core JavaScript -->
    <script src="public/bare/vendor/jquery/jquery.min.js"></script>
    <script src="public/bare/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Info Mahasiswa</title>

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
              <a class="nav-link" href="{{ route('mahasiswa') }}">Profil</a>
            </li>
            @if(!$terdaftar)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('datamhs') }}">Daftar Proposal @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</a>
            </li>
            @elseif($mhs[0]->status==0) 
            <li class="nav-item">
              @if($mhs[0]->ruangan_sidang_akhir!=null)<a class="nav-link" href="{{ route('revisiakhir') }}">Revisi</a>
              @else<a class="nav-link" href="{{ route('revisi') }}">Revisi</a>
              @endif
            </li>
            @elseif($mhs[0]->status==3)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('sidangakhir') }}">Update Data Sidang @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</a>
            </li>
            @elseif($mhs[0]->status==6)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('lempeng') }}">Upload Lembar Pengesahan</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{ route('file') }}">File</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Info Proposal dan Skripsi {{Session::get('name')}}</h1>
          <p class="lead">Departemen Biologi, FST, Universitas Airlangga</p>
        </div>
        
        &nbsp;
        
        <div class="col-lg-12">
            @if(session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            <div class="box box-primary">
                <div class="box-body">
                    <h4 style="display:inline-block; float:left;">Data {{Session::get('name')}} </h4>
                    <a href="{{route('changepassword')}}" style="float: right;">Change Password?</a>
                    <div class="table" style="overflow: auto">
                    <table id="revisi" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="20%">NIM</td>
                                <td>{{$mhs[0]->nim}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Nama</td>
                                <td>{{$mhs[0]->nama_mhs}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Judul</td>
                                <td>
                                    @if(!$terdaftar) 
                                        Judul tidak terdaftar
                                    @else 
                                        {{$mhs[0]->judul}}
                                    @endif
                                </td>
                            </tr>
                            @if($terdaftar)
                            <tr>
                                <td width="20%">Status</td>
                                <td>{{$mhs[0]->statuss}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Pembimbing 1</td>
                                <td>{{$mhs[0]->nama_pembimbing_1}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Pembimbing 2</td>
                                <td>{{$mhs[0]->nama_pembimbing_2}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            @if($terdaftar)
            <div class="box box-primary">
                <div class="box-body">
                    <h4>Data Proposal {{Session::get('name')}}</h4>
                    <div class="table" style="overflow: auto">
                    <table id="revisi" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="20%">Proposal</td>
                                <td><a href="public/upload/{{$mhs[0]->proposal}}" download>{{$mhs[0]->proposal}}</a></td>
<!--                                <td>{{$mhs[0]->proposal}}</td>-->
                            </tr>
                            <tr>
                                <td>Jadwal Sidang Proposal</td>
                                <td>{{$mhs[0]->tanggal_sidang_proposal.' '.$mhs[0]->jam_sidang_proposal}}</td>
                            </tr>
                            <tr>
                                <td>Ruangan Sidang Proposal</td>
                                <td>{{$mhs[0]->ruangan_sidang_proposal}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 1</td>
                                <td>{{$mhs[0]->nama_pembimbing_1}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 2</td>
                                <td>{{$mhs[0]->nama_pembimbing_2}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 3</td>
                                <td>{{$mhs[0]->nama_penguji_1}}</td>
                            </tr>
                            @if($mhs[0]->strata=='S2')
                            <tr>
                                <td>Penguji 4</td>
                                <td>{{$mhs[0]->nama_penguji_2}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-body">
                    @if($mhs[0]->strata=='S1') <h4>Data Skripsi {{Session::get('name')}}</h4> @php $final='Skripsi'; @endphp
                    @else <h4>Data Thesis {{Session::get('name')}}</h4> @php $final='Thesis'; @endphp @endif
                    <div class="table" style="overflow: auto">
                    <table id="revisi" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="20%">Buku</td>
                                <td><a href="public/upload/{{$mhs[0]->buku}}" download>{{$mhs[0]->buku}}</a></td>
<!--                                <td>{{$mhs[0]->proposal}}</td>-->
                            </tr>
                            <tr>
                                <td width="20%">Jadwal Sidang {{$final}}</td>
                                <td>{{$mhs[0]->tanggal_sidang_akhir.' '.$mhs[0]->jam_sidang_akhir}}</td>
                            </tr>
                            <tr>
                                <td>Ruangan Sidang {{$final}}</td>
                                <td>{{$mhs[0]->ruangan_sidang_akhir}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 1</td>
                                <td>{{$mhs[0]->nama_pembimbing_1}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 2</td>
                                <td>{{$mhs[0]->nama_pembimbing_2}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 3</td>
                                <td>{{$mhs[0]->nama_penguji_1}}</td>
                            </tr>
                            <tr>
                                <td>Penguji 4</td>
                                <td>{{$mhs[0]->nama_penguji_2}}</td>
                            </tr>
                            @if($mhs[0]->strata=='S2')
                            <tr>
                                <td>Penguji 5</td>
                                <td>{{$mhs[0]->nama_penguji_3}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    </div> 
                </div>
            </div>
            @endif
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="public/bare/vendor/jquery/jquery.min.js"></script>
    <script src="public/bare/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
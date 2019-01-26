<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Daftar Skripsi</title>

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
            <li class="nav-item">
              <a class="nav-link" href="{{ route('revisi') }}">Revisi</a>
            </li>
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
            <h1 class="mt-5">Revisi Sidang Akhir {{Session::get('name')}}</h1>
        </div>
        <form class="col-lg-12" role="form" action="{{route('revisiakhir')}}" method="post" enctype="multipart/form-data">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            <div class="box box-primary">
                <div class="box-body">
                    <div class="table" style="overflow: auto">
                    <table id="revisi" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <input type="text" name="nim" value="{{$mhs[0]->nim}}" hidden>
                                <td width="20%">NIM</td>
                                <td>{{$mhs[0]->nim}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Nama</td>
                                <td>{{$mhs[0]->nama_mhs}}</td>
                            </tr>
                            <tr>
                                <td width="20%">Revisi</td>
                                <td><pre>{{$mhs[0]->revisi}}</pre></td>
                            </tr>
                            <tr>
                                <td width="20%">Revisi Buku</td>
                                <td> <input type="file" accept="application/pdf" id="buku" name="buku" placeholder="" style="width:100%" required> </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success" style="float: right;">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="public/bare/vendor/jquery/jquery.min.js"></script>
    <script src="public/bare/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
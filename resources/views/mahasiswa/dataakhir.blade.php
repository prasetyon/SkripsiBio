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
              <a class="nav-link" href="{{ route('sidangakhir') }}">Daftar @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</a>
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
            <h1 class="mt-5">Daftar Sidang @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif {{Session::get('name')}}</h1>
        </div>
        <form class="col-lg-12" role="form" action="{{route('sidangakhir')}}" method="post" enctype="multipart/form-data">
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
                                <td width="20%">Buku</td>
                                <td> <input type="file" accept="application/pdf" id="buku" name="buku" placeholder="" style="width:100%" required> </td>
                            </tr>
                            <tr>
                                <td width="20%">Pembimbing 1</td>
                                <td> 
                                    <select class="form-control" name="pembimbing1" required>
                                        <option value="0"> --  Pilih Dosen Pembimbing 1 --</option>
                                        @for($i=0; $i<sizeof($dosen);$i++)
                                            <option value="{{$dosen[$i]->nip.'$'.$dosen[$i]->nama_dosen}}" @if($dosen[$i]->nip==$mhs[0]->pembimbing_1) selected @endif>{{$dosen[$i]->nama_dosen}}</option>
                                        @endfor
                                    </select> 
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Pembimbing 2</td>
                                <td> 
                                    <select class="form-control" name="pembimbing2" required>
                                        <option value="0"> --  Pilih Dosen Pembimbing 2 --</option>
                                        @for($i=0; $i<sizeof($dosen);$i++)
                                            <option value="{{$dosen[$i]->nip.'$'.$dosen[$i]->nama_dosen}}" @if($dosen[$i]->nip==$mhs[0]->pembimbing_2) selected @endif>{{$dosen[$i]->nama_dosen}}</option>
                                        @endfor
                                    </select> 
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Penguji 1</td>
                                <td> 
                                    <select class="form-control" name="penguji1" required>
                                        <option value="0"> --  Pilih Dosen Penguji 1 --</option>
                                        @for($i=0; $i<sizeof($dosen);$i++)
                                            <option value="{{$dosen[$i]->nip.'$'.$dosen[$i]->nama_dosen}}" @if($dosen[$i]->nip==$mhs[0]->penguji_1) selected @endif>{{$dosen[$i]->nama_dosen}}</option>
                                        @endfor
                                    </select> 
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">Penguji 2</td>
                                <td> 
                                    <select class="form-control" name="penguji2" required>
                                        <option value="0"> --  Pilih Dosen Penguji 2 --</option>
                                        @for($i=0; $i<sizeof($dosen);$i++)
                                            <option value="{{$dosen[$i]->nip.'$'.$dosen[$i]->nama_dosen}}" @if($dosen[$i]->nip==$mhs[0]->penguji_2) selected @endif>{{$dosen[$i]->nama_dosen}}</option>
                                        @endfor
                                    </select> 
                                </td>
                            </tr>
                            @if($mhs[0]->strata=='S2')
                            <tr>
                                <td width="20%">Penguji 3</td>
                                <td> 
                                    <select class="form-control" name="penguji3" required>
                                        <option value="0"> --  Pilih Dosen Penguji 3 --</option>
                                        @for($i=0; $i<sizeof($dosen);$i++)
                                            <option value="{{$dosen[$i]->nip.'$'.$dosen[$i]->nama_dosen}}">{{$dosen[$i]->nama_dosen}}</option>
                                        @endfor
                                    </select> 
                                </td>
                            </tr>
                            @else <input id="penguji3" name="penguji3" value="null" style="width:100%" hidden>
                            @endif
                            <tr>
                                <td width="20%">Tanggal Sidang @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</td>
                                <td> <input type="date" id="tanggal" name="tanggal" placeholder="" style="width:100%" required> </td>
                            </tr>
                            <tr>
                                <td width="20%">Jam Sidang @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</td>
                                <td> 
                                    <select class="form-control" name="jam" required>
                                        <option value="0"> --  Pilih Waktu --</option>
                                        @for($i=0; $i<sizeof($jam);$i++)
                                            <option value="{{$jam[$i]->id_jam}}">{{$jam[$i]->mulai.' - '.$jam[$i]->selesai}}</option>
                                        @endfor
                                    </select>
                                </td>
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
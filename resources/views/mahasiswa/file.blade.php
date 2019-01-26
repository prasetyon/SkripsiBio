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
              <a class="nav-link" href="{{ route('mahasiswa') }}">Profil</a>
            </li>
            @if(!$terdaftar)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('datamhs') }}">Daftar @if($mhs[0]->strata=='S1') Skripsi @else Thesis @endif</a>
            </li>
            @elseif($mhs[0]->status==0) 
            <li class="nav-item">
              <a class="nav-link" href="{{ route('revisi') }}">Revisi</a>
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
            <h1 class="mt-5">Welcome, {{Session::get('name')}}</h1>
        </div>
        &nbsp;
        
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-body">
                    <h4>File Keperluan Skripsi {{Session::get('name')}}</h4>
                    <div class="table" style="overflow: auto">
                    <table id="file" class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="40%">Form Proposal</td>
                                @if($mhs[0]->undangan_proposal==null)
                                <td><a href="{{'public/FILE/FORM_PROPOSAL.doc'}}" download>Form Proposal</a></td>
                                @else
                                <td><a href="{{$mhs[0]->undangan_proposal}}" download>Form Proposal</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td width="40%">Form Skripsi</td>
                                @if($mhs[0]->undangan_akhir==null)
                                <td><a href="{{'public/FILE/FORM_SKRIPSI.doc'}}" download>Form Skripsi/Thesis</a></td>
                                @else
                                <td><a href="{{$mhs[0]->undangan_akhir}}" download>Form Skripsi/Thesis</a></td>
                                @endif
                            </tr>
                            <tr>
                                <td width="40%">Form Usulan Perbaikan Alat Lab</td>
                                <td><a href="public/FILE/FORM_USULAN_PERBAIKAN_ALAT_LAB.doc" download>Form Usulan Perbaikan Alat Lab</a></td>
                            </tr>
                            <tr>
                                <td width="40%">Form Pinjam Alat Keluar Kampus</td>
                                <td><a href="public/FILE/FORM_PINJAM_ALAT_KELUAR_KAMPUS.doc" download>Form Pinjam Alat Keluar Kampus</a></td>
                            </tr>
                            <tr>
                                <td width="40%">Form E-Jurnal</td>
                                <td><a href="public/FILE/FORM_E-JURNAL.doc" download>Form E-Jurnal</a></td>
                            </tr>
                            <tr>
                                <td width="40%">Form Bebas Peminjaan Alat Baru</td>
                                <td><a href="public/FILE/FORM_BEBAS_PEMINJAMAN_ALAT_BARU.doc" download>Form Bebas Peminjaan Alat Baru</a></td>
                            </tr>
                            <tr>
                                <td width="40%">Form Pinjam Alat dan Ruang</td>
                                <td><a href="public/FILE/FORM_PINJAM_ALAT_DAN_RUANG.doc" download>Form Pinjam Alat dan Ruang</a></td>
                            </tr>
                            <tr>
                                <td width="40%">Borang Pengganti Hari Libur</td>
                                <td><a href="public/FILE/BORANG_PENGGANTI_HARI_LIBUR.doc" download>Borang Pengganti Hari Libur</a></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>  
        </div>  
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="public/bare/vendor/jquery/jquery.min.js"></script>
    <script src="public/bare/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
@extends('layouts.backend')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        File
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">File</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h4>File Keperluan Skripsi</h4>
                        <div class="table" style="overflow: auto">
                            <table id="file" class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td width="40%">Form Proposal</td>
                                        <td><a href="public/FILE/FORM_PROPOSAL.doc" download>Form Proposal</a></td>
                                    </tr>
                                    <tr>
                                        <td width="40%">Form Skripsi</td>
                                        <td><a href="public/FILE/FORM_SKRIPSI.doc" download>Form Skripsi</a></td>
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
            
            <div class="col-lg-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h4>File Undangan</h4>
                        <div class="table" style="overflow: auto">
                            <table id="file" class="table table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th width=10%>NIM</th>
                                    <th width=24%>Nama</th>
                                    <th width=22%>Proposal</th>
                                    <th width=22%>Akhir</th>
                                    <th width=22%>Lempeng</th>
                                  </tr>
                                </thead>
                                @if($mhs->count())
                                <tbody>
                                  @foreach($mhs as $m)
                                  <tr>
                                    <td>{{$m->nim}}</td>
                                    <td>{{$m->nama_mhs}}</td>
                                    @if($m->undangan_proposal!=null)
                                    <td><a href="{{$m->undangan_proposal}}" download>Undangan Proposal</a></td>
                                    @else <td>{{$m->undangan_proposal}}</td>
                                    @endif
                                    @if($m->undangan_akhir!=null)
                                    <td><a href="{{$m->undangan_akhir}}" download>Undangan Akhir</a></td>
                                    @else <td>{{$m->undangan_akhir}}</td>@endif
                                    @if($m->lempeng!=null)
                                    <td><a href="{{$m->lempeng}}" download>Lembar Pengesahan</a></td>
                                    @else <td>{{$m->lempeng}}</td>@endif
                                  </tr>
                                  @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>  
            </div>
          </div>
        </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@stop

<!-- jQuery 3 -->
<script src="{{ URL::asset('public/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('public/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ URL::asset('public/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('public/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ URL::asset('public/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('public/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('public/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('public/adminlte/dist/js/demo.js') }}"></script>
<script>
$(function() {
    $('#s1').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    }),
    $('#s2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
});
</script>
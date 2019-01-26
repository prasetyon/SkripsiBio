@extends('layouts.backend')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ruangan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Ruangan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @if (session('alert'))
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            @endif
            
            @if(isset($status) && $status=='create')
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <h4>Tambah Ruangan Baru</h4>
                        <form action="{{ route('ruangan.store') }}" method="post" role="form" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="col-lg-12 form-group">
                                <label class="col-lg-3 control-label">Nama Ruangan</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="nama" name="nama" required/>
                                </div>
                                <div><button class="col-lg-5 btn btn-success" type="submit">TAMBAH</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @elseif(isset($status) && $status=='update')
            <div class="col-lg-6">
                <div class="box box-primary">
                    <div class="box-body">
                        <h4>Update Ruangan</h4>
                        <form action="{{ route('ruangan.update', $ruanganedit->id_ruangan) }}" method="post" role="form" class="form-horizontal">
                            <input name="_method" type="hidden" value="PATCH">
                            {{csrf_field()}}
                            <div class="col-lg-12 form-group">
                                <label class="col-lg-3 control-label">Nama Ruangan</label>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" id="nama" name="nama" value={{$ruanganedit->nama_ruangan}} required/>
                                </div>
                                <div><button class="col-lg-5 btn btn-info" type="submit">UPDATE</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            
                
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Data Ruangan <a href="{{route('ruangan.create')}}" class="pull-right"> + <i class="fa fa-plus"></i></a></h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="ruangan" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th>Nama Ruangan</th>
                                <th>Update</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            @if($ruangan->count())
                            <tbody>
                              @foreach($ruangan as $r)
                              <tr>
                                <td>{{$r->id_ruangan}}</td>
                                <td>{{$r->nama_ruangan}}</td>
                                <td>
                                    <a class="btn btn-primary" type="submit" href="{{ route('ruangan.edit', $r->id_ruangan) }}">Edit</a>
                                </td>
                                <td>
                                    {{ Form::open(array('url' => '/ruangan/'.$r->id_ruangan)) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus ruangan ?');", 'class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
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

<!-- jQuery 2.2.3 -->
<script src="public/Admin-LTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="public/Admin-LTE/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="public/Admin-LTE/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="public/Admin-LTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="public/Admin-LTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="public/Admin-LTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="public/Admin-LTE/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="public/Admin-LTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="public/Admin-LTE/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="public/Admin-LTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="public/Admin-LTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="public/Admin-LTE/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="public/Admin-LTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/Admin-LTE/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="public/Admin-LTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/Admin-LTE/dist/js/demo.js"></script>
<script>
$(function() {
    $('#ruangan').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
});
</script>
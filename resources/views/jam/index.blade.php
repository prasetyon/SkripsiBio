@extends('layouts.backend')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jam
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Jam</li>
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
            
            @if(isset($status) && $status=='update')
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="box-body">
                            <h4>Update Ruangan</h4>
                            <form action="{{ route('jam.update', $jamedit->id_jam) }}" method="post" role="form" class="form-horizontal">
                                <input name="_method" type="hidden" value="PATCH">
                                {{csrf_field()}}
                                <div class="col-lg-12 form-group">
                                    <label class="col-lg-2 control-label">Jam</label>
                                    <div class="col-lg-4">
                                        <input type="time" placeholder="mulai" class="form-control" id="mulai" name="mulai" value={{$jamedit->mulai}} required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="time" placeholder="selesai" class="form-control" id="selesai" name="selesai" value={{$jamedit->selesai}} required/>
                                    </div>
                                    <div><button class="col-lg-2 btn btn-info" type="submit">UPDATE</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-lg-6 col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Data Waktu S1<a href="{{route('jam.create')}}" class="pull-right"> <i class="fa fa-plus"></i></a></h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="s1" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Keterangan</th>
                                <th>Update</th>
<!--                                <th>Delete</th>-->
                              </tr>
                            </thead>
                            @if($jam1->count())
                            <tbody>
                              @foreach($jam1 as $j1)
                              <tr>
                                <td>{{$j1->id_jam}}</td>
                                <td>{{$j1->mulai}}</td>
                                <td>{{$j1->selesai}}</td>
                                <td>
                                    {{'Jam ke-'.$j1->id_jam[2]}}
                                    @if($j1->id_jam[1] == 0) Sidang proposal 
                                    @else Sidang skripsi
                                    @endif                                    
                                </td>
                                <td>
                                    <a class="btn btn-primary" type="submit" href="{{ route('jam.edit', $j1->id_jam) }}">Edit</a>
                                </td>
<!--
                                <td>
                                    {{ Form::open(array('url' => 'admin/jam/'.$j1->idjam)) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus jam ini ?');", 'class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
-->
                              </tr>
                              @endforeach
                            </tbody>
                            @endif
                          </table>
                        </div> 
                    </div>
                </div>
              </div>
            <div class="col-lg-6 col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Data Waktu S2 <a href="{{route('jam.create')}}" class="pull-right"> <i class="fa fa-plus"></i></a></h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="s1" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                                <th>Keterangan</th>
                                <th>Update</th>
<!--                                <th>Delete</th>-->
                              </tr>
                            </thead>
                            @if($jam2->count())
                            <tbody>
                              @foreach($jam2 as $j2)
                              <tr>
                                <td>{{$j2->id_jam}}</td>
                                <td>{{$j2->mulai}}</td>
                                <td>{{$j2->selesai}}</td>
                                <td>
                                    {{'Jam ke-'.$j2->id_jam[2]}}
                                    @if($j2->id_jam[1] == 0) Sidang proposal 
                                    @else Sidang thesis
                                    @endif                                    
                                </td>
                                <td>
                                    <a class="btn btn-primary" type="submit" href="./jam/{{$j2->id_jam}}/edit">Edit</a>
                                </td>
<!--
                                <td>
                                    {{ Form::open(array('url' => 'admin/jam/'.$j2->idjam)) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus jam ini ?');", 'class' => 'btn btn-danger')) }}
                                    {{ Form::close() }}
                                </td>
-->
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
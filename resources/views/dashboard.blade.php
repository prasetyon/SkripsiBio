@extends('layouts.backend')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- Sementara 2014 dan 2015, krn jumlah data > 0 -->
        @php
            $colors[0] = 'red';
            $colors[1] = 'yellow';
            $colors[2] = 'green';
            $colors[3] = 'blue';
            $colors[4] = 'yellow';
            $colors[5] = 'orange';
            $colors[6] = 'green';
        @endphp
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-{{$colors[0]}}">
            <div class="inner">
              <h3>{{$status[0]->num}}</h3>

              <p>{{$status[0]->keterangan}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        @for($i=1; $i<count($status)-1; $i++)
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-{{$colors[$i]}}">
            <div class="inner">
              <h3>{{$status[$i]->num}}</h3>

              <p>{{$status[$i]->keterangan}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
<!--            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>
        @endfor
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
        <div class="row">
            @if(isset($ruangan))
            <div class="col-lg-12">
                <form class="col-lg-12" role="form" action="{{route('assignruangan')}}" method="post">
                    {{ csrf_field() }}
                    <div class="box box-primary">
                        <input type="text" name="nim" value="{{$nim}}" hidden>
                        <input type="text" name="tanggal" value="{{$tanggal}}" hidden>
                        <input type="text" name="mulai" value="{{$mulai}}" hidden>
                        <input type="text" name="selesai" value="{{$selesai}}" hidden>
                        <input type="text" name="status" value="{{$statuss}}" hidden>
                        <div class="box-body">
                            <div class="table-responsive" style="overflow: auto">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>{{$nim}}</td>
                                        <td>{{$tanggal}}</td>
                                        <td>{{$mulai}}</td>
                                        <td>{{$selesai}}</td>
                                        <td>
                                        <select class="form-control" name="ruangan" required>
                                            <option value="0"> --  Pilih Ruangan --</option>
                                            @for($i=0; $i<sizeof($ruangan);$i++)
                                                <option value="{{$ruangan[$i]->id_ruangan}}">{{$ruangan[$i]->nama_ruangan}}</option>
                                            @endfor
                                        </select>
                                        </td>
                                    </tr>
                                </thead>
                              </table>
                            </div> 
                        </div>

                        <button type="submit" class="btn btn-info" style="float: right;">Simpan</button>
                    </div>
                </form>  
            </div>
            @endif
            
            <div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Revisi</h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="revisi" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($revisi as $r)
                              <tr>
                                <td>{{$r->nim}}</td>
                                <td>{{$r->nama}}</td>
                                <td>
                                    <form class="col-lg-12" role="form" action="{{route('selesaisidang')}}" method="post">
                                        {{ csrf_field() }}  
                                        <input type="text" name="nim" value="{{$r->nim}}" hidden>
                                        <input type="text" name="status" value="{{$r->status}}" hidden>
                                        <button type="submit" class="btn btn-success">Selesai Revisi</button>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div> 
                    </div>
                </div>
              </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Menunggu Konfirmasi Ruangan</h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="waiting" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Keterangan</th>
                                <th>Ruangan</th>
                              </tr>
                            </thead>
                            @if(count($waiting))
                            <tbody>
                              @foreach($waiting as $w)
                              <tr>
                                <td>{{$w->nim}}</td>
                                <td>{{$w->nama}}</td>
                                <td>{{$w->judul}}</td>
                                <td>{{$w->tanggal}}</td>
                                <td>{{$w->jam}}</td>
                                <td>{{$w->keterangan}}</td>
                                <td>
                                    <form class="col-lg-12" role="form" action="{{route('checkruangan')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="text" name="nim" value="{{$w->nim}}" hidden>
                                        <button type="submit" class="btn btn-info" style="float: right;">Pilih</button>
                                    </form>  
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

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Tunggu Sidang Proposal</h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="proposal" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th width="20%">NIM</th>
                                <th width="50%">Nama</th>
                                <th width="30%">Status</th>
                              </tr>
                            </thead>
                            @if($waitproposal->count())
                            <tbody>
                              @foreach($waitproposal as $w)
                              <tr>
                                <td>{{$w->nim}}</td>
                                <td>{{$w->nama_mhs}}</td>
                                <td>
                                    <form role="form" action="{{route('selesaisidang')}}" method="post">
                                        {{ csrf_field() }}  
                                        <textarea class="col-lg-12" type="text" name="revisi"></textarea>
                                        <div>
                                            <input type="text" name="nim" value="{{$w->nim}}" hidden>
                                            <input type="text" name="status" value="revisi" hidden>
                                            <button type="submit" class="col-lg-6 btn btn-danger" >Revisi</button>
                                        </div>
                                    </form>
                                    <form role="form" action="{{route('selesaisidang')}}" method="post">
                                        {{ csrf_field() }}  
                                        <input type="text" name="nim" value="{{$w->nim}}" hidden>
                                        <input type="text" name="status" value="proposal" hidden>
                                        <button type="submit" class="col-lg-6 btn btn-success " >Selesai Sidang</button>
                                    </form>
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
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <h3>Tunggu Sidang Akhir</h3>
                        <div class="table-responsive" style="overflow: auto">
                        <table id="akhir" class="table table-bordered table-striped">
                        @php $count = 1 @endphp
                            <thead>
                              <tr>
                                <th width="20%">NIM</th>
                                <th width="50%">Nama</th>
                                <th width="30%">Status</th>
                              </tr>
                            </thead>
                            @if($waitakhir->count())
                            <tbody>
                              @foreach($waitakhir as $w)
                              <tr>
                                <td>{{$w->nim}}</td>
                                <td>{{$w->nama_mhs}}</td>
                                <td>
                                    <form role="form" action="{{route('selesaisidang')}}" method="post">
                                        {{ csrf_field() }}  
                                        <textarea class="col-lg-12" type="text" name="revisi"></textarea>
                                        <div>
                                            <input type="text" name="nim" value="{{$w->nim}}" hidden>
                                            <input type="text" name="status" value="revisi" hidden>
                                            <button type="submit" class="col-lg-6 btn btn-danger" >Revisi</button>
                                        </div>
                                    </form>
                                    <form role="form" action="{{route('selesaisidang')}}" method="post">
                                        {{ csrf_field() }}  
                                        <input type="text" name="nim" value="{{$w->nim}}" hidden>
                                        <input type="text" name="status" value="akhir" hidden>
                                        <button type="submit" class="col-lg-6 btn btn-success " >Selesai Sidang</button>
                                    </form>
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
          <!-- /.box -->
        </div>
      <!-- /.row (main row) -->

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
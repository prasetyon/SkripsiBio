@component('mail::message')
Yth. <br>
{{ $nama }} <br><br>

<p>Dengan hormat,</p><br><br>
<p>Dengan ini kami sampaikan bahwa pendaftaran sidang akhir atas nama {{$mhs->nama_mhs}} telah diterima dengan detail sebagai berikut:</p>

<table style="font-size: 16px">
	<tr>
		<td><b>NIM</b></td>
		<td>:</td>
		<td>{{ $mhs->nim }}</td>
	</tr>
	<tr>
		<td><b>Nama Mahasiswa</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_mhs }}</td>
	</tr>
	<tr>
		<td><b>Judul</b></td>
		<td>:</td>
		<td>{{ $mhs->judul }}</td>
	</tr>
	<tr>
		<td><b>Proposal</b></td>
		<td>:</td>
		<td><a href="{{public_path().'/upload/'.$mhs->proposal}}" download>{{$mhs->proposal}}</a></td>
	</tr>
	<tr>
		<td><b>Tanggal</b></td>
		<td>:</td>
		<td>{{ $mhs->tanggal_sidang_akhir }}</td>
	</tr>
	<tr>
		<td><b>Waktu</b></td>
		<td>:</td>
		<td>{{ $mhs->jam_sidang_akhir }}</td>
	</tr>
	<tr>
		<td><b>Penguji 1</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_pembimbing_1 }}</td>
	</tr>
	<tr>
		<td><b>Penguji 2</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_pembimbing_2 }}</td>
	</tr>
	<tr>
		<td><b>Penguji 3</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_penguji_1 }}</td>
	</tr>
	<tr>
		<td><b>Penguji 4</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_penguji_2 }}</td>
	</tr>
    @if($mhs->strata=='S2')
	<tr>
		<td><b>Penguji 5</b></td>
		<td>:</td>
		<td>{{ $mhs->nama_penguji_3 }}</td>
	</tr>
    @endif
</table>
<br>
<p>
	Silahkan login ke URL INI untuk mengecek update dari skripsi ini<br><br>

	Terimakasih<br><br>
	Departemen Biologi, Fakultas Sains dan Teknologi, Universitas Airlangga
</p>
@endcomponent

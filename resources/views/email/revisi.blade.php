@component('mail::message')
Kepada {{ $nama }},

<p>Berikut kami sampaikan update proses skripsi/thesis dengan nama {{$namamhs}}</p><br>

<table style="font-size: 16px">
	<tr>
		<td><b>Nama</b></td>
		<td>:</td>
		<td>{{ $namamhs }}</td>
	</tr>
	<tr>
		<td><b>Status</b></td>
		<td>:</td>
		<td>{{ $status }}</td>
	</tr>
	<tr>
		<td><b>Revisi</b></td>
		<td>:</td>
		<td><pre>{{ $revisi }}</pre></td>
	</tr>
</table>
<br>
<p>
	Silahkan login ke URL INI untuk mengecek status proses skripsi/thesis<br><br>

	Terimakasih<br><br>
	Departemen Biologi, Fakultas Sains dan Teknologi, Universitas Airlangga
</p>
@endcomponent
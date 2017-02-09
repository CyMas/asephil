<!DOCTYPE html>
<html>
<head>
<title>Pemasukan</title>
<meta charset='utf-8'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
body{font-size:14px; margin:0; padding:0; font-family:'Helvetica'}
.titpdf{font-size:16px; text-align:center; margin-bottom:30px}
table{width:100%; border-collapse:collapse}
tr{background:#fff}
th{background:#5F9EA0; color:#000; font-weight:400;}
td,th{padding:12px 6px; border:1px solid #222; text-align:center}
td{color:#000}
.status{background:#0073B7; color:#fff; padding:5px 0; width:100px; text-align:center; margin:auto}
</style>
</head>
@if(Auth::user()->type=="admin")
<body>
    <h2 style="text-align:center">D' Assurance</h2>
    <h5 style="text-align:center;font-weight:1000px;">Pemasukan</h5>
    <hr /><br>
<table>
@if(count($pdf)===0)
@else
    <tr>
    <b>
    <th>No.</th>
    <th>Username</th>
    <th>Nama Nasabah</th>
    <th>No.Rekening</th>
    <th>Jenis Rekening</th>
    <th>Jumlah</th>
    </b>
    </tr>
    @foreach($pdf as $pdf)
    @if($pdf->status=="Sudah Terkirim")
    <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $pdf->username }}</td>
    <td>{{ $pdf->nama_nasabah }}</td>
    <td>{{ $pdf->no_rek }}</td>
    <td>{{ $pdf->jenis_rek }}</td>
    <td>{{ "Rp.".number_format($pdf->jml_setoran,0,',','.').",-" }}</td>
    </tr>
    @endif
        @endforeach
@endif

    <tr>
    <td colspan="5"></td>
    @foreach($jumlah as $jumlah)
    <td>{{ "Rp.".number_format($jumlah->jumlah,0,',','.').",-" }}</td>
    @endforeach
    </tr>
</table>
</div>
</body>
@endif
</html>
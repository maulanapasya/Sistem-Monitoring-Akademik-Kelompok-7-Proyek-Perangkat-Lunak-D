@extends('layoutdepartment.main')
@section('main_content')
<style>
    th {
        border: 1px solid black;
    }

    td {
        text-align: center;
        border: 1px solid black;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var tahunElements = document.querySelectorAll(".tahun");

        tahunElements.forEach(function (tahunElement) {
            var currentYear = new Date().getFullYear();

            for (var j = currentYear - 6; j <= currentYear; j++) {
                var td = document.createElement("td");
                td.textContent = j;
                td.setAttribute("colspan", "2");
                tahunElement.appendChild(td);
            }
        });
    });
</script>
<h1 class="1">Rekap Progress PKL</h1>
<table border="1" id="tabel_pkl">
    <thead class="angkatan">
        <th colspan="14" style="Text-Align:center;">REKAP PROGRESS PKL</th>
    </thead>
    <thead class="angkatan">
        <th colspan="14" style="Text-Align:center;">Angkatan</th>
    </thead>
    <tbody>
        <tr class="tahun">

        </tr>
        <tr class="status">
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
            <td>Lulus</td>
            <td>Belum</td>
        </tr>
        <tr class="jml_pkl">
            @php
            $tahunskrg = now()->year
            @endphp
            @foreach(range($tahunskrg - 6, $tahunskrg) as $year)
            <td><a style="text-decoration:none; color:black;" href= {{ route('sudahpkl',['tahun' => $year]) }}> {{ session('sudahpkl'.$year) }}</a></td>
            <td><a style="text-decoration:none; color:black;" href={{ route('belumpkl',['tahun' => $year]) }}>{{ session('belumpkl'.$year) }}</a></td>
            @endforeach
        </tr>
    </tbody>
</table>
<div class="cont_btn" style="text-align:right; margin-top:20px;"><input type="button" onclick="cetakpkl()" value="cetak"
        style="background-color:lightblue;"></div>
<script>
    function cetakpkl() {
        var btn_pkl = document.getElementById('tabel_pkl');
        var pkl = window.open();

        pkl.document.write('<html><head><style> @media print { @page { size: landscape; } }</style></head><body>');
        pkl.document.write(btn_pkl.outerHTML);
        pkl.document.write('</body></html>');

        pkl.print();
        pkl.close();
    }

</script>
@endsection
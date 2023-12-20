@extends('layoutdepartment.main')
@section('main_content')
<link rel="stylesheet" href="/css/verifikasi.css">
<link rel="stylesheet" href="/css/srs2.css">
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
<h1 class="1">Rekap Status Mahasiswa</h1>
<hr>
<div>
    <div class="form-row">
        <form action="/submit/status">
            <label for="status">Status</label>
            <select name="status" id="" required>
                <option value="">status</option>
                @foreach ($status as $item)
                <option value="{{ $item->id_status}}">{{ $item->nama_status }}</option>
                @endforeach
            </select>
            <div class="form-row">
                <label for="angkatan">Angkatan</label>
                @php
                $tahunskrg = now()->year
                @endphp
                <input type="number" name="angkatan" class="angkatan" id="angkatan" required min="{{ $tahunskrg - 7 }}"
                    max="{{ $tahunskrg + 7 }}">
            </div>
            <input type="submit" value="submit">
        </form>
    </div>
</div>
<hr>
<div class="text-center">Jumlah Mahasiswa : <span>{{ $jml_mhs }}</span></div>
<div id="list_status" class="inline-block min-w-full py-2 align-middle mt-3 md:px-6 lg:px-8" method="POST">
    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    No
                </th>
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nim
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nama
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Status
                </th>
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Angkatan
                </th>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach( $mhs as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->status_mhs }}</td>
                    <td>{{ $mahasiswa->angkatan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="cont_btn" style="text-align:right; margin-top:20px;"><input type="button" onclick="cetakpkl()" value="cetak"
        style="background-color:lightblue;"></div>
<script>
    function cetakpkl() {
        var btn_pkl = document.getElementById('list_status');
        var pkl = window.open();

        pkl.document.write('<html><head><style> @media print { @page { size: landscape; } }</style></head><body>');
        pkl.document.write(btn_pkl.outerHTML);
        pkl.document.write('</body></html>');

        pkl.print();
        pkl.close();
    }

</script>
@endsection
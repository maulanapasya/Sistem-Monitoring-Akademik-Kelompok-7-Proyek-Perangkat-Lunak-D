@extends('layoutdepartment.main')
@section('main_content')
<link rel="stylesheet" href="/css/verifikasi.css">
<h1 style="text-align:center;">LIST SUDAH PKL</h1>
<div id="list_status" class="inline-block min-w-full py-2 align-middle mt-3 md:px-6 lg:px-8" method="POST">
    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    No
                </th>
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nama
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nim
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Angkatan
                </th>
                </tr>
                @foreach ($mhs as $item)
                <tr>
                    <td class="px-4 py-4">{{ $loop->iteration }}</td>
                    <td class="px-4 py-4">{{ $item->nama }}</td>
                    <td class="px-4 py-4">{{ $item->nim }}</td>
                    <td class="px-4 py-4">{{ $item->angkatan }}</td>
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

        pkl.document.write('<html><head><style> @media print { @page { size: landscape; } td{ text-align:center; } </style></head><body>');
        pkl.document.write(btn_pkl.outerHTML);
        pkl.document.write('</body></html>');

        pkl.print();
        pk
    }

</script>
@endsection
@extends('layoutdosen.main')
@section('main_content')
<link rel="stylesheet" href="/css/verifikasi.css">
<h1 style="text-align:center;">VERIFIKASI SKRIPSI</h1>
<div class="inline-block min-w-full py-2 align-middle mt-3 md:px-6 lg:px-8" method="POST">
    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                <th scope="col"
                    class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    ID
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nama
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Semester
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Tanggal Sidang
                </th>
                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Nilai Skripsi
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    Status
                </th>

                <th scope="col"
                    class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    PKL
                </th>
                </tr>
                @foreach ($dataskripsi as $item)
                <tr>
                    <td class="px-4 py-4">{{ $item->id }}</td>
                    <td class="px-4 py-4">{{ $item->nama }}</td>
                    <td class="px-4 py-4">{{ $item->semester }}</td>
                    <td class="px-4 py-4">{{ $item->tglsidang }}</td>
                    <td class="px-4 py-4">{{ $item->nilaiskripsi }}</td>
                    <td>
                        @if ($item->isverified == 0)
                        <form action="/dashboarddosen/verifikasiskripsi/verify/{{$item->id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Setujui</button>
                        </form>
                        @else
                        <form action="/dashboarddosen/verifikasiskripsi/unverify/{{$item->id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Batal</button>
                        </form>
                        @endif
                    </td>
                    <td><a href="/dashboarddosen/verifikasiskripsi/download/{{ $item->id }}"
                            class="btn btn-facebook">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
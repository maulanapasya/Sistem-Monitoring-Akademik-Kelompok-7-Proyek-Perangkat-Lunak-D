@extends('layoutdosen.main')
@section('main_content')
<link rel="stylesheet" href="/css/srs2.css">
<h1 class="form-group">Dashboard Dosen</h1>
<form action="/dashboarddosen" method="GET">
    @csrf
    <div class="cont-search">
        <input type="text" name="search" class="search" id="search" placeholder="Masukkan Nama atau NIM">
        <button type="submit" class="btn btn-primary">Cari</button>
    </div>
</form>
<div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-4 py-2">NIM</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Angkatan</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                @foreach ($mahasiswa as $item)
                <tr>
                    <td class="px-4 py-2"><a href="/dashboarddosen/detail/{{ $item->nim }}">{{ $item->nim }}</a></td>
                    <td class="px-4 py-2"><a href="/dashboarddosen/detail/{{ $item->nim }}">{{ $item->nama }}</a></td>
                    <td class="px-4 py-2"><a href="/dashboarddosen/detail/{{ $item->nim }}">{{ $item->angkatan }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
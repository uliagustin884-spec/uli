<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sistem Manajemen Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Notifikasi Berhasil -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 border border-gray-100">
                <!-- Bagian Judul dan Tombol Tambah yang Mencolok -->
                <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-200">
                    <div>
                        <h3 class="text-xl font-bold text-gray-800">Data Mahasiswa Aktif</h3>
                        <p class="text-sm text-gray-500">Daftar mahasiswa yang terdaftar di dalam sistem.</p>
                    </div>
                    
                    <!-- TOMBOL TAMBAH WARNA BIRU DI DESAIN ULANG AGAR SANGAT JELAS -->
                    <a href="{{ route('mahasiswa.create') }}" class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-lg shadow-md transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Mahasiswa
                    </a>
                </div>

                <!-- Tabel Data Mahasiswa -->
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b">NIM</th>
                                <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Nama</th>
                                <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Program Studi</th>
                                <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Email</th>
                                <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Angkatan</th>
                                <th class="px-6 py-3.5 text-center text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($mahasiswa as $mhs)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 border-b">{{ $mhs->nim }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 border-b">{{ $mhs->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 border-b">{{ $mhs->program_studi }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 border-b">{{ $mhs->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 border-b text-center">{{ $mhs->angkatan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm border-b text-center space-x-3">
                                        <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="inline-flex items-center text-amber-600 hover:text-amber-900 font-bold bg-amber-50 hover:bg-amber-100 px-2.5 py-1 rounded transition duration-150">
                                            Edit
                                        </a>
                                        <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-900 font-bold bg-red-50 hover:bg-red-100 px-2.5 py-1 rounded transition duration-150">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-400">
                                        <div class="flex flex-col items-center justify-center space-y-2">
                                            <span>Belum ada data mahasiswa terdaftar.</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
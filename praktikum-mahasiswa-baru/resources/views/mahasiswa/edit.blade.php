<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold">Formulir Edit Biodata</h3>
                    <a href="{{ route('mahasiswa.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-semibold">
                        &larr; Kembali ke Daftar
                    </a>
                </div>

                <!-- Formulir Edit Data Mahasiswa -->
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIM (Nomor Induk Mahasiswa)</label>
                        <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" required class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email Mahasiswa</label>
                        <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}" required class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Angkatan</label>
                        <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded shadow">
                            Perbarui Data Mahasiswa
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
@auth
    <x-layout>
        <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
        <x-slot:nama>{{ auth()->user()->nama_lengkap }}</x-slot:nama>
        <x-slot:hitung>
            {{ $blmdibaca }}
        </x-slot:hitung>
        <x-slot:notifikasi>
            @foreach ($notifikasi as $notif)
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">
                            {{ $notif->tanggal_dibuat }}
                        </div>
                        <span class="font-weight-bold">
                            {{ $notif->pesan }}
                        </span>
                    </div>
                </a>
            @endforeach
        </x-slot:notifikasi>
        <h1 class="h3 mb-0 text-gray-800">Welcome back, {{ auth()->user()->nama_lengkap }}</h1>
        <div class="card shadow mb-3">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Pekerjaan yang diambil</span>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}
                @if ($pekerjaan->where('id_status', '!=', 4)->count() == 0)
                    <div class="card text-center">
                        <div class="card-header">
                            Tidak ada pekerjaan yang sedang diambil.
                        </div>
                        <div class="card-body">
                            <a href="/ambil" class="btn btn-primary">Cari Pekerjaan</a>
                        </div>
                    </div>
                @else
                    @foreach ($pekerjaan as $pekerjaanItem)
                        @if ($pekerjaanItem['id_status'] != 4)
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div>
                                        <span class="m-0 font-weight-bold text-primary">
                                            {{ $pekerjaanItem->judul }}
                                        </span> |
                                        <small class="text-body-secondary">
                                            Upload at : {{ $pekerjaanItem->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <span class="badge badge-success">{{ $pekerjaanItem->status->nama_status }}</span>
                                </div>
                                <div class="card-body">
                                    <p>{{ $pekerjaanItem->deskripsi }}</p>
                                    <div>
                                        Kategori : <span class="badge badge-warning">{{ $pekerjaanItem->kategori }}</span>
                                    </div>
                                    <p class="card-text">
                                        <small class="text-body-secondary">
                                            Tenggat Waktu Pekerjaan : {{ $pekerjaanItem->tenggat_waktu }}
                                        </small>
                                    </p>
                                    <a href="/ambil/{{ $pekerjaanItem->id_pekerjaan }}" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header">
                <span class="m-0 font-weight-bold text-primary">Pekerjaan yang sedang diajakun</span>
            </div>
            <div class="card-body">
                @if ($ajuan->where('id_status', '!=', 4)->count() == 0)
                    <div class="card text-center mt-3">
                        <div class="card-header">
                            Tidak ada pekerjaan yang sedang diajuakn.
                        </div>
                        <div class="card-body">
                            <a href="/ajukan" class="btn btn-primary">Ajukan Pekerjaan</a>
                        </div>
                    </div>
                @else
                    @if (session()->has('hapus'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('hapus') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($ajuan as $pekerjaanItem)
                            @if ($pekerjaanItem['id_pengguna'] == auth()->user()->id_pengguna)
                                @if ($pekerjaanItem['id_status'] != 4)
                                    <div class="col-lg-6 mb-4">
                                        <div class="card shadow mb-4">
                                            <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                <div>
                                                    <span class="m-0 font-weight-bold text-primary">
                                                        {{ $pekerjaanItem->judul }}
                                                    </span> |
                                                    <small class="text-body-secondary">
                                                        Upload at : {{ $pekerjaanItem->created_at->diffForHumans() }}
                                                    </small>
                                                </div>
                                                @if ($pekerjaanItem['id_status'] == 5)
                                                    <span
                                                        class="badge badge-danger">{{ $pekerjaanItem->status->nama_status }}</span>
                                                @else
                                                    <span
                                                        class="badge badge-info">{{ $pekerjaanItem->status->nama_status }}</span>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $pekerjaanItem->deskripsi }}</p>
                                                <div>
                                                    Kategori : <span
                                                        class="badge badge-warning">{{ $pekerjaanItem->kategori }}</span>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Tenggat Waktu Pekerjaan : {{ $pekerjaanItem->tenggat_waktu }}
                                                    </small>
                                                </p>
                                                <a href="/ambil/{{ $pekerjaanItem->id_pekerjaan }}"
                                                    class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </x-layout>
@endauth

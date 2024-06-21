@auth
    <x-layout>
        <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
        <x-slot:nama>{{ auth()->user()->nama_lengkap }}</x-slot:nama>
        <h1 class="h3 mb-0 text-gray-800">Welcome back, {{ auth()->user()->nama_lengkap }}</h1>
        <div class="card shadow mb-4">
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
                @if ($pekerjaan->isEmpty())
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
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div>
                                    <span class="m-0 font-weight-bold text-primary">
                                        {{ $pekerjaanItem->judul }}
                                    </span> |
                                    <a href="/pekerjaan/{{ $pekerjaanItem->pengguna->id_pengguna }}">By
                                        {{ $pekerjaanItem->pengguna->nama_lengkap }}
                                    </a>
                                </div>
                                <small class="text-body-secondary">
                                    Upload at : {{ $pekerjaanItem->created_at->diffForHumans() }}
                                </small>
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
                    @endforeach
                @endif
            </div>
        </div>
    </x-layout>
@endauth

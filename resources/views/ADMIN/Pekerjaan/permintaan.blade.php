<x-layout-admin>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>

    <!-- Page Heading -->
    <h1 class="h3 text-gray-800">Permintaan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('tolak'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('tolak') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card-body">
            @foreach ($pekerjaans as $pekerjaan)
                @if ($pekerjaan['id_status'] == 1)
                    <div class="card shadow mb-4 ">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <div>
                                <span class="m-0 font-weight-bold text-primary">
                                    {{ $pekerjaan['judul'] }}
                                </span> |
                                <a href="/pekerjaan/{{ $pekerjaan->pengguna->id_pengguna }}">By
                                    {{ $pekerjaan->pengguna->nama_lengkap }}
                                </a>
                            </div>
                            <small class="text-body-secondary">
                                Upload at : {{ $pekerjaan->created_at->diffForHumans() }}
                            </small>
                        </div>
                        <div class="card-body">
                            <p>{{ $pekerjaan['deskripsi'] }}</p>
                            <div>
                                Kategori : <span class="badge badge-warning">{{ $pekerjaan['kategori'] }}</span>
                            </div>
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    Tenggat Waktu Pekerjaan : {{ $pekerjaan['tenggat_waktu'] }}
                                </small>
                            </p>
                            <a href="/detail/{{ $pekerjaan['id_pekerjaan'] }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout-admin>

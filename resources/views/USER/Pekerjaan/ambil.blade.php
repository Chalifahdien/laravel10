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
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pekerjaan yang tersedia</h1>
        <hr>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>
                                    <hr class="mt-0">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pekerjaans as $pekerjaan)
                                @if ($pekerjaan['id_status'] == 3)
                                <tr>
                                    <td>
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
                                                <a href="/ambil/{{ $pekerjaan['id_pekerjaan'] }}" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-layout>
@endauth

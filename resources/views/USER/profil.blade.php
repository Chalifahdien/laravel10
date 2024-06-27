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
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        <div class="row">

            <div class="col-xl-3 ">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Foto Profil</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->

                    @if (auth()->user()->foto_profil == null)
                        <div class="card-body">
                            <img class="img-fluid" src="/img/undraw_profile.svg" alt="Foto Profil">
                        </div>
                    @else
                        <div class="card-body">
                            <img src="{{ auth()->user()->foto_profil }}" alt="">
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-9 ">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="small mb-1" for="judul">Nama Lengkap</label>
                            <input class="form-control" name="nama" id="nama" type="text"
                                placeholder="nama lengkap" readonly value="{{ auth()->user()->nama_lengkap }}" />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="judul">Email</label>
                            <input class="form-control" name="nama" id="nama" type="text"
                                placeholder="nama lengkap" readonly value="{{ auth()->user()->email }}" />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="judul">Telepon</label>
                            <input class="form-control" name="nama" id="nama" type="number"
                                placeholder="nama lengkap" readonly value="{{ auth()->user()->telepon }}" />
                        </div>
                    </div>
                </div>
                <div>
                    <a href="/editprofil" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            Riwayat Ajuan Pekerjaan
                        </div>
                        <div class="card-body">
                            @foreach ($pekerjaans as $pekerjaan)
                                @if ($pekerjaan['id_status'] == 4)
                                    @if ($pekerjaan['id_pengguna'] == auth()->user()->id_pengguna)
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
                                                    Kategori : <span
                                                        class="badge badge-warning">{{ $pekerjaan['kategori'] }}</span>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Tenggat Waktu Pekerjaan : {{ $pekerjaan['tenggat_waktu'] }}
                                                    </small>
                                                </p>
                                                <a href="/ambil/{{ $pekerjaan['id_pekerjaan'] }}"
                                                    class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            Riwayat Pekerjaan
                        </div>
                        <div class="card-body">
                            @foreach ($pekerjaans as $pekerjaan)
                                @if ($pekerjaan['id_status'] == 4)
                                    @if ($pekerjaan['id_pengambil'] == auth()->user()->id_pengguna)
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
                                                    Kategori : <span
                                                        class="badge badge-warning">{{ $pekerjaan['kategori'] }}</span>
                                                </div>
                                                <p class="card-text">
                                                    <small class="text-body-secondary">
                                                        Tenggat Waktu Pekerjaan : {{ $pekerjaan['tenggat_waktu'] }}
                                                    </small>
                                                </p>
                                                <a href="/ambil/{{ $pekerjaan['id_pekerjaan'] }}"
                                                    class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </x-layout>
@endauth

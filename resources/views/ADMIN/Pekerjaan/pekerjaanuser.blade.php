<x-layout-admin>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pekerjaan dari {{ $nama }}</h1>
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
                                                <a href="/detail/{{ $pekerjaan['id_pengguna'] }}" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>

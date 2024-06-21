<x-layout-admin>
    <x-slot:tittle>{{ $tittle }}</x-slot:tittle>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Kata Sandi</th>
                            <th>Peran</th>
                            <th>Waktu dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penggunas as $pengguna)
                            <tr>
                                <td>{{ $pengguna['nama_lengkap'] }}</td>
                                <td>{{ $pengguna['email'] }}</td>
                                <td>{{ $pengguna['telepon'] }}</td>
                                <td>{{ $pengguna['password'] }}</td>
                                <td>{{ $pengguna->peran->nama_peran }}</td>
                                <td>{{ $pengguna['tanggal_dibuat'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout-admin>

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
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="h3 text-gray-800">Detail Pekerjaan</h1>
            <h5>
                @if ($pekerjaan['id_status'] == 3)
                    <a href="/ambil" class="badge badge-warning">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>Back
                    </a>
                @endif
                @if ($pekerjaan['id_status'] == 2)
                    <a href="/" class="badge badge-warning">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>Back
                    </a>
                @endif
                @if ($pekerjaan['id_status'] == 1)
                    <a href="/" class="badge badge-warning">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>Back
                    </a>
                @endif
                @if ($pekerjaan['id_status'] == 5)
                    <a href="/" class="badge badge-warning">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                        </svg>Back
                    </a>
                @endif
            </h5>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">

                @if (session()->has('ambil'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('ambil') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-9 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center ">
                                <span class="m-0 font-weight-bold text-primary">
                                    {{ $pekerjaan['judul'] }}
                                </span>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                {{ $pekerjaan['deskripsi'] }}
                                <p class="card-text">
                                    Kategori: <span class="badge badge-warning">{{ $pekerjaan['kategori'] }}</span>
                                </p>
                                <p class="card-text">
                                    <small class="text-body-secondary">
                                        Tenggat Waktu: {{ $pekerjaan->tenggat_waktu }}
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Pie Chart -->
                    <div class="col-xl-3 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Lampiran</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if ($pekerjaan->lampiran)
                                    @php
                                        $filePath = 'storage/' . $pekerjaan->lampiran;
                                        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                                    @endphp

                                    <div class="text-center">
                                        @if (in_array($extension, ['jpeg', 'png', 'jpg', 'gif', 'svg']))
                                            <img class="img-fluid rounded" src="{{ asset($filePath) }}"
                                                style="width: 250px" alt="Lampiran">
                                        @elseif ($extension == 'pdf')
                                            <a class="btn btn-outline-danger" href="{{ asset($filePath) }}"
                                                target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-filetype-pdf"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z" />
                                                </svg> Lihat PDF</a>
                                        @elseif ($extension == 'doc')
                                            <a class="btn btn-outline-primary" href="{{ asset($filePath) }}"
                                                target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-filetype-doc"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V14a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zm-7.839 9.166v.522q0 .384-.117.641a.86.86 0 0 1-.322.387.9.9 0 0 1-.469.126.9.9 0 0 1-.471-.126.87.87 0 0 1-.32-.386 1.55 1.55 0 0 1-.117-.642v-.522q0-.386.117-.641a.87.87 0 0 1 .32-.387.87.87 0 0 1 .471-.129q.264 0 .469.13a.86.86 0 0 1 .322.386q.117.255.117.641m.803.519v-.513q0-.565-.205-.972a1.46 1.46 0 0 0-.589-.63q-.381-.22-.917-.22-.533 0-.92.22a1.44 1.44 0 0 0-.589.627q-.204.406-.205.975v.513q0 .563.205.973.205.406.59.627.386.216.92.216.535 0 .916-.216.383-.22.59-.627.204-.41.204-.973M0 11.926v4h1.459q.603 0 .999-.238a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.59-.68q-.395-.234-1.004-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082H.79V12.57Zm7.422.483a1.7 1.7 0 0 0-.103.633v.495q0 .369.103.627a.83.83 0 0 0 .298.393.85.85 0 0 0 .478.131.9.9 0 0 0 .401-.088.7.7 0 0 0 .273-.248.8.8 0 0 0 .117-.364h.765v.076a1.27 1.27 0 0 1-.226.674q-.205.29-.55.454a1.8 1.8 0 0 1-.786.164q-.54 0-.914-.216a1.4 1.4 0 0 1-.571-.627q-.194-.408-.194-.976v-.498q0-.568.197-.978.195-.411.571-.633.378-.223.911-.223.328 0 .607.097.28.093.489.272a1.33 1.33 0 0 1 .466.964v.073H9.78a.85.85 0 0 0-.12-.38.7.7 0 0 0-.273-.261.8.8 0 0 0-.398-.097.8.8 0 0 0-.475.138.87.87 0 0 0-.301.398" />
                                                </svg> Unduh DOC</a>
                                        @elseif ($extension == 'docx')
                                            <a class="btn btn-outline-primary" href="{{ asset($filePath) }}"
                                                target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-filetype-docx"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M14 4.5V11h-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zm-6.839 9.688v-.522a1.5 1.5 0 0 0-.117-.641.86.86 0 0 0-.322-.387.86.86 0 0 0-.469-.129.87.87 0 0 0-.471.13.87.87 0 0 0-.32.386 1.5 1.5 0 0 0-.117.641v.522q0 .384.117.641a.87.87 0 0 0 .32.387.9.9 0 0 0 .471.126.9.9 0 0 0 .469-.126.86.86 0 0 0 .322-.386 1.55 1.55 0 0 0 .117-.642m.803-.516v.513q0 .563-.205.973a1.47 1.47 0 0 1-.589.627q-.381.216-.917.216a1.86 1.86 0 0 1-.92-.216 1.46 1.46 0 0 1-.589-.627 2.15 2.15 0 0 1-.205-.973v-.513q0-.569.205-.975.205-.411.59-.627.386-.22.92-.22.535 0 .916.22.383.219.59.63.204.406.204.972M1 15.925v-3.999h1.459q.609 0 1.005.235.396.233.589.68.196.445.196 1.074 0 .634-.196 1.084-.197.451-.595.689-.396.237-.999.237zm1.354-3.354H1.79v2.707h.563q.277 0 .483-.082a.8.8 0 0 0 .334-.252q.132-.17.196-.422a2.3 2.3 0 0 0 .068-.592q0-.45-.118-.753a.9.9 0 0 0-.354-.454q-.237-.152-.61-.152Zm6.756 1.116q0-.373.103-.633a.87.87 0 0 1 .301-.398.8.8 0 0 1 .475-.138q.225 0 .398.097a.7.7 0 0 1 .273.26.85.85 0 0 1 .12.381h.765v-.073a1.33 1.33 0 0 0-.466-.964 1.4 1.4 0 0 0-.49-.272 1.8 1.8 0 0 0-.606-.097q-.534 0-.911.223-.375.222-.571.633-.197.41-.197.978v.498q0 .568.194.976.195.406.571.627.375.216.914.216.44 0 .785-.164t.551-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.765a.8.8 0 0 1-.117.364.7.7 0 0 1-.273.248.9.9 0 0 1-.401.088.85.85 0 0 1-.478-.131.83.83 0 0 1-.298-.393 1.7 1.7 0 0 1-.103-.627zm5.092-1.76h.894l-1.275 2.006 1.254 1.992h-.908l-.85-1.415h-.035l-.852 1.415h-.862l1.24-2.015-1.228-1.984h.932l.832 1.439h.035z" />
                                                </svg> Unduh DOCX</a>
                                        @else
                                            <a href="{{ asset($filePath) }}" target="_blank">Unduh Lampiran</a>
                                        @endif
                                    </div>
                                @endif
                                <hr>
                                @if ($pekerjaan['id_status'] == 3)
                                    <form action="{{ route('pekerjaan.ambil', $pekerjaan->id_pekerjaan) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Ambil Pekerjaan
                                        </button>
                                    </form>
                                @elseif ($pekerjaan['id_status'] == 2)
                                    <form action="{{ route('pekerjaan.selesai', $pekerjaan->id_pekerjaan) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success btn-user btn-block" type="submit">
                                            Pekerjaan Selesai
                                        </button>
                                    </form>
                                @elseif ($pekerjaan['id_status'] == 5)
                                    <form action="{{ route('pekerjaan.ajukan', $pekerjaan->id_pekerjaan) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary btn-user btn-block mt-2" type="submit">
                                            Ajukan Kembali
                                        </button>
                                    </form>
                                @endif
                                @if ($pekerjaan['id_pengguna'] == auth()->user()->id_pengguna)
                                    <form action="{{ route('pekerjaan.hapus', $pekerjaan->id_pekerjaan) }}"
                                        method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger btn-user btn-block mt-2" type="submit">
                                            Hapus Ajuan
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- komentar --}}
            <hr>
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Komenter</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pekerjaan.komentar', $pekerjaan->id_pekerjaan) }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input class="form-control" name="komentar" id="komentar" type="text"
                            placeholder="Komentar... " required />
                        <button class="btn btn-primary" type="submit" id="button-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-send" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z" />
                            </svg>
                        </button>
                    </div>
                </form>
                @foreach ($komentar as $komen)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $komen->pengguna->nama_lengkap }} | {{ $komen->created_at->diffForHumans() }}
                        </div>
                        <div class="card-body">
                            <p class="card-text"> {{ $komen->teks_komentar }} </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </x-layout>
@endauth

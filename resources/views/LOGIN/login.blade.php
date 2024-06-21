<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TOLAK - {{ $tittle }}</title>

    <!-- Favicon -->
    <link rel="icon" href="img/tolak.png" type="image/x-icon">
    <link rel="shortcut icon" href="img/tolak.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('LoginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('LoginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"
                                style="background-image: url('/img/undraw_profile.svg')">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Kembali!</h1>
                                    </div>
                                    <form class="user" action="/login" method="post">
                                        @csrf
                                        <div class="form-group @error('email') mb-1 @enderror">
                                            <input type="email" name="email"
                                                class="form-control form-control-user @error('email')is-invalid0 @enderror"
                                                id="email" placeholder="Email" required value="{{ old('email') }}">
                                            @error('email')
                                                <small class="d-block text-danger text-center mt-1 ">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group @error('password') mb-1 @enderror">
                                            <input type="password" name="password"
                                                class="form-control form-control-user @error('password')is-invalid0 @enderror"
                                                id="password" placeholder="Password" required>
                                            @error('password')
                                                <small class="d-block text-danger text-center mt-1 ">
                                                    The password field must be at least 8 characters.
                                                </small>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            Masuk
                                        </button>
                                        <hr>
                                        <a href="/" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Masuk dengan Google
                                        </a>
                                        <a href="/" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Masuk dengan Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/register">Belum memiliki akun? Buat Akun!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

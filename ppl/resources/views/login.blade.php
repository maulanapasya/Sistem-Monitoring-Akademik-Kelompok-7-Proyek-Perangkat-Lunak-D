<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .mb-1 {
            margin-bottom: 1rem;
            display: justify;
        }

        .h3 {
            font-size: 1.5rem;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto ">
            <img class="mb-1 mx-auto" src="img/Logo Undip Universitas Diponegoro.png" alt="" width="100" height="100">
            <h1 class="h3 mb-1 fw-normal text-center my-4">Silahkan Masuk</h1>
            @if (session()->has('logingagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('logingagal') }}
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <form class="user" action="/" method="POST">
                        <table style="width:auto">
                            @csrf
                            <tr>
                                <td style="width: 150px; font-family: 'Poppins';">
                                    <b>Username</b>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="username" style="font-family: 'Poppins';"
                                            class="form-control mb-2"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            id="username" placeholder="Username " required value="{{ old('username') }}"
                                            autofocus>
                                        @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td style="font-family: 'Poppins';">
                                    <b>Password</b>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="password" name="password" style="font-family: 'Poppins';"
                                            class="form-control mb-2"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            id=" password" placeholder="Input your password" required>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </td>

                            </tr>
                        </table>

                        <br>
                        <div class="col-md-12 text-center">
                            <button class="btn ps-5 pe-5 pb-2 pt-2 text-center text-light" name="submit"
                                style="background-color: #101E31; font-family: 'Poppins';" type="submit">
                                Login
                            </button>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #eee !important;
        }

        .login {
            background-color: #fff;
            width: 40%;
            margin: 80px auto;
            border-radius: 10px;
            padding: 20px;
            border-left: 5px solid #009688;
            box-shadow: 0px 0px 0px 0px #3f51b5;
        }

        .login>.row>h2 {
            margin: auto;
        }

        .btn-form {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>



    <div class="container">
        <div class="login">
            <div class="row">
                <h2>Sign Up</h2>
                <div class="col-md-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show my-1">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <form action=" {{ route('loginpost') }} " method="post">
                        @csrf
                        <label for="email">Email</label>
                        <input type="text" name="Useremail" class="form-control" id="email"
                            placeholder="Ex. youremail@mail.com">
                        <span class="text-danger my-1">
                            @error('Useremail')
                                {{ $message }}
                            @enderror
                        </span>
                        <br>
                        <label for="password">Password</label>
                        <input type="password" name="Userpassword" class="form-control" id="password"
                            placeholder="Ex. A123@paswod">
                        <span class="text-danger my-1">
                            @error('Userpassword')
                                {{ $message }}
                            @enderror
                        </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="submit" id="register" value="Signup" class="btn btn-outline-success btn-form">
                </div>
                <div class="col-md-6">
                    <a href="{{ route('register') }}"  class="btn btn-outline-primary btn-form">Register</a>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
</body>

</html>

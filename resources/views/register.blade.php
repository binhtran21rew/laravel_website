<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

</head>
<body>
    <div class="container">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                        <h2 class="text-uppercase text-center mb-5 custom">Create an account</h2>
                        @if(session('fail'))
                            <span>
                                <div class="alert alert-danger">{{ session('fail') }}</div>
                            </span>
                        @endif
                        <form action="{{ route('store') }}" method="POST">
                            @csrf

                            <div class="form-outline mb-4">
                                <label class="form-label custom" for="form3Example1cg">Your Name</label>
                                <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" />
                            </div>
                            <span>@error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>

                            <div class="form-outline mb-4">
                                <label class="form-label custom" for="form3Example3cg">Your Email</label>
                                <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                            </div>
                            <span>@error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>

                            <div class="form-outline mb-4">
                                <label class="form-label custom" for="form3Example4cg">Password</label>
                                <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                            </div>
                            <span>@error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>

                            <div class="form-outline mb-4">
                                <label class="form-label custom" for="form3Example4cdg">Confirm your password</label>
                                <input type="password" name="cpassword" id="form3Example4cdg" class="form-control form-control-lg" />
                            </div>
                            <span>@error('cpassword')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>


                            <div class="d-flex justify-content-center">
                                <input type="submit" value="Register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{ route('login') }}"
                                class="fw-bold text-body"><u>Login here</u></a>
                            </p>

                        </form>

                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>


<!------ Include the above in your HEAD tag ---------->

 


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/logup.css')}}">
</head>
<body>
    <section>
        <div class="container">
            <div class="registration-form">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-icon">
                        <span><i class="icon icon-user"></i></span>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control item @error('emnameail') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your fullname">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control item @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control item @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control item" name="password_confirmation" placeholder="Confirm password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block create-account">Register</button>
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Already have an account? <a href="{{ route('login') }}">Sign in now</a>
                        </p>
                        
                    </div>

                </form>

                <div class="social-media">
                    <h5>Sign up with social media</h5>
                    <div class="social-icons">
                        <a href="#"><i class="icon-social-facebook"></i></a>
                        <a href="#"><i class="icon-social-google"></i></a>
                        <a href="#"><i class="icon-social-github"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>

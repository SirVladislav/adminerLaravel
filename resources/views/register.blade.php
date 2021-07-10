@extends('layout');
@section('content')

<form method="POST" action="/register" class="container mt-5 mb-5">
    @csrf
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5"> <span class="circle"><i class="fa fa-check"></i></span>
                <h5 class="mt-3">FastNote Registration</h5><br />

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- <div class="form-input"> <i class="fa fa-envelope"></i> <input type="email" class="form-control" placeholder="Email address" name="email" required> </div><br> -->
                <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" placeholder="Username" name="username" required> </div><br>
                <div class="form-input"> <i class="fa fa-lock"></i> <input type="text" class="form-control" placeholder="password" name="password" required> </div><br>
                <div class="form-check"> <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required> <label class="form-check-label" for="flexCheckChecked"> I agree with all the statements </label> </div>

                <button type="submit" class="btn btn-primary mt-4 signup">Registration</button>

                <div class="text-center mt-3"> <span>Or continue with these social profile (Future update)</span> </div>
                <div class="d-flex justify-content-center mt-4"> <span class="social"><i class="fa fa-google"></i></span> <span class="social"><i class="fa fa-facebook"></i></span> <span class="social"><i class="fa fa-twitter"></i></span> <span class="social"><i class="fa fa-linkedin"></i></span> </div>
                <div class="text-center mt-4"> <span>Log in?</span> <a href="index.php" class="text-decoration-none">Log In</a> </div>

            </div>
        </div>
    </div>
</form>
@endsection
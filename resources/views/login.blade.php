 @extends('layout');
 @section('content')
 <form method="POST" action="/login" class="container mt-5 mb-5" autocomplete="on">
     @csrf
    
     <div class="row d-flex align-items-center justify-content-center">
         <div class="col-md-6">
             <div class="card px-5 py-5"> <span class="circle"><i class="fa fa-check"></i></span>
                 <h5 class="mt-3">FastNote Log In</h5><br>
                 @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
                 @endif
                 <div class="form-input"> <i class="fa fa-envelope"></i> <input name="username" type="text" class="form-control" placeholder="username" required> </div><br>
                 <div class="form-input"> <i class="fa fa-lock"></i> <input type="text" name="password" class="form-control" placeholder="password" required> </div>
                 <button type="submit" class="btn btn-primary mt-4 signup">Log In</button>
                 <div class="text-center mt-3"> <span>Or continue with these social profile (Future update)</span> </div>
                 <div class="text-center mt-4"> <span>No acc?</span> <a href="/register" class="text-decoration-none">Register</a> </div>
             </div>
         </div>
     </div>
 </form>
 @endsection
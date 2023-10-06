@extends('users/login')

  

@section('content')

<style>
    .custom-button {
        background-color: white;
        color: black;
        border: 2px solid black;
        border-radius: 10px; /* Adjust the radius as needed */
        margin-top: 10px; /* Adjust the margin as needed */
        padding: 5px 15px; /* Adjust padding as needed */
        width: 100%;
    }

    .custom-button:hover {
        background-color: black;
        color: white;
    }
    .form-control{
        width: 100%;
        border: 1.5px solid #ecedec;
        border-radius: 10px;
        height: 50px;
        display: flex;
        align-items: center;
        padding-left: 10px;
        transition: 0.2s ease-in-out;
    }
    
</style>

<main class="login-form">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" placeholder="Your Email here"name="email" required autofocus>
                                  @if ($errors->has('email'))

                                      <span class="text-danger">{{ $errors->first('email') }}</span>

                                  @endif

                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4">

                                <button type="submit" class="custom-button">
                                  Send Password Reset Link

                              </button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>


@endsection
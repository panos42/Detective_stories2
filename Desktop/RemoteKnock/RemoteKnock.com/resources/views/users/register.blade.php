<style>
.welcome{
  font-family: 'VAGRoundedRegular', sans-serif; /* Use the custom font with a fallback */
  font-size: 2rem;

}

    .form_canvas {
    display: flex;
    flex-direction: column;
    gap: 10px;
    background-color: #ffffff;
    padding: 30px;
    border-radius: 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  
  ::placeholder {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  
  .form_canvas button {
    align-self: flex-end;
  }
  
  .flex-column > label {
    color: #151717;
    font-weight: 600;
  }
  
  .inputForm {
    border: 1.5px solid #ecedec;
    border-radius: 10px;
    height: 50px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    transition: 0.2s ease-in-out;
  }
  
  .input {
    margin-left: 10px;
    border-radius: 10px;
    border: none;
    width: 85%;
    height: 100%;
  }
  
  .input:focus {
    outline: none;
  }
  
  .inputForm:focus-within {
    border: 1.5px solid #2d79f3;
  }
  
  .flex-row {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    justify-content: space-between;
  }
  
  .flex-row > div > label {
    font-size: 14px;
    color: black;
    font-weight: 400;
  }
  
  .span {
    font-size: 14px;
    margin-left: 5px;
    color: #2d79f3;
    font-weight: 500;
    cursor: pointer;
  }
  
  form.form_canvas .submit-btn {
    margin: 20px 0 10px 0;
    background-color: #151717;
    border: none;
    color: white;
    font-size: 15px;
    font-weight: 500;
    border-radius: 10px;
    height: 50px;
    width: 100%;
    cursor: pointer;
  }
  
  form.form_canvas .submit-btn:hover {
    background-color: #252727;
  }
  
  .p {
    text-align: center;
    color: black;
    font-size: 14px;
    margin: 5px 0;
  }
  
  .btn {
    margin-top: 10px;
    width: 100%;
    height: 50px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: 500;
    gap: 10px;
    border: 1px solid #ededef;
    background-color: white;
    cursor: pointer;
    transition: 0.2s ease-in-out;
  }
  
  .btn:hover {
    border: 1px solid #2d79f3;
    ;
  }
  
  
  
  .oauthButton {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        padding: auto 15px 15px auto;
        width: 100%;
        height: 40px;
        border-radius: 10px;
        border: 2px solid black;
        background-color: var(--bg-color);
        box-shadow: 4px 4px var(--main-color);
        font-size: 16px;
        font-weight: 600;
        color: var(--font-color);
        cursor: pointer;
        transition: all 250ms;
        position: relative;
        overflow: hidden;
        z-index: 1;
      }
  
      .oauthButton::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 0;
        background-color: #212121;
        z-index: -1;
        -webkit-box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        box-shadow: 4px 8px 19px -3px rgba(0, 0, 0, 0.27);
        transition: all 250ms;
      }
  
      .oauthButton:hover {
        color: #e8e8e8;
      }
  
      .oauthButton:hover::before {
        width: 100%;
      }
  
      .icon {
        width: 1.5rem;
        height: 1.5rem;
      }
      

    .register_form {
    height: 100%;
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    display: flex; /* Add this to use Flexbox */
    flex-direction: column; /* Vertically align its children */
    justify-content: center; /* Vertically center the content */
  }
  
      /* Add this CSS code to center the login_form vertically on mobile phones */
  @media (max-width: 767px) {
    .register_form {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
  }
  }
  
      
  </style>


<x-layout> 
    <x-card class="register_form">
      <header class="text-center">
      </header>

        {{-- <form method="POST" action="/users">
            @csrf --}}

            <form class="form_canvas" method="POST" action="/users">
                {{-- <p class="welcome">
                    Welcome,<span class="subtitle">sign up to continue</span>
                </p> --}}
                <header class="text-center">
                    {{-- <h2 class="text-2xl font-bold uppercase mb-1"> --}}
                      <p class="welcome">

                        Register to RemoteKnock
                      </p>
                    {{-- </h2> --}}
                    <p class="mb-4">...and start posting :)</p>
                </header>
                @csrf


            <div class="flex-column">
                <label>Name </label></div>
                <div class="inputForm">
                  <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                  <input type="text" class="input" placeholder="Enter your Name" name="name"
                  value="{{old('name')}}"/>
                  @error('name')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>




            <div class="flex-column">
                <label>Email </label></div>
                <div class="inputForm">
                  <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                  <input type="email" class="input" placeholder="Enter your Email" name="email"
                  value="{{old('email')}}"/>
                  @error('email')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                </div>

        

            <div class="flex-column">
                <label>Password </label></div>
                <div class="inputForm">
                  <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                  <input type="password" class="input" placeholder="Enter your Password" name="password"
                  value="{{old('password')}}" /> 
                  @error('password')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                  {{-- <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg> --}}
                </div>
        


            <div class="flex-column">
                <label>Confirm Password </label></div>
                <div class="inputForm">
                  <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                  <input type="password" class="input" placeholder="Confirm Password" name="password_confirmation"
                  value="{{old('password_confirmation')}}"/> 
                  @error('password_confirmation')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
                  {{-- <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg> --}}
                </div>
        

            {{-- <div class="mb-6"> --}}
                <button type="submit" class="submit-btn">
                    Sign Up
                </button>
            {{-- </div> --}}

          </p><p class="p line">OR</p>


          <a href="{{ route('auth.google') }}" class="oauthButton"> 
            <svg class="icon" viewBox="0 0 24 24">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
            <path d="M1 1h22v22H1z" fill="none"></path>
            </svg>
                Continue with Google
        </a>


            <div class="mt-8">
                <p class="p">
                    Already have an account?
                    <a href="/login" class="text-laravel" style="color: #2d79f3;">Login </a>
                </p>
            </div>

            <div class="flex-row">
                <p class="p" style="color: #8a8a8a">Forgot Password? Click here to <a href="{{ route('forget.password.get') }}"   style="color: #2d79f3;">Reset Password</a>
            </div>
        </form>
    </x-card>
</x-layout>

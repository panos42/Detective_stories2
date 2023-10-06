<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>CV Builder</title>


</head>
<body style="background-color:#ffffff;">
    <h1>Create Your CV</h1>
{{-- 
    <div class="custom-mb-15"> 
      @include('cv.cv_sidemenu')
  </div> --}}

<div class="cv_form_card">
    <form method="POST" action="{{ route('cv.store') }}">
        @csrf

        
        <div class="mb-6">
            {{-- <label for="first_name" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                First Name
            </label> --}}
            <input type="text" class="cv_input_fields" name="first_name" placeholder="First Name"
              value="{{$CVProfile->first_name}}" />
    
            @error('first_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
 

        <div class="mb-6">
            {{-- <label for="last_name" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Last Name
            </label> --}}
            <input type="text" class="cv_input_fields" name="last_name" placeholder="Last Name"
              value="{{$CVProfile->last_name}}" />
    
            @error('last_name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>


        <div class="mb-6">
            {{-- <label for="email" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Email
            </label> --}}
            <input type="text" class="cv_input_fields" name="email" placeholder="Email Address"
              value="{{$CVProfile->email}}" />
    
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

        <div class="mb-6">
            {{-- <label for="phone" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Phone
            </label> --}}
            <input type="text" class="cv_input_fields" name="phone" placeholder="Phone Number"
              value="{{$CVProfile->phone}}" />
    
            @error('phone')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>


        <div class="mb-6">
            {{-- <label for="Job_Experience" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Job Experience
            </label> --}}
            <input type="text" class="cv_input_fields" name="Job_Experience" placeholder="Job Experience"
              value="{{$CVProfile->Job_Experience}}" />
    
            @error('Job_Experience')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>


        <div class="mb-6">
            {{-- <label for="Education" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Education
            </label> --}}
            <input type="text" class="cv_input_fields" name="Education" placeholder="Education"
              value="{{$CVProfile->Education}}" />
    
            @error('Education')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>


        <div class="mb-6">
            {{-- <label for="Skills" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Skills
            </label> --}}
            <input type="text" class="cv_input_fields" name="Skills" placeholder="Skills"
              value="{{$CVProfile->Skills}}" />
    
            @error('Skills')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>


        <div class="mb-6">
            {{-- <label for="Languages" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Languages
            </label> --}}
            <input type="text" class="cv_input_fields" name="Languages" placeholder="Languages"
              value="{{$CVProfile->Languages}}" />
    
            @error('Languages')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

        <div class="mb-6">
            {{-- <label for="Objective" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
                Objective
            </label> --}}
            <input type="text" class="cv_input_fields" name="Objective" placeholder="Objective"
              value="{{$CVProfile->Objective}}" />
    
            @error('Objective')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

        
        <div class="form-group">
            <label for="template">Select Template</label>
            <select name="template" id="template" required>
                <option value="template1">Template 1</option>
                <option value="template2">Template 2</option>
            </select>
        </div>

        

        {{-- <div class="card">

            <button type="submit" class="my-button">
              <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
                <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
              </svg>
              Create CV
            </button>
        </div> --}}

        <button>
          
          <span class="text">
            <svg height="24" width="24" fill="#FFFFFF" viewBox="0 0 24 24" data-name="Layer 1" id="Layer_1" class="sparkle">
              <path d="M10,21.236,6.755,14.745.264,11.5,6.755,8.255,10,1.764l3.245,6.491L19.736,11.5l-6.491,3.245ZM18,21l1.5,3L21,21l3-1.5L21,18l-1.5-3L18,18l-3,1.5ZM19.333,4.667,20.5,7l1.167-2.333L24,3.5,21.667,2.333,20.5,0,19.333,2.333,17,3.5Z"></path>
            </svg>
            Generate</span>
        </button>
      
    </form>

  </div>

<style>


/*  */
button {
 align-items: center;
 background-image: linear-gradient(144deg,#AF40FF, #5B42F3 50%,#00DDEB);
 border: 0;
 border-radius: 8px;
 box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
 box-sizing: border-box;
 color: #FFFFFF;
 display: flex;
 font-family: Phantomsans, sans-serif;
 font-size: 18px;
 justify-content: center;
 line-height: 1em;
 max-width: 100%;
 min-width: 140px;
 padding: 3px;
 text-decoration: none;
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 white-space: nowrap;
 cursor: pointer;
 transition: all .3s;
}

button:active,
button:hover {
 outline: 0;
}

button span {
 background-color: rgb(5, 6, 45);
 padding: 16px 24px;
 border-radius: 6px;
 width: 100%;
 height: 100%;
 transition: 300ms;
}

button:hover span {
 background: none;
}

button:active {
 transform: scale(0.9);
}
/*  */

  .cv_form_card{
    border: 1px solid #cacaca;
    border-radius: 3rem;
    justify-content: center;
    align-content: center;
    text-align: center;
  }

    .card {
      width: 200px;
      height: 50px;
      border-radius: 20px;
      padding: 5px;
      box-shadow: rgba(151, 65, 252, 0.2) 0 15px 30px -5px;
      background-image: linear-gradient(144deg,#40ffb3, #5B42F3 50%,#00DDEB);
    }

    .my-button {
      color: white;
      font-size: 2rem;
      background: rgb(5, 6, 45);
      border-radius: 17px;
      width: 100%;
      height: 100%;
      border: transparent;
      cursor: pointer; /* Add this line to set the cursor to a hand pointer on hover */
    }


      .cv_input_fields{
    font-size: 1.5rem;
    color: #000000;

    border: 1px solid #cacaca;
    background: #ffffff;
    border-radius: 0.25rem;
    padding: 0.5rem;
    width: 50%; 
    margin-top: 1rem;
    margin-bottom: 1rem;
  }
</style>
    
</body>
</html>



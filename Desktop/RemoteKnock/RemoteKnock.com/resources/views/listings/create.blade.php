<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
  <!-- Include Quill CSS -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet">

<!-- Include jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

</head>
{{--  --}}
@auth
@if (!auth()->user()->hasVerifiedEmail() && (auth()->user()->google_id==""))
  <div class="bg-yellow-200 p-4 rounded mb-4">
    <p>
      Please verify your email before creating a job listing. Check your email for a verification link, or
      <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="d-inline btn btn-link p-0 text-blue-500 focus:outline-none">
          click here to request another
        </button>
      </form>
    </p>
  </div>
@endif
@endauth
{{--  --}}
<x-layout>
  <x-card class="main_edit_card"> <!-- Use max-w-5xl or any other desired width class -->
  <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1" style="font-size: 1.5rem">Post a job to find a developer</h2>
    </header>


    <form method="POST" action="/listings" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="company" class="inline-block text-lg mb-2" style="font-size: 1.5rem">Company Name</label>
        <input type="text"
         class="input_fields"
         name="company"
         placeholder="Company Name"
          value="{{old('company')}}" />

        @error('company')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="title" class="job_title_class" style="font-size: 1.5rem">Job Title</label>
        <input type="text" class="input_fields" name="title"
          placeholder="Example: Senior Front-end Developer" value="{{old('title')}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      {{-- <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
          placeholder="Example: Remote, Boston MA, etc" value="{{old('location')}}" />

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> --}}


      <select class="input_fields" name="location">
        @php
            $countries = include(resource_path('data/countries.php'));
            $selectedLocation = old('location'); // Get the previously selected location
        @endphp
    
        @foreach ($countries as $emoji => $country)
            @php
                $optionValue = $emoji . ' ' . $country;
            @endphp
            <option value="{{ $optionValue }}" @if($optionValue === $selectedLocation) selected @endif>
                {{ $emoji }} {{ $country }}
            </option>
        @endforeach
    </select>
    @error('location')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror

    
    

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
          Contact Email
        </label>
        <input type="text" class="input_fields" name="email" value="{{old('email')}}" placeholder="test@mail.com"/>

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
          Website/Application URL
        </label>
        <input type="text" class="input_fields" name="website" placeholder="acme.com"
          value="{{old('website')}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
          Tags (Comma Separated)
        </label>
        <input type="text" class="input_fields" name="tags"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

        
        <div class="mb-6 flex items-center">
          <div class="mr-4">
            <label for="min_salary" class="inline-block text-lg mb-2" style="font-size: 1.5rem">Minimum Salary</label>
            <select class="input_fields" name="min_salary">
              <option value="">Select minimum salary</option>
              <option value="10000">USD 10.000 per year</option>
              <option value="20000">USD 20.000 per year</option>
              <option value="30000">USD 30.000 per year</option>
              <option value="40000">USD 40.000 per year</option>
              <option value="50000">USD 50.000 per year</option>
              <option value="60000">USD 60.000 per year</option>
              <option value="70000">USD 70.000 per year</option>
              <option value="80000">USD 80.000 per year</option>
              <option value="90000">USD 90.000 per year</option>
              <option value="100000">USD 100.000 per year</option>
              <option value="110000">USD 110.000 per year</option>
              <option value="120000">USD 120.000 per year</option>
              <option value="130000">USD 130.000 per year</option>
              <option value="140000">USD 140.000 per year</option>
              <option value="150000">USD 150.000 per year</option>


              <!-- Add more options as needed -->
            </select>
            @error('min_salary')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        
          <div>
            <label for="max_salary" class="inline-block text-lg mb-2" style="font-size: 1.5rem">Maximum Salary</label>
            <select class="input_fields" name="max_salary">
              <option value="">Select maximum salary</option>
              <option value="10.000">USD 10.000 per year</option>
              <option value="20.000">USD 20.000 per year</option>
              <option value="30.000">USD 30.000 per year</option>
              <option value="40.000">USD 40.000 per year</option>
              <option value="50.000">USD 50.000 per year</option>
              <option value="60.000">USD 60.000 per year</option>
              <option value="70.000">USD 70.000 per year</option>
              <option value="80.000">USD 80.000 per year</option>
              <option value="90.000">USD 90.000 per year</option>
              <option value="100.000">USD 100.000 per year</option>
              <option value="110.000">USD 110.000 per year</option>
              <option value="120.000">USD 120.000 per year</option>
              <option value="130.000">USD 130.000 per year</option>
              <option value="140.000">USD 140.000 per year</option>
              <option value="150.000">USD 150.000 per year</option>

              <!-- Add more options as needed -->
            </select>
            @error('max_salary')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
        </div>
        
        {{--  --}}

        
      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" id="logoInput" />
        <img id="logoPreview" src="#" alt="Uploaded Logo" style="display: none; max-width: 200px;" />
      
        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Job Description
        </label>

        {{-- <textarea class="border border-gray-200 rounded p-2 w-full" name="description"  rows="10" id="editor"
          placeholder="Include tasks, requirements, salary, etc">{{old('description')}}</textarea> --}}
          
              <!-- Hidden input field to store the description content -->
        <input type="hidden" name="description" id="descriptionInput" value="{{ old('description') }}" />

        <!-- The div element for the Quill editor -->
          <div id="editor"> </div> 

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="post_button">
          Create Post
        </button>

      
        {{-- <a href="/" class="text-black ml-4"> Back </a> --}}
      </div>
    </form>
  </x-card>
</x-layout>
<!-- Add Quill JavaScript -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });

  // Add an event listener to update the hidden input field when the editor content changes
  quill.on('text-change', function () {
    var html = quill.root.innerHTML;
    document.getElementById('descriptionInput').value = html;
  });
</script>

{{-- <script>
  $(document).ready(function() {
    const countries = {!! json_encode($countries) !!};

    $('#locationInput').select2({
      tags: true,
      tokenSeparators: [','],
      data: countries
    });
  });
</script> --}}





<style>

.job_title_class {
  display: inline-block;
  font-size: 1.125rem;
  margin: 0.5rem 0; /* Add margin to the top and bottom */
}

.input_fields {
  font-size: 1.5rem;
  color: white;
  border: 1px solid #e2e8f0;
  background: #181818;
  border-radius: 0.25rem;
  padding: 0.5rem;
  width: 100%;
  margin-top: 1rem;
  margin-bottom: 1rem;}


.post_button {
  color: white;
  background-color: #5865F2;
  border-radius: 0.25rem;
  padding: 0.5rem 1rem; /* Adjust padding as needed */
  margin-top: 1rem; /* Add margin to the top */
  margin-bottom: 1rem; /* Add margin to the bottom */
}


      .main_edit_card{
        margin: 10px auto;
        color: #bfbfbf;
        padding-left: 10px;
        padding-right: 10px; 
        max-width: 100%; 
      }



        /* Additional styles for responsiveness */
    @media (min-width: 768px) {
      .container {
        max-width: 768px;
        margin: 0 auto;
      }

      .input-fields,
      .input-fields select {
        width: calc(50% - 10px);
        margin-right: 20px;
      }

      .input-fields select {
        width: 100%;
      }

      .post-button {
        width: auto;
      }
    }
</style>


<!--  FUNCTION FOR LOWER CHAR LIMIT -->
{{-- <script>
  const descriptionInput = document.querySelector('textarea[name="description"]');
  const descriptionCount = document.createElement('span');
  descriptionCount.innerText = 'Characters left: 50';
  descriptionInput.parentNode.appendChild(descriptionCount);

  descriptionInput.addEventListener('input', () => {
    const remainingCharacters = 50 - descriptionInput.value.length;
    descriptionCount.innerText = `Characters left: ${remainingCharacters}`;
    descriptionCount.style.color = remainingCharacters >= 0 ? 'black' : 'red';
  });
</script> --}}


</html>
<!DOCTYPE html>
<html lang="en">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  </head>

<body>

  <div class="container">
  <div class="edit-layout">

<x-layout>
  <x-card class="main_edit_card">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Editing Listing - {{$listing->title}}</h2>
    </header>

    <form id="update-form" method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="company" class="inline-block text-lg">Company Name</label>
        <input type="text" class="input_fields" name="company"
          value="{{$listing->company}}" />

        @error('company')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="title" class="job_title_class">Job Title</label>
        <input type="text" class="input_fields" name="title"
          placeholder="Example: Senior Front-end Developer" value="{{$listing->title}}" />

        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      {{-- <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2">Job Location</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
          placeholder="Example: Remote, Boston MA, etc" value="{{$listing->location}}" />

        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> --}}

      <div class="mb-6">
        <label for="location" class="inline-block text-lg mb-2" style="font-size: 1.5rem">Job Location</label>
        <select class="input_fields" name="location">
            @php
                $countries = include(resource_path('data/countries.php'));
                $savedLocation = $listing->location; // Replace with the actual variable that holds the saved location value
            @endphp
    
            @foreach ($countries as $emoji => $country)
                <option value="{{ $emoji . ' ' . $country }}" {{ $savedLocation === ($emoji . ' ' . $country) ? 'selected' : '' }}>
                    {{ $emoji }} {{ $country }}
                </option>
            @endforeach
        </select>
        @error('location')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>
    
    
      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"style="font-size: 1.5rem">
          Contact Email
        </label>
        <input type="text" class="input_fields" name="email" value="{{$listing->email}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="website" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
          Website/Application URL
        </label>
        <input type="text" class="input_fields" name="website"
          value="{{$listing->website}}" />

        @error('website')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2" style="font-size: 1.5rem">
          Tags (Comma Separated)
        </label>
        <input type="text" class="input_fields" name="tags"
          placeholder="Example: Laravel, Backend, Postgres, etc" value="{{$listing->tags}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        {{--  --}}
        {{-- <div class="mb-6">
        <label for="min_salary" class="inline-block text-lg mb-2">
          Min Salary
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="min_salary"
          placeholder="" value="{{$listing->min_salary}}" />

        @error('salary')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="max_salary" class="inline-block text-lg mb-2">
          Max Salary
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="max_salary"
          placeholder="" value="{{$listing->max_salary}}" />

        @error('salary')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div> --}}

      <div class="mb-6 flex items-center">
        <div class="mr-4">
          <label for="min_salary" class="inline-block text-lg mb-2" style="font-size: 1.5rem">Minimum Salary</label>
          <select class="input_fields" name="min_salary">
            <option value="">Select minimum salary</option>
            <option value="10000" @if ($listing->min_salary == 10000) selected @endif>USD 10,000 per year</option>
            <option value="20000" @if ($listing->min_salary == 20000) selected @endif>USD 20,000 per year</option>
            <option value="30000" @if ($listing->min_salary == 30000) selected @endif>USD 30,000 per year</option>
            <option value="40000" @if ($listing->min_salary == 40000) selected @endif>USD 40,000 per year</option>
            <option value="50000" @if ($listing->min_salary == 50000) selected @endif>USD 50,000 per year</option>
            <option value="60000" @if ($listing->min_salary == 60000) selected @endif>USD 60,000 per year</option>
            <option value="70000" @if ($listing->min_salary == 70000) selected @endif>USD 70,000 per year</option>
            <option value="80000" @if ($listing->min_salary == 80000) selected @endif>USD 80,000 per year</option>
            <option value="90000" @if ($listing->min_salary == 90000) selected @endif>USD 90,000 per year</option>
            <option value="100000" @if ($listing->min_salary == 100000) selected @endif>USD 100,000 per year</option>
            <option value="110000" @if ($listing->min_salary == 110000) selected @endif>USD 110,000 per year</option>
            <option value="120000" @if ($listing->min_salary == 120000) selected @endif>USD 120,000 per year</option>
            <option value="130000" @if ($listing->min_salary == 130000) selected @endif>USD 130,000 per year</option>
            <option value="140000" @if ($listing->min_salary == 140000) selected @endif>USD 140,000 per year</option>
            <option value="150000" @if ($listing->min_salary == 150000) selected @endif>USD 150,000 per year</option>
            <option value="160000" @if ($listing->min_salary == 160000) selected @endif>USD 160,000 per year</option>
            <option value="170000" @if ($listing->min_salary == 170000) selected @endif>USD 170,000 per year</option>


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
            <option value="10000" @if ($listing->max_salary == 10000) selected @endif>USD 10,000 per year</option>
            <option value="20000" @if ($listing->max_salary == 20000) selected @endif>USD 20,000 per year</option>
            <option value="30000" @if ($listing->max_salary == 30000) selected @endif>USD 30,000 per year</option>
            <option value="40000" @if ($listing->max_salary == 40000) selected @endif>USD 40,000 per year</option>
            <option value="50000" @if ($listing->max_salary == 50000) selected @endif>USD 50,000 per year</option>
            <option value="60000" @if ($listing->max_salary == 60000) selected @endif>USD 60,000 per year</option>
            <option value="70000" @if ($listing->max_salary == 70000) selected @endif>USD 70,000 per year</option>
            <option value="80000" @if ($listing->max_salary == 80000) selected @endif>USD 80,000 per year</option>
            <option value="90000" @if ($listing->max_salary == 90000) selected @endif>USD 90,000 per year</option>
            <option value="100000" @if ($listing->max_salary == 100000) selected @endif>USD 100,000 per year</option>
            <option value="110000" @if ($listing->max_salary == 110000) selected @endif>USD 110,000 per year</option>
            <option value="120000" @if ($listing->max_salary == 120000) selected @endif>USD 120,000 per year</option>
            <option value="130000" @if ($listing->max_salary == 130000) selected @endif>USD 130,000 per year</option>
            <option value="140000" @if ($listing->max_salary == 140000) selected @endif>USD 140,000 per year</option>
            <option value="150000" @if ($listing->min_salary == 150000) selected @endif>USD 150,000 per year</option>
            <option value="160000" @if ($listing->min_salary == 160000) selected @endif>USD 160,000 per year</option>
            <option value="170000" @if ($listing->min_salary == 170000) selected @endif>USD 170,000 per year</option>
            <!-- Add more options as needed -->
          </select>
          @error('max_salary')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>
      </div>
      

      {{--  --}}

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Company Logo
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        <img class="w-48 mr-6 mb-6"
          src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png')}}" alt="" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="description" class="inline-block text-lg mb-2">
          Job Description
        </label>


        <!-- Hidden input field to store the description content -->
        <input type="hidden" name="description" id="descriptionInput" value="{{ old('description') }}" />

        <!-- The div element for the Quill editor -->
        <div id="editor" value="{{ old('description') }}">{!!$listing->description!!} </div> 


        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="update_button">
          Update Gig
        </button>

        <a href="/" class="text-white ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
    </div>

    <!-- Add Quill JavaScript -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script>

      var quill = new Quill('#editor', {
      theme: 'snow'
      });

      // Set the initial content of the Quill editor
      quill.root.innerHTML = {!! json_encode($listing->description) !!};

      // Update the hidden input field with the initial content
      document.getElementById('descriptionInput').value = quill.root.innerHTML;
      quill.on('text-change', function () {
      var html = quill.root.innerHTML;
      document.getElementById('descriptionInput').value = html;
      });
    </script>






     
    <style>

      .job_title_class {

  display: inline-block;
  font-size: 1.5rem;
  margin: 0.5rem 0; /* Add margin to the top and bottom */
}
      .update_button{
        color: white; /* text color */
        background-color: #5865F2; /* background color */
        border-radius: 0.25rem; /* rounded corners */
        padding-top: 0.5rem; /* vertical padding */
        padding-bottom: 0.5rem; /* vertical padding */
        padding-left: 1rem; /* horizontal padding */
        padding-right: 1rem; /* horizontal padding */
      }

      .input_fields{
        font-size: 1.5rem;
        color: white;
        border: 1px solid #e2e8f0;
        background: #181818;
        border-radius: 0.25rem;
        padding: 0.5rem;
        width: 100%; 
        margin-top: 1rem;
        margin-bottom: 1rem;
      }

      .main_edit_card{
        color: #bfbfbf;
        /* background: #222222; */
      }


    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: white;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 300px;
      text-align: center;
    }

    .modal-buttons {
      margin-top: 10px;
    }

      /* New styles for the buttons */
      .modal-buttons button {
      padding: 8px 16px;
      margin-right: 8px;
      cursor: pointer;
      border-radius: 4px;
    }

    #confirm-button {
      background-color: #10B981;
      color: white;
    }

    #cancel-button {
      background-color: #EF4444;
      color: white;
    }
  </style> 

     

  <!-- Add the CSS for the two-column layout here -->
  <style>
    /* The container that holds both the edit and preview layouts */
    .container {
      display: flex;
      gap: 20px;
      padding: 20px;
    }

    /* Styles for the edit layout */
    .edit-layout {
      flex: 1; /* This makes the edit layout occupy 50% of the container width */
    }

    /* Styles for the preview layout */
    .preview-layout {
      flex: 1; /* This makes the preview layout occupy 50% of the container width */
      border: 1px solid #ccc;
      padding: 20px;
    }
  </style>


<style>
 


  /* New styles for mobile devices */
  @media only screen and (max-width: 768px) {
    /* Adjust the column layout for mobile screens */
    .container {
      flex-direction: column;
    }

    .edit-layout,
    .preview-layout {
      width: 100%; /* Make both columns take the full width on mobile */
    }

    /* Adjust the gig card width on mobile */
    .max-w-lg {
      max-width: 100%;
    }

    /* Adjust the company logo size on mobile */
    .edit-layout img {
      width: 100%;
      max-width: 200px; /* You can adjust this as needed */
      margin: 0 auto;
    }

    /* Ensure the modal fits well on mobile */
    .modal-content {
      width: 80%;
    }
  }

  /* Existing styles... */

  /* New styles for mobile devices */
  @media only screen and (max-width: 768px) {
    /* Adjust the input fields width on mobile */
    input[type="text"],
    input[type="file"] {
      width: 100%;
    }

    /* Increase the font size on mobile */
    .text-lg {
      font-size: 18px;
    }

    /* Increase the font size for buttons on mobile */
    .modal-buttons button {
      font-size: 16px;
    }
  }

  /* Center the container horizontally and vertically */
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f0f0f0; /* Add a background color for visualization */
  }

</style>


  <!-- Add this modal code at the end of your <body> tag -->
    <div id="custom-modal" class="modal">
      <div class="modal-content">
        <p>Are you sure you want to perform this action?</p>
        <div class="modal-buttons">
          <button id="confirm-button">Confirm</button>
          <button id="cancel-button">Cancel</button>
        </div>
      </div>
    </div> 

</body>
</html>


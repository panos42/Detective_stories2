<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap" rel="stylesheet">


<!doctype html>
<html>
    <head>
       
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        {{-- @vite('resources/css/app.css') --}}
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >
        <link href="{{ asset('/css/general.css') }}" rel="stylesheet">    

        {{-- <link rel="icon" href="images/favicon.ico" /> --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

        {{--  --}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


</head>


<body>
<x-layout >
    {{-- @include('partials._search') --}}
    @include('partials._navbar')
    {{-- @include('partials._hero') --}}

    <div>

        <x-card class="whole_card">
            
            <div>
                {{-- <a href="/" class="inline-block text-white ml-4 mb-4">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a> --}}
                <div class="card-content"  style="margin-top: 50px;">
                <img class="logo-show-page" src="{{$listing->logo ? asset('storage/' . $listing->logo) : asset('/images/default-listing.png')}}" alt=""/>
                <h3 class="job-title">{{$listing->title}}</h3>
                <div class="job-company">{{$listing->company}}</div>
                
                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="job-location">
                {{$listing->location}} 
                </div>

                <div class="border_line"></div>



                {{-- <div class="listing-views">👀 {{$listing->listing_views}} views</div> --}}
                <span class="view-card">
                    👀 {{$listing->listing_views}} views
                </span>
                
                            
                </div>
                <div>
                    
                    
                    
                    <div style="margin-top: 20px;"> <!-- Add margin-top for spacing -->
                        <h3 class="description-title">Job Description</h3>
                        <div class="description-font">
                            {!! $listing->description !!}
                        </div>
                    </div>

                    <div>
                        {{-- <div class="actions" style="margin-top: 20px;">
                            <a href="mailto:{{$listing->email}}" class="contact-employer">Apply Now</a>
                            <a href="{{$listing->website}}" target="_blank" class="contact-employer">Apply Now</a>
                        </div> --}}
                        <div class="actions" style="margin-top: 20px;">
                            
                            <a href="{{$listing->website}}" target="_blank" class="contact-employer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16" style="margin-left: 5px;">
                                    <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                    <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                </svg>
                                Apply Now
                                
                            </a>
                        </div>
                        
                    </div>
      
                </div>
            </div>
        </x-card>
    </div>
</x-layout>


  <style>

.view-card {
  white-space: nowrap;
  border-radius: 9999px; 
  background-color: #f3e8fd; /* Purple-100 color code */
  padding: 5px 10px; /* Adjust the values as needed */
  font-size: 1.2rem; /* 2xl size */
  color: #5a3798; /* Purple-700 color code */
}

    
        @layer base {
        ul,
        ol {
        list-style: revert;
        }
    }

    .border_line{
        border: 1px solid #E5E7EB;
        width: 100%;
        margin-bottom: 6px;
    }

    .job-company{
        font-size: 1.5rem;
    }

    .job-location{
        font-size: 1.5rem;
        margin-top:1rem;
        margin-bottom:1rem;
    }
    .listing-views{
        font-size: 1.5rem;
    }


    .contact-employer {
        display: block;
        width: 80%;
        margin: 0 auto; 
        padding: 10px 0;
        text-align: center;
        background-color: #5865f2;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }


    /* .description-font {
        font-size: 1.3rem;
        line-height:1.6;
        font-family: Sen, ui-serif, Georgia, Cambria, Times New Roman, Times, serif;
        padding: 0 10px; 
        
    } */

    .description-font {
    font-size: 1.3rem;
    line-height: 1.6;
    font-family: Sen, ui-serif, Georgia, Cambria, Times New Roman, Times, serif;
    padding: 0 0px;
    word-wrap: break-word; /* Add this property to wrap long words */
    max-width: 100%; /* Set the maximum width of the description */
    box-sizing: border-box; /* Include padding in the max-width calculation */
}


        /* Center content within the card */
    .card-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    body, html {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
    }

    .test{
        width: 100%;
    }

    .whole_card{
        background: #252525;
        color: white;
        padding: 200px;
        width: 100%;
    }

    
    /* Center the logo */
    .logo-show-page {
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Adjust margin for the job title */
    .job-title {
        font-size: 2rem;
        margin-top: 10px;
        margin-bottom: 5px;
    }
    

    body {
        font-family: 'Sen', sans-serif;
        margin: 0;
        padding: 0;
    }
        
    /* Adjustments for small screens */
    @media (max-width: 768px) {
        .whole_card{
        background: #252525;
        color: white;
        padding: 20px;
        width: 100%;
    }
        .logo-show-page{
            width: auto;
            height: auto;
            border-radius: 25%;
        }
        .card-content {
            padding: 25px; 
            text-align: left;
        }
        .card-content img {
            width: 25%; 
        }
        .job-title {
            margin-top: 25px;
        }
        

    }

    </style>


    

</body>
</html>

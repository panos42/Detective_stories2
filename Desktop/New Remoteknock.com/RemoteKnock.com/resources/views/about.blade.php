{{-- 
<x-layout>

@include('partials._navbar')

</x-layout> --}}
<div class="about-section">
    <h1>About Us Page</h1>
    <p>Some text about who we are and what we do.</p>
    <p>Resize the browser window to see that this page is responsive by the way.</p>
  </div>
  
  <h2 style="text-align:center">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Jane Doe</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>jane@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
        <div class="container">
          <h2>Mike Ross</h2>
          <p class="title">Art Director</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>mike@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  
    <div class="column">
      <div class="card">
        <img src="/w3images/team3.jpg" alt="John" style="width:100%">
        <div class="container">
          <h2>John Doe</h2>
          <p class="title">Designer</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>john@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>
  </div> 
{{--  --}}
<div class="mac-card">
  <div class="tools">
    <div class="circle">
      <span class="red box"></span>
    </div>
    <div class="circle">
      <span class="yellow box"></span>
    </div>
    <div class="circle">
      <span class="green box"></span>
    </div>
  </div>
  <div class="mac-card__content">
    <ul class="tw-mb-4 tw-list-disc tw-pl-10">
      <li class="white-text">
        <b class="white-text">Trust is paramount</b>
      </li>
      <li class="white-text">
        <b>Playing the long game</b> — We work at companies who invest in long-term professional growth.
      </li>
      <li class="white-text">
        <b>Family first</b> — We work at companies who are family-friendly, we only pull an all-nighter for kids.
      </li>
    </ul>
  </div>
</div>

  {{--  --}}
 
  {{-- Max Design Window --}}
  <style>
    .mac-card {
      display: inline-block; /* Adjusted display property */
      background-color: #011522;
      border-radius: 8px;
      padding: 20px; /* Added padding to provide some spacing */
    }
  
    .tools {
      display: flex;
      align-items: center;
      padding: 9px;
    }
  
    .circle {
      padding: 0 4px;
    }
  
    .box {
      display: inline-block;
      align-items: center;
      width: 10px;
      height: 10px;
      padding: 1px;
      border-radius: 50%;
    }
  
    .red {
      background-color: #ff605c;
    }
  
    .yellow {
      background-color: #ffbd44;
    }
  
    .green {
      background-color: #00ca4e;
    }
  
    .white-text {
      color: white; /* Added white text color */
    }
  </style>
  



  <style>
    body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    }

    html {
    box-sizing: border-box;
    }

    *, *:before, *:after {
    box-sizing: inherit;
    }

    .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
    }

    .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    margin: 8px;
    }

    .about-section {
    padding: 50px;
    text-align: center;
    background-color: #474e5d;
    color: white;
    }

    .container {
    padding: 0 16px;
    }

    .container::after, .row::after {
    content: "";
    clear: both;
    display: table;
    }

    .title {
    color: grey;
    }

    .button {
    border: none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    }

    .button:hover {
    background-color: #555;
    }

    @media screen and (max-width: 650px) {
    .column {
        width: 100%;
        display: block;
    }
    }

</style>
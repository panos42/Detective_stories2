<!DOCTYPE html>
<html>
<head>
    <style>


        /* Add styles for the filter button and icon */
        .filter-button {
            background-color: #007bff; /* Change the button background color */
            color: #fff; /* Text color */
            border: none;
            border-radius: 50%; /* Make the button round */
            width: 40px; /* Adjust the button width as needed */
            height: 40px; /* Adjust the button height as needed */
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .filter-icon {
            fill: #fff; /* Icon color */
            width: 24px; /* Adjust the icon size as needed */
            height: 24px; /* Adjust the icon size as needed */
        }

        .invisible-box {
            margin-top: 5%;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;
            /* height: 20vh; */
        }

         /* .searchInput:active {
        transform: scale(0.95);
        }  */

        .group {
            display: flex;
            line-height: 28px;
            align-items: center;
            position: relative;
            max-width: 1000px;
            margin-bottom: 10px;
        }

        .input-group {
            display: flex;
            flex-direction: row;
            gap: 10px; /* Vertical gap between input fields */
        }

 
        /* .icon {
        position: absolute;
        left: 1rem;
        fill: #9e9ea7;
        width: 1rem;
        height: 1rem;
        } */
        .icon {
            position: absolute;
            left: 1rem;
            top: 50%; /* Vertically center the icon */
            transform: translateY(-50%); /* Adjust for vertical centering */
            fill: #9e9ea7;
            width: 1.5rem; /* Increase icon size */
            height: 1.5rem; /* Increase icon size */
            font-weight: bold; /* Make the icon bold */
        }

        .main-search {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%; /* Adjust the width as needed */
            max-width: 100px; /* Set a maximum width if desired */
            margin: 0 auto; /* Center the container horizontally */
            text-align: center;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            /* height: 100vh; */
        }
          /* Hide the submit button */
    button[type="search_hidden_submit"] {
        display: none;
    }

/*  */

/* styles.css */
.horizontal-scroll-menu {
    width: 1000px;
    background-color: rgba(0, 123, 255, 0.2);
    overflow-x: auto;
    white-space: nowrap;
    background-color: transparent;
    scrollbar-width: thin; /* Set the width of the scrollbar */
    scrollbar-color: #204368 rgba(0, 0, 0, 0.2); /* Set the thumb and track colors */
}


.menu-list {
    background-color: transparent;
    padding: 0;
    margin: 1.5rem;
    list-style: none;
}

.menu-item {
    display: inline-block;
    padding: 7px 15px; /* Adjust padding as needed */
    font-size: 16px; /* Adjust font size as needed */
    cursor: pointer;
    background-color: #a7d1e5;
    align-items: center; /* Center vertically */
    color:#10445c;
    border-radius: 25px; /* Make the items round */
    margin-right: 3px; /* Adjust spacing between items */
}

.menu-item:hover {
    background-color: #75b5d2; /* Change color on hover */
}

    

        /* Media query for smaller screens */
        @media only screen and (max-width: 768px) {
            .horizontal-scroll-menu{
                width: 350px ;
            }

           

            .filter-button {
                /* Adjust the button size for smaller screens if needed */
                width: 30px;
                height: 30px;
            }

            .filter-icon {
                /* Adjust the icon size for smaller screens if needed */
                width: 20px;
                height: 20px;
            }



        .searchInput {
            width: max-content;
            height: 40px; /* Adjust height for smaller screens */
            font-size: 20px; /* Adjust font size for smaller screens */
        }

        .input-group {                
            flex-direction: column; /* Stack input fields vertically on smaller screens */
            gap: 10px; /* Vertical gap between input fields */
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 80px;
            /* height: 100vh; */
        }

        .group {
            flex-direction: column;
        }
        }
    </style>
</head>
<body>
    <div class="invisible-box">


        <form action="/" class="search-container" id="searchForm">
            <div class="main-search">
                <div class="group">

                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                <input
                    placeholder="Search for jobs..."
                    id="searchInput"
                    class="searchInput"
                    name="search"
                    type="search"
                    value="{{ request('search') }}"
                >
            </div>
           


            <div class="input-group"> <!-- New input-group container -->
                {{-- <input 
                    name="min_salary"
                    placeholder="Minimum Salary" 
                    type="text" 
                    class="filterInput"
                    value="{{ request('min_salary') }}"
                > --}}
                {{-- <select class="filterInput" name="min_salary">
                    <option value="">💵 Salary</option>
                    <option value="10000">$10.000 per year</option>
                    <option value="20000">$20.000 per year</option>
                    <option value="30000">$30.000 per year</option>
                    <option value="40000">$40.000 per year</option>
                    <option value="50000">$50.000 per year</option>
                    <option value="60000">$60.000 per year</option>
                    <option value="70000">$70.000 per year</option>
                    <option value="80000">$80.000 per year</option>
                    <option value="90000">$90.000 per year</option>
                    <option value="100000">$100.000 per year</option>
                    <option value="110000">$110.000 per year</option>
                    <option value="120000">$120.000 per year</option>
                    <option value="130000">$130.000 per year</option>
                    <option value="140000">$140.000 per year</option>
                    <option value="150000">$150.000 per year</option>
                    <!-- Add more options as needed -->
                </select> --}}

                <input 
                    name="location"
                    placeholder="🌏 Location" 
                    type="search" 
                    class="filterInput"
                    value="{{ request('location') }}"
                >
                <input 
                    name="job_position"
                    placeholder="💼 Position" 
                    type="search" 
                    class="filterInput"
                    value="{{ request('job_position') }}"
                >
                
            </div>
            <div class="horizontal-scroll-menu">
                <ul class="menu-list">
                    <li class="menu-item" onclick="selectMenuItem('AI')">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-cpu" viewBox="0 0 16 16">
                            <path d="M5 0a.5.5 0 0 1 .5.5V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2h1V.5a.5.5 0 0 1 1 0V2A2.5 2.5 0 0 1 14 4.5h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14v1h1.5a.5.5 0 0 1 0 1H14a2.5 2.5 0 0 1-2.5 2.5v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14h-1v1.5a.5.5 0 0 1-1 0V14A2.5 2.5 0 0 1 2 11.5H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2v-1H.5a.5.5 0 0 1 0-1H2A2.5 2.5 0 0 1 4.5 2V.5A.5.5 0 0 1 5 0zm-.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 11.5 3h-7zM5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3zM6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                          </svg> --}}
                          🤖 AI/ML</li>

                    <li class="menu-item" onclick="selectMenuItem('Cybersecurity')">
                        {{-- <svg width="16" height="18" class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1" d="M7 3 6 2V1m5 2 1-1V1M9 7v11M9 7a5 5 0 0 1 5 5M9 7a5 5 0 0 0-5 5m5-5a4.959 4.959 0 0 1 2.973 1H12V6a3 3 0 0 0-6 0v2h.027A4.959 4.959 0 0 1 9 7Zm-5 5H1m3 0v2a5 5 0 0 0 10 0v-2m3 0h-3m-9.975 4H2a1 1 0 0 0-1 1v2m13-3h2.025a1 1 0 0 1 1 1v2M13 9h2.025a1 1 0 0 0 1-1V6m-11 3H3a1 1 0 0 1-1-1V6"/>
                          </svg> --}}
                          🔒 Cybersecurity</li>

                    <li class="menu-item" onclick="selectMenuItem('Education')"> 
                        {{-- <svg width="16" height="18" class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15V9m4 6V9m4 6V9m4 6V9M2 16h16M1 19h18M2 7v1h16V7l-8-6-8 6Z"/>
                          </svg> --}}
                          🏫 Education</li>
                          
                    <li class="menu-item" onclick="selectMenuItem('Marketing')">🚀 Marketing</li>

                    <li class="menu-item" onclick="selectMenuItem('Engineer')">😎 Engineer</li>
                    
                    <li class="menu-item" onclick="selectMenuItem('Tutor')"> 👨‍🎓 Tutor</li>

                    <li class="menu-item" onclick="selectMenuItem('Finance')">📊Finance</li>

                    <li class="menu-item" onclick="selectMenuItem('Backend')">🗄️ Backend</li>

                    <li class="menu-item" onclick="selectMenuItem('Teacher')">🎓Teacher</li>

                    <li class="menu-item" onclick="selectMenuItem('Sales')">
                        🤑 Sales</li>

                    <li class="menu-item" onclick="selectMenuItem('Media')">🤩 Media</li>

                    <li class="menu-item" onclick="selectMenuItem('Writer')">
                        {{-- <svg width="16" height="18" class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                            <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                          </svg> --}}
                          📝 Writer</li>
                    <li class="menu-item" onclick="selectMenuItem('Blockchain')">🔗 Blockchain</li>
                    <li class="menu-item" onclick="selectMenuItem('SEO')">SEO</li>


                    <li class="menu-item" onclick="selectMenuItem('LAW')">
                        {{-- <svg width="16" height="18" class="text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.1" d="M2 19h16m-8 0V5m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4 8l-2.493 5.649A1 1 0 0 0 2.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L4 8Zm0 0V6m12 2-2.493 5.649A1 1 0 0 0 14.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L16 8Zm0 0V6m-4-2.8c3.073.661 3.467 2.8 6 2.8M2 6c3.359 0 3.192-2.115 6.012-2.793"/>
                          </svg> --}}
                          ⚖️Law</li>
                          <li class="menu-item" onclick="selectMenuItem('PHP')">🐘 PHP</li>

                          
              
                    <!-- Add more list items for additional industries -->
                </ul>
            </div>
            <button type="search_hidden_submit"></button>
            </div>
        </form>
        
    </div>

   
    <script>
        function selectMenuItem(text) {
            // Get the search input element by its id
            var searchInput = document.getElementById('searchInput');
            
            // Set the value of the search input to the selected menu item's text
            searchInput.value = text;
            
            // Trigger the form submission (assuming you have a form with the id 'searchForm')
            document.getElementById('searchForm').submit();
        }
        </script>
        
</body>
</html>

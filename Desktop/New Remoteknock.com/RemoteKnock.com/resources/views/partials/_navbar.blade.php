    
    <header class="header">
        
        <nav class="navbar">
            {{-- <a href="/" class="nav-logo">remoteknock</a> --}}
            {{-- 🌍 --}}

            {{-- <a href="/" class="nav-logo">
                
               <img src="/images/logo_test.png" alt="Logo" class="logo-image">remoteknock
            </a> --}}
            
            <a href="/" class="nav-logo">
                <div class="logo-container">
                    <img src="/images/logo-test4.png" alt="Logo" class="logo-image">
                    <span class="logo-text">RemoteKnock</span>
                </div>
            </a>
            
            
            
            
            <ul class="nav-menu">
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Blog</a>
                </li>--}}
            {{-- <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>   --}}
    
    
                @auth
                <li class="nav-item ">
                    <a href="/listings/manage" class="nav-link">
                        <i class="fa-solid fa-wrench"></i>
                        Manage Listings
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="/cv/builder" class="nav-link">
                        <i class="fa-solid fa-drivers-license"></i>
                        Build CV
                    </a>
                </li>

                <li class="nav-item ml-6">
                    {{-- <form class="inline" method="POST" action="/logout" onsubmit="return confirmLogout()">
                        @csrf
                        <button type="submit" 
                        class="nav-link">
                            <i class="fa-solid fa-door-closed"></i>
                             Logout
                        </button>
                    </form> --}}


                    <form class="inline" method="POST" action="/logout" onsubmit="return confirmLogout()">
                        @csrf
                        <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">
                            <i class="fa-solid fa-door-closed"></i>
                            Logout
                        </button>
                    </form>
                    
                </li>
            @else
                <li class="nav-item  ml-6">
                    <a href="/register" class="nav-link">
                        {{-- <i class="fa-solid fa-user-plus"></i> --}}
                         Register
                    </a>
                </li>
                <li class="nav-item ml-6">
                    <a href="/login" class="nav-link">
                        {{-- <i class="fa-solid fa-arrow-right-to-bracket"></i> --}}
                         Login
                    </a>
                </li>
            @endauth
            
    
                {{-- <li class="nav-item ml-6">
                    <a href="{{ route('about') }}">About</a>
                </li> --}}

                <li class="nav-item ml-6">
                    <a href="/listings/create" class="post_job_btn">Post a Job</a>
               </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    
    
    <script>
    
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");
    
    hamburger.addEventListener("click", mobileMenu);
    
    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
    
    const navLink = document.querySelectorAll(".nav-link");
    
    navLink.forEach(n => n.addEventListener("click", closeMenu));
    
    function closeMenu() {
        hamburger.classList.remove("active");
        navMenu.classList.remove("active");
    }
    
    
    </script>
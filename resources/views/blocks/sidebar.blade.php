<div class="d-flex flex-column flex-shrink-0 p-3 bg-light sticky-sm-top" style="width: 280px; height: max-content;">
    
    
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link {{ Route::current()->getName() == 'home.index' ? "active" : "link-dark" }}" >
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home"></use>
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('posts.index') }}" class="nav-link {{ Route::current()->getName() == 'posts.index' ? "active" : "link-dark" }}">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Posts
            </a>
        </li>
        <li>
            <a href="{{ route('profiles.index') }}" class="nav-link {{ Route::current()->getName() == 'profiles.index' ? "active" : "link-dark" }}">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Peoples
            </a>
        </li>
        <li>
            <a href="{{ route('about.index') }}" class="nav-link {{ Route::current()->getName() == 'about.index' ? "active" : "link-dark" }}">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table"></use>
                </svg>
                About
            </a>
        </li>
        <hr>
        <li>
            <div class="dropdown">
                <a href="#"
                    class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        
                    <img src="{{ isset($acc_profile->logo) ? asset('storage/' . $acc_profile->logo) : asset('storage/images/resources/default_avatar.jpg') }}"
                        alt="" width="32" height="32" class="rounded-circle me-2">
        
                    <strong>{{ isset($acc_profile) ? $acc_profile->first_name : $acc_user->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item"
                            href=" {{ route('profiles.show', $acc_user->id) }} ">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    
</div>
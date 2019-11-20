@if (Sentinel::check())
<li class="nav-item active"><a href="{{ route('visitor.index') }}" class="nav-link">Home</a></li>
<li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
<li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
<li class="nav-item"><a href="{{ route('list-job') }}" class="nav-link">List</a></li>
<li class="nav-item"><a href="{{ route('visitor.profile') }}" class="nav-link">Profile</a></li>
<li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
<li class="nav-item ">
    <a href="{{ route('logout') }}" class="nav-link"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
    
@else
<li class="nav-item"><a href="{{ route('signin') }}" class="nav-link">Login</a></li>
<li class="nav-item"><a href="{{ route('list-job') }}" class="nav-link">Listing</a></li>
@endif
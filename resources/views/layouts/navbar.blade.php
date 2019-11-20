@if (Sentinel::check())
@if (\App\User::whereId(Sentinel::getUser()->id)->first()->biodata->cv == null)
<li class="nav-item"><a style="color:black;" href="{{ route('visitor.profile') }}" class="nav-link"><strong>Isi CV Biar bisa apply!</strong></a></li>
@endif
<li class="nav-item active"><a href="{{ route('visitor.index') }}" class="nav-link">Home</a></li>
{{-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> --}}
{{-- <a class="nav-item"><a href="services.html" class="nav-link">Services</a></a> --}}
<li class="nav-item"><a href="{{ route('list-job') }}" class="nav-link">List</a></li>
<li class="nav-item"><a href="{{ route('visitor.profile') }}" class="nav-link">Profile</a></li>
@if (\App\User::where('id',Sentinel::getUser()->id)->whereHas('applies')->first())
<li class="nav-item"><a href="contact.html" class="nav-link">History Apply</a></li>
@endif
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
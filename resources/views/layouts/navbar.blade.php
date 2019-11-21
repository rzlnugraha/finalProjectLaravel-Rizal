@if (Sentinel::check())
    @if (\App\User::whereId(Sentinel::getUser()->id)->first()->biodata->cv == null)
    <li class="nav-item"><a style="color:black;" href="{{ route('visitor.profile') }}" class="nav-link"><strong>Isi CV Biar bisa apply!</strong></a></li>
    @endif
    <li class="nav-item active"><a href="{{ route('visitor.index') }}" class="nav-link">Home</a></li>
    <li class="nav-item"><a href="{{ route('list-job') }}" class="nav-link">List Pekerjaan</a></li>
    <li class="nav-item"><a href="{{ route('visitor.profile') }}" class="nav-link">Profile</a></li>
    @if (\App\User::where('id',Sentinel::getUser()->id)->whereHas('applies')->first())
    <li class="nav-item"><a href="{{ route('history') }}" class="nav-link">History Apply</a></li>
    @endif
<li class="nav-item ">
    <a href="{{ route('logout.sentinel') }}" class="nav-link"
        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout.sentinel') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
    
@else
<li class="nav-item"><a href="{{ route('signin') }}" class="nav-link">Login</a></li>
<li class="nav-item"><a href="{{ route('signup') }}" class="nav-link">Register</a></li>
<li class="nav-item"><a href="{{ route('list-job') }}" class="nav-link">Listing</a></li>
@endif
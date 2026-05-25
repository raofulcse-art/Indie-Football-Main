{{--
    Component: Logout Button
    Usage: @include('components.btn-logout')
--}}

{{--
<a href="{{ route('logout') }}" class="btn-login" role="button">
    Log Out
</a>

--}}
<a href="{{ route('logout') }}"
   class="btn-login"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Log Out
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
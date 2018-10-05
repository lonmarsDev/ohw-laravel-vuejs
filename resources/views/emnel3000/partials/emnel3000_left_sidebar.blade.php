
<div class="leftmenumain">
    <ul>
        <li class="menu menu1 {{ $ActiveMenu == 'home' ? 'active' : '' }}">
            <span></span>
            <a href="{{ route('emnel3000.lab.index') }}">Overview</a>
        </li>
        <li class="menu menu2 {{ $ActiveMenu == 'new' ? 'active' : '' }}">
            <span></span>
            <a href="{{ route('emnel3000.lab.new') }}">New Lab</a>
        </li>
        <li class="menu menu3">
            <span></span>
            <a href="{{ url('/') }}">Upload Lab</a>
        </li>

        <li class="menu menu4">
            <span></span>
            <a href="{{ url('/') }}">Marketplace</a>
        </li>

        <li class="menu menu2">
            <span>

            </span>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Sign out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</div>
@if(isset($section))
<div class="leftmenumain twomenu">
    <ul>
        <li class="menu sbmenu1 {{ ($ActiveMenu == 'content_manager') ? 'active':'' }}"><span></span><a href="{{ url('contentmanager') }}">My Files</a></li>
        <li class="menu sbmenu2"><span></span><a href="#">Shops</a></li>
        <li class="menu sbmenu3"><span></span><a href="#">Giphy</a></li>
        <li class="menu sbmenu4 {{ ($ActiveMenu == 'branding_center') ? 'active':'' }}"><span></span><a href="{{ url('brandingcenter') }}">Branding Center</a></li>
        <li class="menu addnote"><span class="add"></span><a href="#">add note</a></li>
    </ul>
</div>
@else
<div class="leftmenumain">
    <ul>
        <li class="menu menu1 {{ ($ActiveMenu == 'home') ? 'active':'' }}"><span></span><a href="{{ url('/') }}">Overview</a></li>
        <li class="menu menu2 {{ ($ActiveMenu == 'users' || $ActiveMenu == 'details' || $ActiveMenu == 'domain' || $ActiveMenu == 'security' || $ActiveMenu == 'contact') ? 'active':'' }}">
            <span></span>
            <a href="#leftsubmenu1" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Settings<i class="fa fa-angle-right lmenuarrow"></i></a>

            <div class="leftsubmenu collapse {{ ($ActiveMenu == 'users' || $ActiveMenu == 'details' || $ActiveMenu == 'domain' || $ActiveMenu == 'security' || $ActiveMenu == 'contact') ? 'in':'' }}" id="leftsubmenu1">
                <ul>
                    <li class="{{ ($ActiveMenu == 'details') ? 'active':'' }}"><a href="{{ route('settingsDetails') }}">DETAILS</a></li>
                    <li class="{{ ($ActiveMenu == 'users') ? 'active':'' }}">
                        <a href="{{ url('profile') }}">users</a>
                    </li>
                    <li class="{{ ($ActiveMenu == 'security') ? 'active':'' }}"><a href="{{ url('security') }}">SECURITY</a></li>
                    <li class="{{ ($ActiveMenu == 'contact') ? 'active':'' }}"><a href="{{ route('settingsContact') }}">contact information</a></li>
                    <li class="{{ ($ActiveMenu == 'domain') ? 'active':'' }}"><a href="{{ url('settings/verified-domain') }}">verified domain</a></li>
                    <li class="{{ ($ActiveMenu == 'changePassword') ? 'active':'' }}"><a href="{{ url('change-password') }}">change password</a></li>
                </ul>
            </div>

        </li>

        <li class="menu menu3">
            <span></span>
            <a href="#leftsubmenu2" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Billings<i class="fa fa-angle-right lmenuarrow"></i></a>

            <div class="leftsubmenu collapse" id="leftsubmenu2">
                <ul>
                    <li><a href="#">Sub Menu1</a></li>
                    <li><a href="#">Sub Menu2</a></li>
                    <li><a href="#">Sub Menu3</a></li>
                </ul>
            </div>

        </li>

        <li class="menu menu4 {{ ($ActiveMenu == 'partner' || $ActiveMenu == 'api' || $ActiveMenu == 'api_integration') ? 'active' :'' }}">
            <span></span>
            <a href="#leftsubmenu3" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">Extra<i class="fa fa-angle-right lmenuarrow"></i></a>

            <div class="leftsubmenu collapse {{ ($ActiveMenu == 'partner' || $ActiveMenu == 'api' || $ActiveMenu == 'api_integration') ? 'in' :'' }}" id="leftsubmenu3">
                <ul>
                    <li class="{{ ($ActiveMenu == 'api') ? 'active' :'' }}"><a href="{{ url('extra/api') }}">API</a></li>
                    <li class="{{ ($ActiveMenu == 'partner') ? 'active' :'' }}"><a href="{{ url('partners') }}">partners</a></li>
                    <li class="{{ ($ActiveMenu == 'api_integration') ? 'active' :'' }}"><a href="{{ url('integration') }}">integrations</a></li>
                </ul>
            </div>

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
@endif
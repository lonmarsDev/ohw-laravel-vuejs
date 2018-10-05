<ul class="list-inline">
     <li><a href="{{ url('Layout') }}" class="btn btn1 {{ ($ActiveMenu == 'layout') ? 'active':'' }}">LAYOUTS</a></li>
     <li><a href="{{ url('Themes') }}" class="btn btn2 {{ ($ActiveMenu == 'themes') ? 'active':'' }}">type</a></li>
     <li><a href="{{ url('TemplateManager') }}" class="btn btn1 {{ ($ActiveMenu == 'template_manager') ? 'active':'' }}">template manager</a></li>
     <li><a href="{{ url('Launchlab') }}" class="btn btn2 {{ ($ActiveMenu == 'launchlab') ? 'active':'' }}">launchlab</a></li>
     <li><a href="{{ url('Custom') }}" class="btn btn1 {{ ($ActiveMenu == 'custom_html') ? 'active':'' }}">custom htmL</a></li>
</ul>
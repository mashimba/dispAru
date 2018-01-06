<div class="dropdown logout">
    @if(!Auth::guest())
        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            {{Auth::user()->name}}
            <span class="caret"></span>
         </button>
         <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    @endif
</div>
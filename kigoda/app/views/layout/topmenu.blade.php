
  <div id="divMenuRight" class="">
                    <div class="navbar">
                        <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
    NAVIGATION <span class="icon-chevron-down icon-white"></span>
                        </button>
                        <div class="nav-collapse collapse">
                            <ul class="nav nav-pills ddmenu">
                                <li class="dropdown"><a href="{{ url("/") }}">Home</a></li>
                                <li class="dropdown" id="about-menu">
                                    <a href="{{ url("about") }}" class="dropdown-toggle">About Us<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url("about") }}">History</a></li>
                                        <li><a href="#">Team</a></li>
                                        <li><a href="{{ url("slogans") }}">Slogans</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ url("activities") }}">Activities</a></li>
                                <li class="dropdown"><a href="{{ url("publications") }}">Publications</a></li>
                                <li class="dropdown"><a href="{{ url("album") }}">Album</a></li>
                                <li class="dropdown"><a href="{{ url("contacts") }}">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

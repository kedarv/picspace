<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ HTML::linkAction('home', 'PicSpace', array(), array('class' => 'navbar-brand')) }}
        </div>

        <div class="collapse navbar-collapse" id="nav-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{action('HomeController@raphael')}}">Raphael</a></li>
                <li><a href="{{action('HomeController@draw1')}}">Draw1</a></li>
                 <li><a href="{{action('HomeController@draw2')}}">Draw2</a></li>
            </ul>
            </ul>
            <ul class="nav navbar-nav navbar-right">
             @if (Auth::guest())
                <li><a href="{{action('UsersController@create')}}">Register</a></li>
                <li><a href="{{action('UsersController@login')}}">Login</a></li>
             @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
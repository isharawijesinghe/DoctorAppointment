<!-- ====================================================
header section -->
<header class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-5 header-logo">
                <br>
                <a href=""><img src="img/logo.png" alt="" class="img-responsive logo"></a>
            </div>

            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <div class="container-fluid nav-bar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav navbar-right">
                                <li><a class="menu active" href="" >Home</a></li>
                                <li><a class="menu" href={{ route('searchresult') }}>APPOINTMENT</a></li>
                                <li><a class="menu" href="">about us</a></li>
                                <li><a class="menu" href="">our services </a></li>
                                <li><a class="menu" href="" id="login"> login</a></li>
                            </ul>
                        </div><!-- /navbar-collapse -->
                    </div><!-- / .container-fluid -->
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="row"><div class="module form-module " id="loginmodel">
                <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                    <div class="tooltip">Click Me</div>
                </div>
                <div class="form">
                    <h2>Login to your account</h2>
                    <form id="login-form" action="{{ route('signin') }}" method="post" role="form" style="display: block;" >
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Username" value=""/>
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"/>
                        <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <div class="form">
                    <h2>Create an account</h2>
                    <form>
                        <input type="text" placeholder="Username"/>
                        <input type="password" placeholder="Password"/>
                        <input type="email" placeholder="Email Address"/>
                        <input type="tel" placeholder="Phone Number"/>
                        <button>Register</button>
                    </form>
                </div>
                <div class="cta"><a href="http://andytran.me">Forgot your password?</a></div>
            </div>
        </div><!-- /.modal -->
    </div>

</header> <!-- end of header area -->



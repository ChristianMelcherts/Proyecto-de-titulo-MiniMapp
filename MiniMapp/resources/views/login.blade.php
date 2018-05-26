<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Login Page - Ace Admin</title>

        <meta name="description" content="User login page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->

        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

        <!-- text fonts -->
        <link rel="stylesheet" href="{{ asset('assets/css/ace-fonts.css') }}">

        <!-- ace styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/ace.min.css') }}">

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="{% static 'css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('assets/css/ace-rtl.min.css') }}">

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="{% static 'css/ace-ie.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="{{ asset('assets/css/ace.onpage-help.css') }}">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="../assets/js/html5shiv.js"></script>
        <script src="../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-layout light-login">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                	<!--
                                    ####### Imagen LOGIN ######
                                    <img src="" alt="">
                                	-->
                                    <span class="blue">MiniMapp</span>
                                    <!--<span class="black" id="id-text2">PENDIENTE</span>-->
                                </h1>
                                <h4 class="blue" id="id-company-text">UVM</h4>
                            </div>

                            <div class="space-6"></div>
                            <?php
                                $useragent = $_SERVER['HTTP_USER_AGENT'];

                                if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
                                    $browser_version=$matched[1];
                                    $browser = 'ie';
                                } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
                                    $browser_version=$matched[1];
                                    $browser = 'opera';
                                } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
                                    $browser_version=$matched[1];
                                    $browser = 'firefox';
                                } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
                                    $browser_version=$matched[1];
                                    $browser = 'chrome';
                                } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
                                    $browser_version=$matched[1];
                                    $browser = 'safari';
                                } else {
                                // browser not recognized!
                                    $browser_version = 0;
                                    $browser= 'ie';
                                }

                                //echo $browser;
                                
                            ?>
                            <div class="position-relative">
                                @if($browser != 'ie')
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="ace-icon fa fa-coffee green"></i>
                                                Favor ingrese su información
                                            </h4>

                                            <div class="space-6"></div>
                                            <!-- Login Form -->
                                            <!--
                                            {% if form.errors %}
                                                <p>Error al iniciar sesión. Ingrese datos nuevamente</p>
                                            {% endif %}
											-->
											@if(Session::has('mensaje_error'))
									            {!! Session::get('mensaje_error') !!}
									        @endif
											{!! Form::open(array('url'=> '/login')) !!}
												<fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                        	{!! Form::text('username', '' , array('class'=>'form-control', 'placeholder'=>'Usuario')) !!}
                                                            <i class="ace-icon fa fa-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                        	{!! Form::password('password', array('class'=>'form-control', 'placeholder'=>'Contraseña'))!!}
                                                            <i class="ace-icon fa fa-lock"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"></div>

                                                    <div class="clearfix">
                                                       
                                                        <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                                            <i class="ace-icon fa fa-key"></i>
                                                            <span class="bigger-110">Login</span>
                                                        </button>
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
											{!! Form::close() !!}
                                           
                                        </div><!-- /.widget-main -->

                                        <div class="toolbar clearfix">
                                            
                                            <div>
                                              
                                            </div>
                                           
                                        </div>
                                    </div><!-- /.widget-body -->
                                </div><!-- /.login-box -->
                                @else
                                    <div style="text-align: justify;text-justify: inter-word;">
                                    <h2><span class="blue">Para utilizar esta plataforma, favor ingresar con uno de estos navegadores:</span></h2>
                                    <br />
                                    <h3><link rel="image" href="{{ asset('assets/assets/chrome.png') }}"> Google Chrome</h3>
                                    ace.onpage-help.css
                                    <h3><link rel="image" href="{{ asset('assets/assets/firefox.png') }}"> Mozilla Firefox</h3>
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.main-content -->
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script type="text/javascript">
            window.jQuery || document.write("<script src='../assets/js/jquery.min.js'>"+"<"+"/script>");
        </script>

        
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
             $(document).on('click', '.toolbar a[data-target]', function(e) {
                e.preventDefault();
                var target = $(this).data('target');
                $('.widget-box.visible').removeClass('visible');//hide others
                $(target).addClass('visible');//show target
             });
            });
            
            
            
            //you don't need this, just used for changing background
            jQuery(function($) {
             $('#btn-login-dark').on('click', function(e) {
                $('body').attr('class', 'login-layout');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
             });
             $('#btn-login-light').on('click', function(e) {
                $('body').attr('class', 'login-layout light-login');
                $('#id-text2').attr('class', 'grey');
                $('#id-company-text').attr('class', 'blue');
                
                e.preventDefault();
             });
             $('#btn-login-blur').on('click', function(e) {
                $('body').attr('class', 'login-layout blur-login');
                $('#id-text2').attr('class', 'white');
                $('#id-company-text').attr('class', 'light-blue');
                
                e.preventDefault();
             });
             
            });
        </script>
    </body>
</html>

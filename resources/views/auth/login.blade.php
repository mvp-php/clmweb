@include('auth/include/header')
    <!-- contact -->
	<style>
		.val_label{
			float:left
		}
	</style>
	<meta name="google-site-verification" content="Mq0AkiEy5LRpgJx76KQ79rFp" />
	
	    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
        <meta name="google-signin-client_id" content="797294118963-evlo3b1obmtfn2kma5ift4cqagoj1t04.apps.googleusercontent.com">
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142678165-1"></script>
    <section class="mail pt-lg-5 pt-4" style="min-height:800px">
        <div class="container pt-lg-5">
            <div class="row row_cstm">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-md-12 mt-lg-0 mt-4  contact-info p-0">
                    <div class="box box_cstm clearfix">
                        <center>
                            <div class="box_header">
                                <h2 class="hdr PlayfairDisplaySC-Bold">
                                    Sign In
                                </h2>
                                <hr class="cstm_hr">
                            </div>
                            <div class="box_i">
                    <form  method="POST" action="{{ route('login') }}" onsubmit="return login_validate();">
                        {{ csrf_field() }}
                        <div class="col-xl-12">
                                <input id="email" type="text" class="form-group" placeholder="Email/ Phone Number" name="email" value="{{ old('email') }}" autofocus>
								<label class="val_label" id="loginEmialError" >{{ $errors->first('email') }}</label>
                               <!--  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif-->
								
								<input id="password" type="password"  class="form-group mt-2" placeholder="Password"  name="password"  >
								<label class="val_label" id="loginPassError">{{ $errors->first('password') }}</label>
                               <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif-->
                        </div>
						<div class="col-xl-12">
                                        <a href="<?php echo URL::to('/')?>/forgot-password" class="color-97 Muli-Bold">
                                            Forgot password?
                                        </a>
                        </div>
						<div class="col-xl-12 mt-5">
                                       <div class="login_btn">
                                        <button type="submit" class="btn-red-cstm Muli-Bold">LOG in</button>
                                        </div>
                        </div>
						<div class="col-xl-12 mt-4">
							<a href="<?php echo URL::to('/register')?>" class="color-black Muli-Bold">
								Don´t have account?
							</a>
						</div>
						<div class="col-xl-12 mt-5">
						
                                        <a href="javascript:void(0);" onclick="renderButton();"  class="btn btn-gplus g_plus Helvetica-Neue-Bold">
                                            <i class="fa fa-google-plus pr-1 f-20"></i>
                                            <span>Sign in with Google+</span>
                                        </a>
                                    </div>
                                    <div class="col-xl-12 mt-3">							
                                       <?php /* ?> <a href="{{ url('auth/facebook') }}" class="btn btn-gplus fb_plus">
                                            <i class="fa fa-facebook pr-1 f-20"></i>
                                            <span>Sign in with Facebook</span>
                                        </a><?php */ ?>
										 <div id="gSignIn" style="display: none;"></div>
                                            <div id="userData"></div>
                                            <div class="userContent" style="display: none;"></div>
										<a href="javascript:void(0);" onclick="fbLogin()" class="btn btn-gplus fb_plus">
                                            <i class="fa fa-facebook pr-1 f-20"></i>
                                            <span>Sign in with Facebook</span>
                                        </a>
                                    </div>
                        <?php /*<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>*/?>
                    </form>
                </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
    <!-- //copyright -->
    <!-- move top 
<div class="move-top text-right">
	<a href="#home" class="move-top"> 
		<span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
	</a>
</div>
<!-- move top -->
</body>

<script>
    
$('#progressbar').delegate('li', 'click', function() {
  $(this).addClass('active').siblings().removeClass('active');
});    
</script>
 
		<script>
            // Render Google Sign-in button
            function renderButton() {
				$(".abcRioButtonContentWrapper").click();
                gapi.signin2.render('gSignIn', {
                    'scope': 'profile email',
                    'width': 235,
                    'height': 45,
                    'longtitle': true,
                    'theme': 'dark',
                    'onsuccess': onSuccess,
                    'onfailure': onFailure
                });
            }
            // Sign-in failure callback
            function onFailure(error) {
                alert("User cancel the login.");
                //alert("Oops something went to wrong. Please try again.");
                console.log(error);
            }

            // Sign out the user

            function signOut() {
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function() {
                    document.getElementsByClassName("userContent")[0].innerHTML = '';
                    document.getElementsByClassName("userContent")[0].style.display = "none";
                    document.getElementById("gSignIn").style.display = "none";
                });

                auth2.disconnect();
                window.location = "<?php echo URL::to('/home')?>";
            }
            // Save user data to the database
            function saveUserData(userData) {
                $.post('<?php echo URL::to("/")?>/GoogleLogin', {
                    oauth_provider: 'google',
                    userData: JSON.stringify(userData),
                    _token: '<?php echo csrf_token(); ?>'
                });
            }
            // Sign-in success callback
            function onSuccess(googleUser) {
                // Get the google profile data
                var profile = googleUser.getBasicProfile();
                // Get the google+ profile data
					$.ajax({
						type: 'POST',
						data: {
							oauth_provider: 'google',
							userData: JSON.stringify(profile),
							_token: '<?php echo csrf_token(); ?>'
                        },
						url: "<?php echo URL::to('/')?>/GoogleLogin",
						success: function(data) {
							if (data == 1) {
								signOut();
							} else {}
                        }
                    });
                    
                
            }
        </script>


	 <script>
            window.fbAsyncInit = function() {
                // FB JavaScript SDK configuration and setup
                FB.init({
                    //appId: '971611059853296', // FB App ID //Ishanivh@virtualheight.com
                    appId: '1218394845214915',
                    cookie: true, // enable cookies to allow the server to access the session
                    xfbml: true, // parse social plugins on this page
                    version: 'v2.8' // use graph api version 2.8
                });

                // Check whether the user already logged in
                FB.getLoginStatus(function(response) {
                    if (response.status === 'connected') {
                        //display user data
                    }
                });
            };

            // Load the JavaScript SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));


            // Facebook login with JavaScript SDK
            function fbLogin() {
                FB.login(function(response) {
                    if (response.authResponse) {
                        // Get and display the user profile data
                        getFbUserData();
                    } else {
                        document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
                    }
                }, {
                    scope: 'email'
                });
            }

            // Logout from facebook
            function fbLogout() {
                FB.logout(function() {
                    document.getElementById('userData').innerHTML = '';
                    window.location = "<?php echo URL::to('/home')?>";
                    //window.location = "http://hostingchimps.online/eventrr/";
                });
            }
            // Save user data to the database
            function saveUserData(userData) {
                $.post('<?php echo URL::to("/")?>/facebookLogin', {
                    oauth_provider: 'facebook',
                    userData: JSON.stringify(userData),
                    _token: '<?php echo csrf_token(); ?>'
                }, function(data) {
                    return true;
                });
            }

            function getFbUserData() {
                FB.api('/me', {
                        locale: 'en_US',
                        fields: 'id,first_name,last_name,email,link,gender,locale,picture'
                    },
                    function(response) {
                        $.ajax({
                            type: 'POST',
                            data: {
                                oauth_provider: 'facebook',
                                userData: JSON.stringify(response),
                                _token: '<?php echo csrf_token(); ?>'
                            },
                            url: "<?php echo URL::to('/')?>/facebookLogin",
                            success: function(data) {
                                if (data == 1) {
                                    $('#cover-spin').show();
                                    fbLogout();
                                } else {}
                            }
                        });
                    });
            }
        </script>
		
<script>
    function login_validate() {
        var email = $('#email').val();
        var password = $('#password').val();
        var cnt = 0;

        $('#loginEmialError').html("");
        $('#loginPassError').html("");
        if (email == "") {
			$('#loginEmialError').html("Email or Phone is required.");
            cnt = 1;            
        }
        if (email)
        {

            $.ajax({
                async: false,
                global: false,
                url: "<?php echo URL::to('/'); ?>/check_user_login_email",
                type: "POST",
                data: {email: email, _token: "<?php echo csrf_token(); ?>"},
                success: function (response) {

                    if (response == 1) {

                    } else {
						if(isNaN(email)){
							$('#loginEmialError').html("Email id is not exits .");
						}else{
							$('#loginEmialError').html("Mobile number is not exits.");
						}
                        cnt = 1;
                    }
                }
            });
        }

        if (password == "") {
            $("#loginPassError").html("Password is required.");
            cnt = 1;
        }
        if (password)
        {

            $.ajax({
                async: false,
                global: false,
                url: "<?php echo URL::to('/'); ?>/check_user_login_password",
                type: "POST",
                data: {password: password, email: email, _token: "<?php echo csrf_token(); ?>"},
                success: function (response) {

                    if (response == 1) {

                    } else {
                        $('#loginPassError').html("Invalid email address or password .");
                        cnt = 1;
                    }
                }
            });
        }
        if (cnt == 1) {
            return false;
        } else {
            return true;
        }

    }
</script>
		
</html>

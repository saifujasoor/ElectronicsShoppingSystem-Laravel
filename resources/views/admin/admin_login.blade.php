<style>
  
#strong{
  font-weight: 600;
}

#close{
  border: none;
  background: #F8D7DA;
  font-size: 18px;
}

#strong1{
  font-weight: 600;
}

#close1{
  border: none;
  background: #DFF0D8;
  font-size: 18px;
}

.alert h4 {
  margin-top: 0;
  color: inherit;
}

.alert .alert-link {
  font-weight: bold;
}

.alert > p,
.alert > ul {
  margin-bottom: 0;
}

.alert > p + p {
  margin-top: 5px;
}

.alert-dismissable,
.alert-dismissible {
  padding-right: 35px;
}

.alert-dismissable .close,
.alert-dismissible .close {
  position: relative;
  top: -2px;
  right: -21px;
  color: inherit;
}

.alert-success {
  background-color: #dff0d8;
  border-color: #d6e9c6;
  color: #3c763d;
}

.alert-success hr {
  border-top-color: #c9e2b3;
}

.alert-success .alert-link {
  color: #2b542c;
}

.alert-info {
  background-color: #d9edf7;
  border-color: #bce8f1;
  color: #31708f;
}

.alert-info hr {
  border-top-color: #a6e1ec;
}

.alert-info .alert-link {
  color: #245269;
}

.alert-warning {
  background-color: #fcf8e3;
  border-color: #faebcc;
  color: #8a6d3b;
}

.alert-warning hr {
  border-top-color: #f7e1b5;
}

.alert-warning .alert-link {
  color: #66512c;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #ebccd1;
  color: #a94442;
}

.alert-danger hr {
  border-top-color: #e4b9c0;
}

.alert-danger .alert-link {
  color: #843534;
}
</style>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
		<meta charset="utf-8">
		<link href="{{ asset('css/backend_css/stylelogin.css') }}" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body>
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Admin Login</h1>
					<div class="head">
						<img src="{{ asset('images/backend_images/user.png') }}" alt=""/>
					</div>
				<form id="loginform" method="post" action="{{url('admin')}}">{{  csrf_field() }}
						<input type="text" class="text" value="EMAIL ADDRESS" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'EMAIL ADDRESS';}" >
						<input type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" onclick="myFunction()" value="LOGIN" >
                    </div>	
                    @if (Session::has('flash_message_error')) 
                    <div class="alert alert-error alert-block" style="background-color: #F8D7DA">
                        <button type="button" class="close" id="close" data-dismiss="alert">×</button>	
                            <strong id="strong">{!! session('flash_message_error') !!}  </strong>
                    </div>         
                    @endif  
                    @if (Session::has('flash_message_success')) 
                        <div class="alert alert-success alert-block" style="background-color: #DFF0D8">
                            <button type="button" class="close" id="close1" data-dismiss="alert">×</button>	
                                <strong id="strong1">{!! session('flash_message_success') !!}  </strong>
                        </div>         
                    @endif 
				</form>
			</div>
			<!--//End-login-form-->
        </div>
    <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script> 
    <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script> 
</body>
</html>
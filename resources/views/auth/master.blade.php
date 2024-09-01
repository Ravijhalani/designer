<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}} - @stack('title')</title>
    <link rel="icon" href="{{asset('assets/images/sm-logo.svg')}}" type="image/gif" sizes="20x20">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
<style>
        /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/
.login,
.image {
  min-height: 100vh;
}

.bg-image {
  background-image: url("{{asset('assets/images/bg/hero3-img-with-vec.png')}}");
  background-size: cover;
  background-position: center center;
}

.form-wrapper form {
    border-radius: 0px;
    border: 0;
    padding: 0px 31px;
}

.explore-btn a span::after{
    content:""
}
.explore-btn a span{
    margin-left: 0;
    margin-right: 0;
}

.btn-linkedin {
	  background: #0E76A8;
	  border-radius: 0;
	  color: #fff;
	  border-width: 1px;
	  border-style: solid;
	  border-color: #084461;
	}
	.btn-linkedin:link, .btn-linkedin:visited {
	  color: #fff;
	}
	.btn-linkedin:active, .btn-linkedin:hover {
	  background: #084461;
	  color: #fff;
	}
    .error {
        color: red!important;
    }
    </style>

    @stack('css')
</head>

<body>
    
@yield('content')   
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stack('js')
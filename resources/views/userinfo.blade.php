<!DOCTYPE html>
<html lang="en">
<head>
<title>WEB DEMO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="../css/style1.css" type="text/css" media="all" />
<!--// css -->
<!-- font-awesome icons -->
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- font -->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
<!-- //font -->
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
<!-- light-box -->
<link rel="stylesheet" href="../css/lightbox.css">
<!-- //light-box -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){     
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>

</head>
<body>
    <!-- banner -->
    <div class="banner">
        <div class="banner-dot">
        <!-- header-top -->
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <h1><a href="{{URL::route('rp')}}">KIM CHI<span>Demo</span></a></h1>
                </div>
                <div class="header-middle">
                    <ul>
                        <li>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <i id="name_info"></i>
                        </li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="search">
                        <form action="#" method="post">
                            <input type="search" name="Search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- //header-top -->
        <!-- banner-info -->
        <div class="banner-info">
            <div class="container">
                <div class="form-info">
                    <div class="form-header">
                        <h3>User Info</h3>
                        <ul class="u-info">
                            <li>
                                <ul class="info-text">
                                    <li class="info-text-left"><b>Name</b></li>
                                    <li><span>:</span><i id="name"></i></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="info-text">
                                    <li class="info-text-left"><b>PHONE</b></li>
                                    <li><span>:</span><i id="phone"></i></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="info-text">
                                    <li class="info-text-left"><b>ADDRESS</b></li>
                                    <li><span>:</span><i id="address"></i></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="info-text">
                                    <li class="info-text-left"><b>E-MAIL</b></li>
                                    <li><span>:</span><i id="email"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>   
                </div>
            </div>
        </div>
        </div>
        <!-- //banner-info -->
        </div>
    </div>
    <!-- //banner -->
   
    <!-- footer -->
    <div class="agileits-w3layouts-footer">
        <div class="container">
            <div class="agile-copyright">
                <p>DEMO OPENID CONNECT: TRÌNH KIM CHI <a href="#">HOME</a></p>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <script src="../js/jarallax.js"></script>
    <script type="text/javascript">
        /* init Jarallax */
        $('.jarallax').jarallax({
            speed: 0.5,
            imgWidth: 1366,
            imgHeight: 768
        })
    </script>
    <script src="../js/responsiveslides.min.js"></script>
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {                 
            $().UItoTop({ easingType: 'easeOutQuart' });                  
            });
    </script>
<!-- //here ends scrolling icon -->
</body>
<script src="../js/jwt-decode.js"></script>
<SCRIPT LANGUAGE="JavaScript">
    $(document).ready(function(){
        getUserInfo()
    })
    function getUserInfo(){
            var X_TOKEN = localStorage.getItem('X_TOKEN');

            if(X_TOKEN !== null){

                X_TOKEN = JSON.parse(X_TOKEN);

                $.ajax({
                type:'GET',
                url:'http://35.196.178.229/api/userinfo',
                headers: {
                    'Authorization': 'Bearer ' +  X_TOKEN['access_token']
                },
                success:function(data){
                    localStorage.setItem('X_INFO', JSON.stringify(data));
                    document.getElementById("name_info").innerHTML = data.name;
                    document.getElementById("name").innerHTML = data.name;
                    document.getElementById("phone").innerHTML = data.phone;
                    document.getElementById("address").innerHTML = data.address;
                    document.getElementById("email").innerHTML = data.email;
                },
                error:function(error){
                    if(error.status == 401){
                        localStorage.removeItem('X_INFO');
                    }
                }

           });
            }
            
    }
</SCRIPT> 
</html>
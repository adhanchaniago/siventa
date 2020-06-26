<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>SiVenta 2018</title>

    <!-- CSS -->
    <link href="<?php echo base_url('assets');?>/vendor/login/login.css" rel="stylesheet">
    <script src="<?php echo base_url('assets');?>/vendor/login/prefixfree.min.js"></script>

    <style>
        
    </style>
</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header" style="left: 118.5px;">
			<div>Si<strong><span>Venta</span></strong></div>
		</div>
		<br>
		<div class="login" style="left: 270px;">
            <form action="" method="post">
                    <input type="text" placeholder="username" name="username"><br>
                    <input type="password" placeholder="password" name="password"><br>
                    <button type="submit" value="Login" id="btn-login">Login</button>
            </form>
        </div>




</body>   

<script src='<?php echo base_url('assets');?>/vendor/jquery/jquery.min.js'></script>
<!-- Sweet ALert 2 -->
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/sweetalert2.all.js"></script>
<script src="<?php echo base_url('assets');?>/vendor/sweetalert2/promise.min.js"></script>

<script>
    $(document).ready(function () {
        
        $("#btn-login").click(function(e){
            e.preventDefault();
            var username = $('input[name="username"]').val();
            var pass = $('input[name="password"]').val();
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('login/aksi_login');?>",
                cache : false,
                data : "username=" + username + "&password=" + pass,
                success : function(response){
                    var msg = response.message;
                    // var data = response["login"];
                    // var level = data.level;
                    // alert(msg);
                    if (msg == "berhasil") {
                        var data = response["login"];
                        var level = data.level;
                        switch (level) {
                            case "Administrator":
                                window.location = "<?php echo base_url('admin');?>";
                                break;
                            case "Guest":
                                window.location = "<?php echo base_url('guest');?>";
                                break;
                            case "Kalab":
                                window.location = "<?php echo base_url('kalab');?>";
                                break;
                            case "Kasubbag":
                                window.location = "<?php echo base_url('kasubbag');?>";
                                break;
                            default:
                                break;
                        }
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oopps!',
                            text: 'Username atau Password Salah',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error : function(){
                    swal({
                        type: 'error',
                        title: 'Oopps!',
                        text: 'Terjadi Kesalahan.',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>
</html>

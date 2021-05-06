<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php $this->load->view("include"); ?>
</head>

<body class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-center">Kullanıcı Girişi</h3>
               
                <hr>
                <?php
                $alert = $this->session->userdata("alert");
                if ($alert) { ?>
                    <div class="alert <?php echo $alert["type"]; ?>" role="alert">
                        <strong><?php echo $alert["title"]; ?></strong>
                        <span><?php echo $alert["message"]; ?></span>
                    </div>

                <?php } ?>

                <form class="login_form" action=<?php echo base_url("user/login"); ?> method="POST">

                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input class="form-control" type="email" name="email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="password">Şifre</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>

                  

                    <button class="btn btn-default" type="submit">Giriş Yap</button>
                   
                </form>
            </div>
        </div>



    </div>

</body>

</html>
<div class="container">
    <a href="?c=producto&a=Index">X</a>
    <div class="row mt-5">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto mt-5">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <br>
                    <br>
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="post" action="?c=usuario&a=Iniciar_Sesion">
                        <?php
                        if ($mensaje == 1) {
                            echo ("<p>Credenciales erroneas</p>");
                        }
                        ?>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-4">
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/public/connection.css" />

<div class="d-flex flex-column justify-content-center align-items-center vh-100 bg fullContainer">

    <h1>Connexion</h1>

    <div class="wrapper fadeInDown">
        <form action="/login" method="post" id="formContent">
            <!-- Icon -->
            <div class="fadeIn first voiture">
                <img src="/public/images/voiture.jpg" class="icon" id="icon" alt="User Icon"/>
            </div>

            <?php if (!empty($erreur)){ ?>
                <div class="alert alert-danger" role="alert"><?= $erreur ?></div>
            <?php } ?>

            <!-- Login Form -->
            <form>
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="Login"/>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"/>
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

        </form>
    </div>

</div>
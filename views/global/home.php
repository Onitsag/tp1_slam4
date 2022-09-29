<?php
use utils\SessionHelpers;
?>

<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h3>Bonjour <?= SessionHelpers::getConnected()["LOGIN"] ?> !</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, commodi delectus eaque eos esse ex illum laboriosam laborum modi, molestias necessitatibus non provident quidem quis repellat soluta tempore, veritatis vitae.
                </p>
                
                <div class="voiture">  
                    <img src="public/images/voiture.jpg" alt="">
                </div>
                
                <div class="text-center">Page générée le <?= $date ?></div>
            </div>
        </div>
    </div>
</div>

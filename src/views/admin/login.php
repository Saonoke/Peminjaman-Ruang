<?php





?>


<div class="bg-login">
    <div class="kotak d-flex flex-column align-items-center justify-content-around">
        <img class="" width="200" src="<?= BASEURL ?>/image/LOGO.png" alt="">
        <form action="<?= BASEURL ?>/admin/login" class="form d-flex flex-column align-items-center gap-5" method="post">


            <input type="text" class="form-control" name="username" placeholder="Username" id="">

            <input type="password" name="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn btn-secondary w-full d-flex align-items-center text-white justify-content-center fw-semibold" >Login</button>

              
        </form>

    </div>

</div>
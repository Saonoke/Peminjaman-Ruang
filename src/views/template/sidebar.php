<div style="width:250px" class="bg-ungu  vh-1000 pt-3 aduh">


    <div class="min-vh-100 d-flex flex-column align-items-start justify-content-start ps-3 ">
        <button type="button" class="btn btn-primary mb-3 " id="close"><i class="bi bi-x"></i></button>
        <img class="my-5" style="max-width:80%;" src="<?= BASEURL ?>/image/SISPEMRU.png" alt="">
        <h1 style="max-width:80%;" class="text-white fw-semibold text-center ">SISPEMRU</h1>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="<?= BASEURL ?>/admin/dashboard"
                    class="nav-link  text-white <?= ($data['link'] == 1) ? 'active' : '' ?>  ">
                    <i class="fs-5 bi bi-grid-1x2-fill me-2"></i><span class="fs-4  d-gone">Dashboard</span>

                </a>
            </li>
            <li class="nav-item">
                <a href="<?= BASEURL ?>/admin/jadwal"
                    class="nav-link text-white <?= ($data['link'] == 2) ? 'active' : '' ?> "><i
                        class="fs-5 bi bi-calendar3 me-2"></i><span class="fs-4 d-gone">Jadwal</span></a>
            </li>
            <li class="nav-item">
                <a href="<?= BASEURL ?>/admin/arsip"
                    class="nav-link text-white <?= ($data['link'] == 3) ? 'active' : '' ?> "><i
                        class="fs-5 bi bi-archive-fill me-2"></i><span class="fs-4 d-gone">Arsip</span></a>
            </li>

        </ul>
    </div>
</div>
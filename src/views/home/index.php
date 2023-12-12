<nav class="navbar navbar-expand-lg bg-transparent">

    <div class="container ">
        <div class="navbar-brand d-flex align-items-center gap-3">
            <a href="<?= BASEURL ?>" class="d-flex align-items-center gap-3 nav-link">
                <img src="<?= BASEURL ?>/image/POLINEMA.PNG" alt="">
                <p style="font-size:24px;" class="color-white mb-0 fw-bold">POLINEMA</p>


            </a>

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="semi-bold collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link color-white  active" aria-current="page" href="<?= BASEURL ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link color-white " href="<?= BASEURL ?>/jadwal/index">Jadwal</a>
                </li>

                <li class="nav-item">
                    <a href="<?= BASEURL ?>/peminjaman/index" class="nav-link color-white">Peminjaman</a>
                </li>


                <li class="nav-item">
                    <a href="<?= BASEURL ?>/admin/index" class="fw-bold nav-link color-white ">Login</a>
                </li>

            </ul>

        </div>



    </div>



</nav>


<div class="hero">
    <div class="rectangle d-flex align-items-center">
        <div class="cover z-1">
        </div>
        <div class="d-flex z-3 box flex-column text-center justify-content-center align-items-center">
            <h1 class="semi-bold ">Peminjaman Ruang JTI</h1>
            <h3 class="mt-3">Peminjaman Ruang oleh Mahasiswa, Dosen,Pihak luar yang ingin meminjam gedung di Polinema
            </h3>
            <a href="<?= BASEURL ?>/peminjaman/ruang" class="mt-2 mb-5 btn py-2 btn-primary btn-bd-primary">Pinjam
                Sekarang !</a>
        </div>


    </div>
    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,128L34.3,106.7C68.6,85,137,43,206,48C274.3,53,343,107,411,117.3C480,128,549,96,617,96C685.7,96,754,128,823,122.7C891.4,117,960,75,1029,85.3C1097.1,96,1166,160,1234,170.7C1302.9,181,1371,139,1406,117.3L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
    </svg>

</div>




<div class="pt-5 pb-5 containe text-center">
    <h1 class="text-center fw-semibold ">Profile</h1>
    <div class="mt-5 d-flex justify-content-center flex-wrap align-items-center gap-3">

        <a href="<?= BASEURL ?>/peminjaman/ruang" class="text-decoration-none">
            <div class="kartu">
                <div class="px-4 background d-flex flex-column justify-content-end">
                    <div class="gradient">
                    </div>
                    <h1 class="fw-semibold">Lantai 5</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus facere quis quibusdam esse
                        cum?
                        Facilis.</p>
                </div>
            </div>
        </a>


        <a href="<?= BASEURL ?>/peminjaman/ruang" class="text-decoration-none">
            <div class="kartu">
                <div class="px-4 background d-flex flex-column justify-content-end">
                    <div class="gradient">
                    </div>
                    <h1 class="fw-semibold">Lantai 6 </h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus facere quis quibusdam esse
                        cum?
                        Facilis.</p>
                </div>
            </div>
        </a>

        <a href="<?= BASEURL ?>/peminjaman/ruang" class="text-decoration-none">
            <div class="kartu">
                <div class="px-4 background d-flex flex-column justify-content-end">
                    <div class="gradient">
                    </div>
                    <h1 class="fw-semibold">Lantai 7 </h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus facere quis quibusdam esse
                        cum?
                        Facilis.</p>
                </div>
            </div>


        </a>







    </div>
    <a href="#" class="mt-5 btn py-2 btn-primary btn-bd-primary">Pinjam Sekarang !</a>
</div>

<section id="spec" class="d-flex width-100 flex-wrap">
    <div class="bg-sec width-70">
        <div class="d-flex justify-content-center ">
            <div class="container px-5 p-5">
                <div class="d-flex justify-content-around align-items-center ">
                    <div class="left">
                        <div class="mb-5">
                            <img class="icon" src="<?= BASEURL ?>/image/time.png" alt="">
                            <p>
                                Waktu Pengajuan Peminjaman Lebih Cepat
                            </p>


                        </div>
                        <div>
                            <img class="icon-vektor" src="<?= BASEURL ?>/image/arrow.png" alt="">
                            <p>
                                Di Proses Cepat Oleh Sistem Yang Canggih
                            </p>
                        </div>
                    </div>
                    <div class="right">
                        <div class="mb-5">
                            <img class="icon-vektor mb-3" src="<?= BASEURL ?>/image/wa.png" alt="">
                            <p class=''>
                                Pemberitahuan Langsung Lewat Email & Whastapp
                            </p>
                        </div>
                        <div>
                            <img class="icon" src="<?= BASEURL ?>/image/calendar.png" alt="">
                            <p>
                                Jadwal Real-Time Sesuai Ketersediaan Ruang
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-image width-50 ">
        <img class="rotate " src="<?= BASEURL ?>/image/wave.svg" alt="">
    </div>
</section>


<section id="about" class="my-5">
    <div class="container">
        <h1 class="fw-semibold size70">SISPEMRU</h1>
        <P>Sistem Peminjaman Ruang Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
            printer took a galley of type and scrambled it to make a type specimen book. </P>
    </div>
</section>

<section id="cta" class="bg-blue p-5">
    <div class="container">
        <div class="flex justify-content-center">
            <h1 class="text-center text-white fw-semibold" style="width: 30rem;">
                Peminjaman Ruang Dan Gedung
            </h1>
            <p class="text-center text-white fs-2 fw-normal ">Semakin Mudah</p>
            <a href="<?= BASEURL ?>/peminjaman" class="btn btn-secondary">Pinjam Sekarang!</a>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= BASEURL ?>/css/admin.css?v=7">
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/peminjamanRuang/public/admin/index');
}
?>
<style>
    .pagination {
        display: inline-block;
        padding: 10px 18px;
        margin-right: 5px;
        background-color: white;
        color: grey;
        border-radius: 50%;
        text-decoration: none;
    }

    .pagination:hover {
        background-color: #e2e6ea;
    }

    .pagination.active {
        background-color: #1567EE;
        color: #fff;
        cursor: default;
    }
</style>

<?php
if ($data['check'] > 0) {


    ?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Delete Succes!</h4>
        <p>Peminjaman dengan id
            <?= $data['check'] ?> berhasil dihapus
        </p>
        <hr>

    </div>
    <?php
}
?>



<div id="tes" class=" padding mx-5">
    <div class="top d-flex justify-content-between align-items-center mt-2 px-3">
        <button type="button" class="btn btn-primary zindex hamburger" id="hamburger"><i
                class=" bi bi-list"></i></button>
        <h1 class="fw-bold">Arsip</h1>
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle " data-bs-toggle="dropdown"
                data-bs-display="static" aria-expanded="false">
                <i class="fs-5 bi bi-gear-fill"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">

                <form method="post" action="<?= BASEURL ?>/admin/logout">
                    <li>
                        <button class="dropdown-item" type="submit" name="logout">Log Out</button>
                    </li>
                </form>

            </ul>
        </div>

    </div>
    <div class="information flex-wrap d-flex mt-5 mb-5 ">

        <a href="<?= BASEURL ?>/admin/arsip" class="text-decoration-none text-black">
            <div class="card-total d-flex justify-content-start gap-2 align-items-center">
                <div class="box-biru" id="yellow"></div>
                <div class="d-flex  flex-column justify-content-start align-items-start ">
                    <div class="atas  fs-5  d-flex align-items-center justify-content-start text-start gap-2">
                        <h1 class="fw-semibold">
                            <?= $jumlah_satu = $data['jumlah']; ?>
                        </h1>
                        <h2 class="fw-semibold">Archived</h2>

                    </div>
                    <div class="bawah fs-5">
                        <p>see to more details</p>
                    </div>


                </div>
                <i class="fs-3 ms-3 text-primary bi bi-archive-fill"></i>
            </div>
        </a>
    </div>
    <div class="wrapper">
        <div class="search-box drop-shadow bg-white">
            <form action="<?= BASEURL ?>/admin/searcharch " method="post" class="d-flex m-0">
                <input name="nama" onkeyup="search()" id="searchitem" placeholder="cari" type="text">
                <button type="submit" class="btn"><i class="bi bi-search"></i></button>

            </form>


        </div>
        <div class="table-wrapper mb-5">


            <table id="coba" class="table ">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tujuan</th>
                        <th>Gedung/Ruang</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $count = 1;
                    foreach ($data['penyewa'] as $key) {
                        ?>
                        <tr class="cobacoba">

                            <td>
                                <?= $key['id'] ?>
                            </td>
                            <td class="namapeminjam">
                                <?= $key['nama'] ?>
                            </td>
                            <td>
                                <?= $key['kategori'] ?>
                            </td>
                            <td>
                                <?= $key['deskripsi'] ?>
                            </td>
                            <td>
                                <?= $key['ruangan'] ?>
                            </td>
                            <td>
                                <?= $key['tanggal'] ?>
                            </td>
                            <td style="color:#1567EE">
                                Complete
                            </td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="<?= '#exampleModal' . $key['id'] ?>">Details</button>


                            </td>
                        </tr>

                        <?php
                    }
                    ?>
                    <div class="kosong"></div>
                </tbody>
            </table>
            <div class="paging d-flex justify-content-end">
                <?php
                $total = $data['total'];
                $total_pages = ceil($total / 20);

                $batas = $data['index'] + 4;
                $mulai = ($data['index'] > 1) ? $data['index'] - 1 : 1;

                for ($mulai; $mulai < $batas; $mulai++) {
                    if ($mulai <= $total_pages) {
                        $class = ($mulai == $data['index']) ? 'pagination active' : 'pagination';
                        ?>
                        <a class="<?= $class ?>" href="<?= BASEURL ?>/admin/arsip/<?= $mulai ?>">
                            <?= $mulai ?>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php

    foreach ($data['penyewa'] as $key) {
        ?>

        <div class="modal fade" id="<?= 'exampleModal' . $key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="d-flex justify-content-between px-5">
                            <div class="detail-peminjaman">
                                <h5 class="fw-semibold">Nama :</h5>
                                <h5>
                                    <?= $key['nama'] ?>
                                </h5>

                                <h5 class="fw-semibold">No Identitas :</h5>
                                <h5>
                                    <?= $key['identitas'] ?>
                                </h5>

                                <h5 class="fw-semibold">Kategori :</h5>
                                <h5>
                                    <?= $key['kategori'] ?>
                                </h5>


                                <h5 class="fw-semibold">deskripsi :</h5>
                                <h5>
                                    <?= $key['deskripsi'] ?>
                                </h5>

                                <h5 class="fw-semibold">Ruangan :</h5>
                                <h5>
                                    <?= $key['ruangan'] ?>
                                </h5>

                                <h5 class="fw-semibold">Tanggal Pinjam :</h5>
                                <h5>
                                    <?= $key['tanggal'] ?>
                                </h5>

                                <h5 class="fw-semibold">Jam :</h5>
                                <h5>
                                    <?= $key['jam_mulai'] ?> -
                                    <?= $key['jam_akhir'] ?>
                                </h5>



                            </div>
                            <div class="image-identitas">
                                <img src="<?= BASEURL ?>/upload/<?= $key['upload'] ?>" alt="">

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        <a href="<?= BASEURL ?>/admin/delete/<?= $key['id'] ?>" class="btn btn-danger">Delete</a>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
    }
    ?>

</div>





<script>

    const button = document.getElementById('hamburger');
    const close = document.getElementById('close');
    const pad = document.getElementById('tes');

    close.addEventListener('click', () => {
        const list = document.querySelector('.aduh');
        pad.classList.remove("padding-left-800");
        list.style.display = 'none';
        button.style.display = "block";

    })

    button.addEventListener('click', () => {

        const list = document.querySelector('.aduh');
        pad.classList.add("padding-left-800");
        button.style.display = "none";
        list.style.display = 'flex';
    })




</script>
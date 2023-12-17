<link rel="stylesheet" href="<?= BASEURL ?>/css/admin.css?v=6">
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: http://localhost/peminjamanRuang/public/admin/index');
}
?>



<div id="tes" class="padding mx-5">
    <div class="top d-flex justify-content-between align-items-center mt-2 px-3">
        <button type="button" class="btn btn-primary zindex hamburger" id="hamburger"><i
                class=" bi bi-list"></i></button>
        <h1 class="fw-bold">Jadwal</h1>
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

    <div class="container pencarian ">
        <h1 class="px-5 text-white">Lakukan Pencarian</h1>
        <form action="<?= BASEURL ?>/admin/searchjadwal"
            class=" d-flex flex-wrap flex-direction-column gap-5 px-5 align-items-end" method="post">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Tanggal</label>
                <!-- <select class="form-control ctrl" id="exampleFormControlSelect1">
                    <option selected>Pilih Tanggal</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select> -->
                <input type="date" name="tanggal" class="form-control ctrl"
                    value="<?= (isset($data['post'])) ? $data['post']['tanggal'] : "" ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jam Mulai</label>
                <input class="form-control ctrl" type="time" name="time_start" id=""
                    value="<?= (isset($data['post'])) ? $data['post']['time_start'] : "" ?>">

            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Jam Selesai</label>
                <input class="form-control ctrl" type="time" name="time_end" id=""
                    value="<?= (isset($data['post'])) ? $data['post']['time_end'] : "" ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Lantai</label>
                <select name="ruang" class="form-control ctrl" id="exampleFormControlSelect1">
                    <option <?= (isset($data['post'])) ? "" : "selected" ?>>Pilih kelas</option>
                    <?php
                    foreach ($data['ruang'] as $key) {
                        ?>

                        <option value="<?= $key['kode_ruang'] ?>" <?php if (isset($data['post'])) {
                              if ($data['post']['ruang'] == $key['kode_ruang']) {
                                  echo "selected";
                              }
                          } ?>><?= $key['nama_ruangan'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary search px-5">Search</button>


        </form>



    </div>


    <div class="container">
        <?php
        if (isset($data['check'])) {

            if (empty($data['check'])) {
                ?>
                <div class="flex gap-3">
                    <h1 class="text-center mt-5 fw-semibold">Kosong !! </h1>

                </div>

                <?php
            } else {

                ?>
                <div class="table-wrapper mt-5">
                    <table id="coba" class="table">
                        <thead>
                            <tr>
                                <th>Nama Ruangan</th>
                                <th>Tanggal</th>
                                <th>Jam Mulai</th>
                                <th>Jam Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['check'] as $key) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $key['ruang'] ?>
                                    </td>
                                    <td>
                                        <?= $key['tanggal'] ?>
                                    </td>
                                    <td>
                                        <?= $key['mulai'] ?>
                                    </td>
                                    <td>
                                        <?= $key['akhir'] ?>
                                    </td>
                                </tr>
                                <?php
                            }
            }
        }


        ?>
                </tbody>
            </table>
        </div>

    </div>


    <script>

        const button = document.getElementById('hamburger');
        const close = document.getElementById('close');
        const pad = document.getElementById('tes');

        close.addEventListener('click', () => {
            const list = document.querySelector('.aduh');
            pad.classList.remove("padding-left-800");
            button.style.display = "block";
            list.style.display = 'none';

        })

        button.addEventListener('click', () => {
            console.log('tes');
            const list = document.querySelector('.aduh');
            pad.classList.add("padding-left-800");
            button.style.display = "none";
            list.style.display = 'flex';
        })



    </script>
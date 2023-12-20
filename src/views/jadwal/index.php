<div class="padding-top-400">
    <div class="container pencarian ">
        <h1 class="px-5 fw-semibold text-white">Lakukan Pencarian</h1>
        <form action="<?= BASEURL ?>/jadwal/search"
            class=" d-flex mt-4 flex-wrap flex-direction-column gap-5 px-5 align-items-end" method="post">
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
                <input type="date" name="tanggal" class="form-control mt-2 ctrl"
                    value="<?= (isset($data['post'])) ? $data['post']['tanggal'] : "" ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jam Mulai</label>
                <input class="form-control mt-2 ctrl" type="time" name="time_start" id=""
                    value="<?= (isset($data['post'])) ? $data['post']['time_start'] : "" ?>">

            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Jam Selesai</label>
                <input class="form-control mt-2 ctrl" type="time" name="time_end" id=""
                    value="<?= (isset($data['post'])) ? $data['post']['time_end'] : "" ?>">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Ruang</label>
                <select name="ruang" class="form-control mt-2 ctrl" id="exampleFormControlSelect1">
                    <option <?= (isset($data['post'])) ? "" : "selected" ?>>Pilih Ruang</option>
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
                    <h1 class="text-center mt-5 fw-semibold">Kosong !! Silahkan Melakukan Pemesanan</h1>
                    <a href="<?= BASEURL ?>/peminjaman/ruang" class="btn btn-primary">Pinjam Ruang</a>
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
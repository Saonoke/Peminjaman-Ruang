<div class="padding-top-400 container justify-content-center gap-4 d-flex gap-1 flex-wrap">
  <div class="container pencarian d-flex flex-wrap flex-direction-column gap-3 px-5 align-items-end">
    <div class="form-group">
      <label for="exampleForm ControlSelect1">Nama Ruang</label>
      <!-- <select class="form-control ctrl" id="exampleFormControlSelect1">
                    <option selected>Pilih Tanggal</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select> -->
      <input type="text" name="" placeholder="cari" class="form-control ctrl" onkeyup="search()" id="searchitem">
    </div>



  </div>
  <?php
  if ($data['checking'] == 'error') {
    ?>
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Permintaan Ditolak</h4>
      <p>Jadwal Yang diminta telah dipinjam, silahkan lakukan pengecekan jadwal untuk melihat jadwal yang kosong atau
        lakukan peminjaman di lain waktu.</p>
      <hr>
      <p>TERIMA KASIH!!</p>
    </div>
    <?php
  }
  ?>

  <div class="container m-0">
    <h1 class="jumlah fw-semibold  ">
      <?= count($data['ruang']) ?> result
    </h1>
  </div>


  <h1 class="kosong"></h1>

  <?php
  foreach ($data['ruang'] as $key) {
    ?>

    <!-- <div class="item">
  <div class="block"></div>
</div> -->

    <button href="#coba" class="rouded-3 btn-sendiri coba " data-bs-toggle="modal"
      data-bs-target="<?= '#exampleModal' . $key['kode_ruang'] ?>">
      <div class="kartu kartu-ruangan rounded-3">
        <div class="px-4 rounded-3 relative  d-flex flex-column justify-content-end">
          <div class="gradient rounded-3">
          </div>
          <img src="<?= BASEURL . "/ruang/" . $key['gambar_ruang'] ?>" alt="">
          <p class="fw-semibold text-white nama-ruangan fs-100 mb-0 ">
            <?= $key['nama_ruangan'] ?>
          </p>
          <p class="fs-4 mb-0 text-white ">Lantai
            <?= $key['lantai'] ?>
          </p>
          <p class='coba second-color fs-4'><i class="fs-4 bi bi-people-fill"></i>
            <?= $key['kapasitas'] ?> Person
          </p>

        </div>
      </div>
    </button>

    <div class="modal fade" id="<?= 'exampleModal' . $key['kode_ruang'] ?>" tabindex="-1"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fw-semibold" id="exampleModalLabel">
              <?= $key['nama_ruangan'] ?>
            </h1>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex gap-3 px-5 ">
              <div class="image-modal">
                <img src="<?= BASEURL . "/ruang/" . $key['gambar_ruang'] ?>" alt="">
              </div>
              <div class="desc">
                <h5 class="fw-semibold">Kapasitas : </h5>
                <p>
                  <i class="fs-5 bi bi-people-fill"></i>
                  <?= $key['kapasitas'] ?> person
                </p>
                <h5 class="fw-semibold">Tarif Ruang :</h5>
                <p>
                    <img src="<?= BASEURL ?>/image/Rp.PNG" style="width: 24px;" alt="Rp">
<!--                  <i class="fs-5 bi bi-currency-dollar"></i>-->
                  <?= $key['tarif_ruang'] ?>
                </p>
                <h5 class="fw-semibold">Fasilitas : </h5>
                <p>
                  <i class="fs-5 bi bi-collection-fill"></i>
                  <?= $key['fasilitas'] ?>
                </p>




              </div>

            </div>
            <div class="form  py-4 px-5 ">
              <form action="<?= BASEURL ?>/peminjaman/cek" method='post'>
                <input required type="hidden" name="ruangan" value="<?= $key['kode_ruang'] ?>">
                <input required type="hidden" name="nominal" value="<?= $key['tarif_ruang'] ?>">

                <label class="label-form mb-2 fw-semibold " for="tanggal-mulai">Tanggal Pakai</label>
                <input required name="tanggal" class="form-control ctrl mb-3" type="date">

                <div class="d-flex width-100 gap-3">
                  <div class="group flex-fill">
                    <label for="waktu-mulai " class="mb-2 fw-semibold ">Waktu mulai</label>
                    <input required name="mulai" class="form-control ctrl mb-3" type="time">
                  </div>
                  <div class="group flex-fill">

                    <label for="waktu-akhir " class="mb-2 fw-semibold ">Waktu Akhir</label>

                    <input name="akhir" class="form-control ctrl mb-2" type="time">
                  </div>

                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" style="color: red !important;" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Pinjam!</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</div>

<script>
  const search = () => {
    const kosong = document.querySelector('.kosong');
    kosong.style.display = 'none';

    const searchbox = document.querySelector('#searchitem').value.toUpperCase();
    const product = document.querySelectorAll('.btn-sendiri');
    const pname = document.querySelectorAll('.nama-ruangan');
    let hitung = 0;
    let coba = 0;
    for (let i = 0; i < pname.length; i++) {
      let match = product[i].querySelector('.nama-ruangan');

      if (match) {
        let textvalue = match.textContent || match.innerHTML;
        if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
          product[i].style.display = '';
          coba++;
        } else {
          product[i].style.display = 'none';
          hitung++;

        }
      }

    }

    const jumlah = document.querySelector('.jumlah');
    jumlah.innerHTML = coba + ' result';

    if (hitung == pname.length) {

      kosong.style.display = 'block';
      kosong.innerHTML = "Tidak Ditemukan";
    }



  }

</script>
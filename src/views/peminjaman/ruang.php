<div class="padding-top-400 container justify-content-center gap-4 d-flex gap-1 flex-wrap">
<div class="container pencarian d-flex flex-direction-column gap-3 px-5 align-items-end">
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
                <input type="text" name="" class="form-control ctrl" id="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Lantai</label>
            <select class="form-control ctrl" id="exampleFormControlSelect1">
                <option selected> Pilih Lantai </option>
                <option>Lantai 5</option>
                <option>Lantai 6</option>
                <option>Lantai 7</option>
                <option>Lantai 8</option>
            </select>
        </div>
        <button type="button" class="btn btn-primary search px-5">Search</button>
    </div>
    <?php 
        foreach ($data['ruang'] as $key ) {
           ?>
        
        <!-- <div class="item">
  <div class="block"></div>
</div> -->
        <button  href="#coba" class="rouded-3 btn-sendiri coba " data-bs-toggle="modal" data-bs-target="<?= '#exampleModal'.$key['kode_ruang'] ?>" >
            <div class="kartu rounded-3">
                <div class="px-4 rounded-3 background d-flex flex-column justify-content-end">
                    <div class="gradient rounded-3">
                    </div>
                    <h1 class="fw-semibold mb-0"><?= $key['nama_ruangan'] ?></h1>
                    <p class="fs-4 mb-0" >Lantai <?= $key['lantai'] ?> </p>
                    <p class='coba second-color fs-4' ><i class="fs-4 bi bi-people-fill"></i> <?= $key['kapasitas'] ?> Person</p>

                </div>
            </div>
        </button>
           
        <div class="modal fade" id="<?= 'exampleModal'.$key['kode_ruang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
      <h1 class="modal-title" id="exampleModalLabel"><?= $key['nama_ruangan'] ?> </h1>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Pinjam!</button>
      </div>
    </div>
  </div>
</div>
<?php
        }
    ?>
</div>
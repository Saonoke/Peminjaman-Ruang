

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
                <input type="text" name="" class="form-control ctrl" onkeyup="search()" id="searchitem">
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
    <div class="kosong"></div>
    <?php 
        foreach ($data['ruang'] as $key ) {
           ?>
        
        <!-- <div class="item">
  <div class="block"></div>
</div> -->
        <button  href="#coba" class="rouded-3 btn-sendiri coba " data-bs-toggle="modal" data-bs-target="<?= '#exampleModal'.$key['kode_ruang'] ?>" >
            <div class="kartu kartu-ruangan rounded-3">
                <div class="px-4 rounded-3 background d-flex flex-column justify-content-end">
                    <div class="gradient rounded-3">
                    </div>
                    <h1 class="fw-semibold mb-0 nama-ruangan"><?= $key['nama_ruangan'] ?></h1>
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
          <div class="d-flex gap-3">
            <div class="image-modal">
                <img src="<?= BASEURL ?>/image/gedung.jpg" alt="">
            </div>
            <div class="desc">
                  <h5>Kapasitas : <?= $key['kapasitas'] ?></h5>
                  <h5>tarif ruang : <?= $key['tarif_ruang'] ?></h5>
                  <h5>Fasilitas : <?= $key['fasilitas'] ?> </h5>
                  <form action="">
                        <label class="label-form mb-2" for="tanggal-mulai">Tanggal Pakai</label>
                        <input class="form-control ctrl mb-2" type="date">
                        <input class="form-control ctrl mb-2" type="time">
                        <label for="tanggal-mulai " class="mb-2" >Tanggal Akhir</label>
                        <input class="form-control ctrl mb-2" type="date">
                        <input class="form-control ctrl mb-2" type="time">


                  </form>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="<?= BASEURL ?>/peminjaman/form/<?= $key['kode_ruang'] ?>" type="button" class="btn btn-primary">Pinjam!</a>
      </div>
    </div>
  </div>
</div>
<?php
        }
    ?>
</div>

<script>
  const search = () => {
    const kosong =document.querySelector('.kosong');
    kosong.style.display= 'none';

    const searchbox= document.querySelector('#searchitem').value.toUpperCase();
    const product = document.querySelectorAll('.btn-sendiri');
    const pname=document.querySelectorAll('.nama-ruangan');
    let hitung=0;
    for (let i = 0; i < pname.length; i++) {
      let match= product[i].querySelector('.nama-ruangan');

      if(match){
        let textvalue=match.textContent || match.innerHTML;
        if(textvalue.toUpperCase().indexOf(searchbox) > -1){
          product[i].style.display= '';
        }else{
          product[i].style.display= 'none';
            hitung++;
        }
      }
      
    }
  
    if(hitung==pname.length){
    
     kosong.style.display= 'block';
     kosong.innerHTML="coba";
    }



  }

</script>
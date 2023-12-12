<link rel="stylesheet" href="<?= BASEURL ?>/css/admin.css?v=5">

<div class="bg-ungu col-auto col-lg-2 vh-1000 pt-3 aduh">
        
  
        <div class="min-vh-100 d-flex flex-column align-items-start justify-content-start ps-3 ">
        <button type="button" class="btn btn-primary mb-3 " id="close" ><i class="bi bi-x" ></i></button>
           
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link  text-white ">
                    <i class="fs-5 bi bi-grid-1x2-fill me-2"></i><span class="fs-4  d-gone">Dashboard</span>

                </a>
            </li>
            <li class="nav-item">
                <a href="<?= BASEURL ?>/admin/jadwal" class="nav-link text-white active "><i class="fs-5 bi bi-calendar3 me-2"></i><span class="fs-4 d-gone">Jadwal</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="fs-5 bi bi-archive-fill me-2"></i><span class="fs-4 d-gone">Arsip</span></a>
            </li>

        </ul>
        </div>
    </div>

    <button type="button" class="btn btn-primary  zindex hamburger" id="hamburger" ><i class="bi bi-list" ></i></button>
<div  id="tes" class="padding-top-400">
    <div class="container pencarian ">
       <h1 class="px-5 text-white" >Lakukan Pencarian</h1>
        <form action="<?= BASEURL ?>/jadwal/search" class=" d-flex flex-wrap flex-direction-column gap-5 px-5 align-items-end" method="post">
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
                <input type="date" name="tanggal" class="form-control ctrl" value= "<?= (isset($data['post']))?$data['post']['tanggal']:"" ?>" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jam Mulai</label>
            <input class="form-control ctrl" type="time" name="time_start" id="" value="<?= (isset($data['post']))?$data['post']['time_start']:"" ?>" >
           
        </div>

        <div class="form-group">
        <label for="exampleFormControlSelect1">Jam Selesai</label>
            <input class="form-control ctrl" type="time" name="time_end" id="" value="<?= (isset($data['post']))?$data['post']['time_end']:"" ?>" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Lantai</label>
            <select name="ruang" class="form-control ctrl" id="exampleFormControlSelect1">
                <option  <?= (isset($data['post']))?"":"selected" ?>>Pilih kelas</option>
                    <?php 
                        foreach ($data['ruang'] as $key ) {
                            ?>
                            
                            <option value="<?= $key['kode_ruang'] ?>"
                             <?php if(isset($data['post'])){
                                if($data['post']['ruang']==$key['kode_ruang']){
                                    echo "selected";
                                }
                            } ?>><?= $key['nama_ruangan'] ?></option>
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
    if(isset($data['check'])){
      
            if(empty( $data['check'])){
                ?>
                <div class="flex gap-3">
                <h1 class="text-center mt-5 fw-semibold" >Kosong !! Silahkan Melakukan Pemesanan</h1>
                <a href="<?= BASEURL ?>/peminjaman/ruang" class="btn btn-primary" >Pinjam Ruang</a>
                </div>
                      
                <?php
            }else{

        ?>
         <div class="table-wrapper mt-5">
        <table   id="coba" class="table">
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
      foreach ($data['check'] as $key ) {
            ?>
                <tr>
                    <td><?= $key['ruang'] ?></td>
                    <td><?= $key['tanggal'] ?></td>
                    <td><?= $key['mulai'] ?></td>
                    <td><?= $key['akhir'] ?></td>
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
    const close= document.getElementById('close');
    const pad= document.getElementById('tes');
    
    close.addEventListener('click',()=>{
        const list = document.querySelector('.aduh');
 pad.classList.remove("padding-left-400");
 button.style.display="block";
  list.style.display = 'none';

    })

button.addEventListener('click',()=>{
  console.log('tes');
  const list = document.querySelector('.aduh');
  pad.classList.add("padding-left-400");
  button.style.display="none";
  list.style.display = 'flex';
})


      
</script>    

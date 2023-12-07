<div class="padding-top-400">
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
                <input type="date" name="tanggal" class="form-control ctrl" id="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Jam Mulai</label>
            <input class="form-control ctrl" type="time" name="time_start" id="">
           
        </div>

        <div class="form-group">
        <label for="exampleFormControlSelect1">Jam Selesai</label>
            <input class="form-control ctrl" type="time" name="time_end" id="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Lantai</label>
            <select name="ruang" class="form-control ctrl" id="exampleFormControlSelect1">
                <option selected>Pilih kelas</option>
                    <?php 
                        foreach ($data['ruang'] as $key ) {
                            ?>
                            
                            <option><?= $key['nama_ruangan'] ?></option>
                            <?php
                        }
                    ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary search px-5">Search</button>


        </form>
        
<?php 
    if(isset($data['check'])){
        echo $data['check'][0]['tanggal_pinjam'];
    }


?>

    </div>
    
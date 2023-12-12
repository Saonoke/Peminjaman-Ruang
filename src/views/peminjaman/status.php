<div class="padding-top-400 container">
    <div class="table-wrapper">
    <div class="search-box">
    <form action="<?= BASEURL ?>/peminjaman/search " method="post"  class="d-flex m-0" >
           <input name="nama"  onkeyup="search()" id="searchitem" placeholder="cari" type="text">
            <button type="submit" class="btn" ><i class="bi bi-search" ></i></button>

       </form>

    </div>

    <table id="coba" class="table" > 
            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Tujuan</th>
                    <th>Gedung/Ruang</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                 
                    
                </tr>
            </thead>
            <tbody>

                <?php
            $count=1; 
            foreach ($data['penyewa'] as $key )
            {
                ?>
                <tr class="cobacoba">
                    
                    <td><?= $key['id'] ?></td>
                    <td class="namapeminjam" ><?= $key['nama'] ?></td>
                    <td><?= $key['kategori'] ?></td>
                        <td><?= $key['deskripsi'] ?></td>
                        <td><?= $key['ruangan'] ?></td>
                        <td><?= $key['tanggal'] ?></td>
                        <td style="<?= ($key['status']>0)?'color:#248749':'color:#FFA921'; ?>"><?= ($key['status']>0)?'Accepted':'Waiting' ?></td>
                        
                </tr>
               

                <?php
            }
            ?>
 
       
                <div class="kosong"></div>
               

         
            </tbody> 
        </table>

        <div class="paging d-flex justify-content-end">
<?php 
    $total= intval($data['total']['jumlah']);
    $total_pages=ceil($total/20);
    
    $batas=$data['index']+4;
    if($data['index']>1){
        $mulai= $data['index']-1;
    }else{
        $mulai=1;
    }
            for($mulai;$mulai<$batas;$mulai++){
                if($mulai<=$total_pages){

                
                ?>
                <a class="me-2 text-decoration-none text-black p-2 rounded-2 bg-white" href="<?= BASEURL ?>/peminjaman/status/<?= $mulai ?>" ><?=$mulai ?></a>
                <?php
                }
            }
    ?>

</div>
    </div>

</div>

<script>
    const search = () => {
    const kosong =document.querySelector('.kosong');
    kosong.style.display= 'none';

    const searchbox= document.querySelector('#searchitem').value.toUpperCase();
    const product = document.querySelectorAll('.cobacoba');
    const pname=document.querySelectorAll('.namapeminjam');
    let hitung=0;
    for (let i = 0; i < pname.length; i++) {
   
      let match= product[i].querySelector('.namapeminjam');

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
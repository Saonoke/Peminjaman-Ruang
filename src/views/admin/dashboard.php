<?php 
session_start();
if(!isset($_SESSION['username']))
{
     header('Location: http://localhost/peminjamanRuang/public/admin/index');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/admin.css?v=6">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700;900&display=swap"
        rel="stylesheet">
    
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" ></script>


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

</head>
<body>



<div id="tes"  class="padding">
<div class="">
   



  
    <div class="">
    <div class="top d-flex justify-content-between align-items-center mt-2 px-3">
        <button type="button" class="btn btn-primary zindex hamburger" id="hamburger"><i
                class=" bi bi-list"></i></button>
        <h1 class="fw-bold">Dashboard</h1>
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
    <main class="mt-5 d-flex justify-content-between gap-5  flex-column"> 

    <div class="information flex-wrap d-flex gap-2">
  <a href="<?= BASEURL ?>/admin/request" class="text-decoration-none text-black" >
  <div class="card-total d-flex  justify-content-start gap-2 align-items-center">
            <div class="box-yellow" id="yellow"></div>
            <h1><?= $jumlah_satu = implode(",    ",$data['jumlah'][0])?></h1>
            <h2>Request</h2>
        </div>

  </a>
   <a href="<?= BASEURL ?>/admin/dashboard" class="text-decoration-none text-black" >
        <div class="card-total d-flex justify-content-start gap-2 align-items-center">
            <div class="box-green" id="yellow"></div>
            <h1><?= $jumlah_satu = implode(", ",$data['jumlah'][1]); ?></h1>
            <h2>Accepted</h2>
        </div>
        </a>
    </div>
  <div class="table-wrapper">
  <div class="search-box bg-white">
       <form action="<?= BASEURL ?>/admin/search " method="post"  class="d-flex m-0" >
           <input name="nama"  onkeyup="search()" id="searchitem" placeholder="cari" type="text">
            <button type="submit" class="btn" ><i class="bi bi-search" ></i></button>

       </form>

   
    </div>
  <table id="coba" class="table " > 
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
            $count=1; 
            foreach ($data['penyewa'] as $key )
            {
                ?>
                <tr class="cobacoba" >
                    
                    <td><?= $key['id'] ?></td>
                    <td class="namapeminjam" ><?= $key['nama'] ?></td>
                    <td><?= $key['kategori'] ?></td>
                        <td><?= $key['deskripsi'] ?></td>
                        <td><?= $key['ruangan'] ?></td>
                        <td><?= $key['tanggal'] ?></td>
                        <td style="<?= ($key['status']>0)?'color:#248749':'color:#FFA921'; ?>"><?= ($key['status']>0)?'Accepted':'Waiting' ?></td>
                        <td>
                            <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="<?= '#exampleModal'.$key['id'] ?>">Details</button>
                            
                    
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
        $total = intval($data['total']['jumlah']);
        $total_pages = ceil($total / 20);
    
        $batas = $data['index'] + 4;
        $mulai = ($data['index'] > 1) ? $data['index'] - 1 : 1;

        for ($mulai; $mulai < $batas; $mulai++) {
            if ($mulai <= $total_pages) {
                $class = ($mulai == $data['index']) ? 'pagination active' : 'pagination';
    ?>
                <a class="<?= $class ?>" href="<?= BASEURL ?>/admin/dashboard/<?= $mulai ?>"><?= $mulai ?></a>
    <?php
            }
        }
    ?>
</div>
   
        


    </main>
    <?php 
            
            foreach ($data['penyewa'] as $key ){
?>

            <div class="modal fade" id="<?= 'exampleModal'.$key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <div class="d-flex justify-content-between px-5">
    <div class="detail-peminjaman">
        <h5 class="fw-semibold" >Nama :</h5>
        <h5><?= $key['nama'] ?></h5>

        <h5 class="fw-semibold" >No Identitas :</h5>
        <h5><?= $key['identitas'] ?></h5>

        <h5 class="fw-semibold" >No Telp :</h5>
        
        <h5><?= $key['nomer'] ?></h5>

        <h5 class="fw-semibold" >Kategori :</h5>
        <h5><?= $key['kategori'] ?></h5>
        

        <h5 class="fw-semibold" >deskripsi :</h5>
        <h5><?= $key['deskripsi'] ?></h5>

        <h5 class="fw-semibold" >Ruangan :</h5>
        <h5><?= $key['ruangan'] ?></h5>

        <h5 class="fw-semibold" >Tanggal Pinjam :</h5>
        <h5><?= $key['tanggal'] ?></h5>

        <h5 class="fw-semibold" >Jam :</h5>
        <h5><?= $key['jam_mulai'] ?> - <?= $key['jam_akhir']  ?> </h5>

     
       
        </div>
                <div class="image-identitas">
                    <img  src="<?= BASEURL ?>/upload/<?= $key['upload'] ?>" alt="">

                </div>

      </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href='<?= BASEURL ?>/admin/acc/<?= $key['id'] ?>' type="button" class="btn btn-danger">Decline</a>
        <a href='<?= BASEURL ?>/admin/acc/<?= $key['id'] ?>' type="button" class="btn btn-success">Accept</a>
      </div>
    </div>
  </div>
  </div>
       
</div>

<?php
    }
?>

    
    
    </div>

</div>

</div>
<script>
    
    const button = document.getElementById('hamburger');
    const close= document.getElementById('close');
    const pad= document.getElementById('tes');
    
    close.addEventListener('click',()=>{
        const list = document.querySelector('.aduh');
 pad.classList.remove("padding-left-800");
  list.style.display = 'none';
  button.style.display="block";

    })

button.addEventListener('click',()=>{

  const list = document.querySelector('.aduh');
  pad.classList.add("padding-left-800");
  button.style.display="none";
  list.style.display = 'flex';
})



      
</script>    



</body>
</html>
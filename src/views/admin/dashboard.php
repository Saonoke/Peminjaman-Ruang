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
    <link rel="stylesheet" href="<?= BASEURL ?>/css/admin.css?v=2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700;900&display=swap"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/e6bc1ebaee.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" ></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script>
    
    const button = document.querySelector('#hamburger');

button.addEventListener('click',()=>{
  console.log('coba')
  const list = document.querySelector('.aduh');
  console.log(list)
  list.style.display = 'flex';
})
      
</script>
</head>
<body>
    <!-- Custom -->
<div class="bg-ungu vh-1000 aduh ">
  
  <div class="min-vh-100 d-flex flex-column align-items-start justify-content-center ">
     
  <ul class="nav nav-pills flex-column">
      <li class="nav-item">
          <a href="#" class="nav-link  text-white active">
              <i class="fs-5 bi bi-grid-1x2-fill me-2"></i><span class="fs-4  d-gone">Dashboard</span>

          </a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link text-white"><i class="fs-5 bi bi-calendar3 me-2"></i><span class="fs-4 d-gone">Jadwal</span></a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link text-white"><i class="fs-5 bi bi-archive-fill me-2"></i><span class="fs-4 d-gone">Arsip</span></a>
      </li>

  </ul>
  </div>
</div>

<!-- custom -->
    <div class="container-fluid ">
<div class="row flex-nowrap">
   



    <div class="bg-ungu col-auto col-lg-2 vh-1000  d-md-flex d-none ">
  
        <div class="min-vh-100 d-flex flex-column align-items-start justify-content-center ">
           
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link  text-white active">
                    <i class="fs-5 bi bi-grid-1x2-fill me-2"></i><span class="fs-4  d-gone">Dashboard</span>

                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="fs-5 bi bi-calendar3 me-2"></i><span class="fs-4 d-gone">Jadwal</span></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white"><i class="fs-5 bi bi-archive-fill me-2"></i><span class="fs-4 d-gone">Arsip</span></a>
            </li>

        </ul>
        </div>
    </div>
    <div class="col full-a">
        <div class="top d-flex justify-content-between align-items-center mt-2 px-3">
            <button type="button" class="btn btn-primary coba zindex" id="hamburger" ><i class="bi bi-list" ></i></button>
        <h1>Dashboard</h1>
        <div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle " data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
  <i class="fs-5 fa fa-user"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-lg-end">
    <li><button class="dropdown-item" type="button">Action</button></li>
    <li><button class="dropdown-item" type="button">Another action</button></li>
    <li><button class="dropdown-item" type="button">Something else here</button></li>
  </ul>
</div>

        </div>
    <main class="mt-5 d-flex justify-content-between gap-5  flex-column"> 

    <div class="information flex-wrap d-flex gap-2">
    <div class="card-total d-flex  justify-content-start gap-2 align-items-center">
            <div class="box-yellow" id="yellow"></div>
            <h1><?= $jumlah_satu = implode(", ",$data['jumlah'][0])?></h1>
            <h2>Request</h2>
        </div>
        <div class="card-total d-flex justify-content-start gap-2 align-items-center">
            <div class="box-green" id="yellow"></div>
            <h1><?= $jumlah_satu = implode(", ",$data['jumlah'][1]); ?></h1>
            <h2>Accepted</h2>
        </div>
    </div>
  <div class="table-wrapper">
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
                <tr>
                    
                    <td><?= $count++ ?></td>
                    <td><?= $key['nama'] ?></td>
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
            </tbody> 
        </table>

        


    </main>
    <?php 
            
            foreach ($data['penyewa'] as $key ){
?>

            <div class="modal fade" id="<?= 'exampleModal'.$key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?= $key['nama'] ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Accept</button>
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
    
</body>
</html>
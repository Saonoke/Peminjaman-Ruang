<div class="padding-top-400 container">
    <div class="table-wrapper">
    <div class="search-box">
         <i class="bi bi-search" ></i>   
        <input placeholder="cari" type="text">
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
                <tr>
                    
                    <td><?= $count++ ?></td>
                    <td><?= $key['nama'] ?></td>
                    <td><?= $key['kategori'] ?></td>
                        <td><?= $key['deskripsi'] ?></td>
                        <td><?= $key['ruangan'] ?></td>
                        <td><?= $key['tanggal'] ?></td>
                        <td style="<?= ($key['status']>0)?'color:#248749':'color:#FFA921'; ?>"><?= ($key['status']>0)?'Accepted':'Waiting' ?></td>
                        
                </tr>
               

                <?php
            }
            ?>
            </tbody> 
        </table>
    </div>

</div>
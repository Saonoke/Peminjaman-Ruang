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
        background-color: #ffaa22 !important;
        color: #fff;
        cursor: default;
    }
</style>


<div class="padding-top-400 container">
    <div class="table-wrapper">
        <div class="search-box">
            <form action="<?= BASEURL ?>/peminjaman/search " method="post" class="d-flex m-0">
                <input name="nama" onkeyup="search()" id="searchitem" placeholder="cari" type="text">
                <button type="submit" class="btn"><i class="bi bi-search"></i></button>

            </form>

        </div>

        <table id="coba" class="table">
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
                $count = 1;
                foreach ($data['penyewa'] as $key) {
                    ?>
                    <tr class="cobacoba">

                        <td>
                            <?= $key['id'] ?>
                        </td>
                        <td class="namapeminjam">
                            <?= $key['nama'] ?>
                        </td>
                        <td>
                            <?= $key['kategori'] ?>
                        </td>
                        <td>
                            <?= $key['deskripsi'] ?>
                        </td>
                        <td>
                            <?= $key['ruangan'] ?>
                        </td>
                        <td>
                            <?= $key['tanggal'] ?>
                        </td>
                        <?php
                        if ($key['decline'] == '1') {


                            ?>
                            <td class="text-danger">Decline</td>
                            <?php
                        } else {
                            ?>
                            <td style="<?= ($key['status'] > 0) ? 'color:#248749' : 'color:#FFA921'; ?>">
                                <?= ($key['status'] > 0) ? 'Accepted' : 'Waiting' ?>
                            </td>

                            <?php
                        }
                        ?>
                        <td>
                            <?php
                            if ($key['decline'] == '1' || $key['status'] == '0') {

                                ?>
                                <a href="" class="btn btn-danger" style="pointer-events: none; background-color:#D5695B;"><i
                                        class=" bi
                                    bi-printer-fill"></i> Print</a>
                                <?php
                            } else {
                                ?>


                                <a href="" class="btn btn-danger"><i class="bi bi-printer-fill"></i> Print</a>
                                <?php
                            }
                            ?>
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
            $total = $data['total'];
            $total_pages = ceil($total / 20);

            $batas = $data['index'] + 4;
            $mulai = ($data['index'] > 1) ? $data['index'] - 1 : 1;

            for ($mulai; $mulai < $batas; $mulai++) {
                if ($mulai <= $total_pages) {
                    $class = ($mulai == $data['index']) ? 'pagination active' : 'pagination';
                    ?>
                    <a class="<?= $class ?>" href="<?= BASEURL ?>/admin/dashboard/<?= $mulai ?>">
                        <?= $mulai ?>
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>

</div>

<script>
    const search = () => {
        const kosong = document.querySelector('.kosong');
        kosong.style.display = 'none';

        const searchbox = document.querySelector('#searchitem').value.toUpperCase();
        const product = document.querySelectorAll('.cobacoba');
        const pname = document.querySelectorAll('.namapeminjam');
        let hitung = 0;
        for (let i = 0; i < pname.length; i++) {

            let match = product[i].querySelector('.namapeminjam');

            if (match) {
                let textvalue = match.textContent || match.innerHTML;
                if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
                    product[i].style.display = '';
                } else {
                    product[i].style.display = 'none';
                    hitung++;
                }
            }

        }

        if (hitung == pname.length) {

            kosong.style.display = 'block';
            kosong.innerHTML = "coba";
        }



    }

</script>
<style>
    input {
        border-radius: 5px;
        background-color: #D9D9D9;
    }

    textarea {
        border-radius: 5px;
        background-color: #D9D9D9;
    }

    form {
        width: 100%;
        padding: 30px;
        border-radius: 5px;
    }

    .form-check {
        margin-bottom: 20px;
    }

    .form-check-label {
        margin-left: 10px;
        cursor: pointer;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        margin-bottom: 10px;
    }

    button {
        background-color: #ffaa22;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 10%;
    }

    label {
        font-size: 16px;
        font-weight: bold;
    }

    textarea.deskripsi {
        width: 100%;
        height: 100px;
        padding: 10px;
        border: 1px solid #D9D9D9;
        margin-bottom: 10px;
        color
    }

    textarea.deskripsi:focus {
        border-color: #007bff;
    }

    h3 {
        color: #ffaa22;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 0;
        padding: 0;
        padding-left: 1%;
    }

    #opacity {
        opacity: 0.7;
    }

    .container {
        border-radius: 20px;
    }

    .drag-area {
        background-color: #D9D9D9;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 10px auto;
        width: 100% !important;
    }

    #jabatan {
        color: #666666;
    }

    input {
        background: #D9D9D9 !important;
        color: black !important;
    }

    h3 {
        color: #ffaa22 !important;
        font-weight: 600 !important;
    }

    input::placeholder {
        color: black !important;
    }
</style>

<body>

    <div class="padding-top-400 container">
        <form class="p-0" action="<?= BASEURL ?>/peminjaman/tambahPenyewa" method="post" enctype="multipart/form-data">
            <h1 class="fw-bold">Data Pemohon</h1>

            <input type="hidden" name="ruangan" value="<?= $_POST['ruangan'] ?>">
            <input type="hidden" name="nominal" value="<?= $_POST['nominal'] ?>">
            <input type="hidden" name="tanggal" value="<?= $_POST['tanggal'] ?>">
            <input type="hidden" name="mulai" value="<?= $_POST['mulai'] ?>">
            <input type="hidden" name="akhir" value="<?= $_POST['akhir'] ?>">

            <div class="form-check p-0">
                <h3 class="text-biru">Jabatan</h3>
                <input class="form-mahasiswa" type="radio" value="1" name="jabatan" id="mahasiswa">
                <label class="form-check-label" for="mahasiswa">Mahasiswa</label><br>

                <input class="form-jabatan" type="radio" value="3" name="jabatan" id="tamu">
                <label class="form-check-label" for="tamu">Tamu</label><br>

                <input class="form-dosen" type="radio" value="2" name="jabatan" id="dosen">
                <label class="form-check-label" for="dosen">Dosen</label>
            </div>

            <h3>Nama</h3>
            <input type="text" name="nama" id="opacity" required placeholder="Masukkan Nama Lengkap"><br>

            <h3>No Identitas</h3>
            <input type="text" name="nim" id="opacity" required placeholder="Masukkan NIP/NIK/NIM"><br>

            <h3>Email</h3>
            <input type="email" name="email" id="opacity" required placeholder="Masukkan Email Anda"><br>

            <h3>No Hp</h3>
            <input type="text" name="nohp" id="opacity"
                placeholder="Masukkan No Telpon Anda (diutamakan memiliki WhatApp)" required><br>

            <h3>Deskripsi</h3><br>
            <textarea class="deskripsi" id="opacity" rows="4" name="deskripsi"
                placeholder="Masukkan Alasan dalam peminjaman ruang" required></textarea><br>

            <h3>Bukti Identitas</h3>
            <span class="header">Pilih File Anda</span>
            <input type="file" name="fileToUpload" id="fileToUpload" onchange="validateFile()" />
            <span class="support">Supports: JPEG, JPG, PNG</span>
    </div>

    <br><br>
    <button type="submit" value="Upload Image" name="submit" class="btn btn-primary mb-5">Ajukan</button>
    </form>
    </div>

    <script>
        function validateFile() {
            const fileInput = document.getElementById('fileToUpload');
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

            if (fileInput.files.length > 0) {
                const fileType = fileInput.files[0].type;

                if (!allowedTypes.includes(fileType)) {
                    alert('File harus berupa gambar dengan format JPEG, JPG, atau PNG.');
                    fileInput.value = '';
                }
            }
        }
    </script>
</body>

</html>
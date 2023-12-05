
    <style>

        input{
            border-radius: 5px;
            background-color: #D9D9D9;
        }
        textarea{
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

        input[type="text"], input[type="email"], input[type="file"] {
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
            width:100%!important;
        }
        #jabatan{
            color: #666666;
        }


        .drag-area .icon {
            font-size: 50px;
            color: #ffaa22;
        }

        .drag-area .support {
            font-size: 12px;
            color: rgb(128, 128, 128);
            margin: 10px 0 15px 0;
        }

        .drag-area .button {
            font-size: 20px;
            font-weight: 500;
            color: #ffaa22;
            cursor: pointer;
        }

        .drag-area.active {
            border: 2px solid #ffaa22;
        }

        .drag-area img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        input{
            background: #D9D9D9!important;
            color:black!important;
        }

        h3{
        color: #ffaa22!important;
        font-weight: 600!important;
        }

        input::placeholder{
            color:black!important;
        }

       
    </style>

<div class="padding-top-400 container">
<form class="p-0" action="<?= BASEURL ?>/peminjaman/tambahPenyewa" method="post">
    <h1 class="fw-bold" >Data Pemohon</h1>

      <input type="hidden" name="ruangan" value="<?= $data['ruangan'] ?>">  
    <div class="form-check p-0">
        <h3 class="text-biru" >Jabatan</h3>
        <input class="form-mahasiswa" type="radio" value="1" name="jabatan" id="jabatan">
        <label class="form-check-label" for="mahasiswa" id="jabatan">Mahasiswa</label>
        <br>
        <input class="form-jabatan" type="radio" value="3" name="jabatan" id="jabatan">
        <label class="form-check-label" for="tamu"id="jabatan">Tamu</label>
        <br>
        <input class="form-dosen" type="radio" value="2" name="jabatan" id="jabatan">
        <label class="form-check-label" for="dosen" id="jabatan">Dosen</label>
    </div>

    <h3>Nama</h3>
    <input type="text" name="nama" id="opacity" required placeholder="Masukkan Nama Lengkap">
    <br>

    <h3>No Identitas</h3>
    <input type="text" name="nim" id="opacity" required placeholder="Masukkan NIP/NIK/NIM">
    <br>

    <h3>Email</h3>
    <input type="email" name="email" id="opacity" required placeholder="Masukkan Email Anda">
    <br>

    <h3>No Hp</h3>
    <input type="text" name="nohp" id="opacity" required placeholder="Masukkan No Telpon Anda (diutamakan memiliki WhatApp)">
    <br>

    <h3>Deskripsi</h3>
    <br>
    <textarea class="deskripsi" id="opacity" rows="4" name="deskripsi"  >Masukkan Alasan dalam peminjaman ruang </textarea>
    <br>

    <div class="container p-0">
        <h3>Upload your File :</h3>
        <div class="drag-area">
            <div class="icon">
                <i class="fas fa-images"></i>
            </div>

            <span class="header">Drag & Drop</span>
            <span class="header">or <span class="button">browse</span></span>
            <input type="file" hidden />
            <span class="support">Supports: JPEG, JPG, PNG</span>
        </div>
        <br><br>
    <button type="submit" class="btn btn-primary mb-5" name="submit">Ajukan</button>
</form>
</div>


<script>
    const dropArea = document.querySelector('.drag-area');
    const dragText = document.querySelector('.header');

    let button = dropArea.querySelector('.button');
    let input = dropArea.querySelector('input');

    let file;

    button.onclick = () => {
        input.click();
    };

    input.addEventListener('change', function () {
        file = this.files[0];
        dropArea.classList.add('active');
        displayFile();
    });

    dropArea.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropArea.classList.add('active');
        dragText.textContent = 'Release to Upload';
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('active');
        dragText.textContent = 'Drag & Drop';
    });

    // when file is dropped
    dropArea.addEventListener('drop', (event) => {
        event.preventDefault();
        // console.log('File is dropped in drag area');
        file = event.dataTransfer.files[0]; 
        // console.log(file);
        displayFile();
    });

    function displayFile() {
        let fileType = file.type;
        let validExtensions = ['image/jpeg', 'image/jpg', 'image/png'];
        if (validExtensions.includes(fileType)) {
            let fileReader = new FileReader();
            fileReader.onload = () => {
                let fileURL = fileReader.result;
                let imgTag = `<img src="${fileURL}" alt="">`;
                dropArea.innerHTML = imgTag;
            };
            fileReader.readAsDataURL(file);
        } else {
            alert('This is not an Image File');
            dropArea.classList.remove('active');
        }
    }
</script>
</body>
</html>
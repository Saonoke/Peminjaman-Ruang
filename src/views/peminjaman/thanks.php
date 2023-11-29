<div class="cover">
<div class="main">

            <div class="flex-container d-flex  justify-content-center ">
                <div class = "jti">
                     <img class="Image1" src="<?= BASEURL ?>/image/JTI.png" />
                </div>
                    <div class="teks">
                    <div class="TerimaKasih" style="align-self: stretch; color: #2D2E2E; font-size: 50px; font-weight: 600; word-wrap: break-word">
                        Terima Kasih !
                        <div style="align-self: stretch; color: #2D2E2E; font-size: 16px; font-weight: 400; line-height: 22px; word-wrap: break-word">
                        Peminjaman anda dalam proses, anda dapat mengecek dalam menu Status
                        <br><br>
                        <a href="<?= BASEURL ?>" class="btn btn-primary">Home</a>
                        </div>
                </div>     
            </div>         
</div>
</div>

<style>
    .btn-primary{
        --bs-btn-bg: #ffaa22!important;
        --bs-btn-border-width:0;

    }
    .btn{
        --bs-btn-padding-x: 1.5rem;
        --bs-btn-padding-y: 0.375rem;
    }

    .btn-primary:hover{
        --bs-btn-hover-bg: none!important;
        --bs-btn-border-width:1px;
        --bs-btn-hover-border-color:#ffaa22!important;
        color: #ffaa22;
    }
    body{
        background-color: whitesmoke;
    }
    .jti{
        margin-top: 150px;
        margin-right: 100px;
    }
    .teks{
        margin-top: 220px;
    }
    .cover{
        width: 100%;
        height: 100vh;
    }
    .main{
        
        height:100%;
        width: 100%;
        background-image: url('../image/bawah.png');
        background-size: cover;
        background-repeat: no-repeat;
  background-position: center;
    }
</style>
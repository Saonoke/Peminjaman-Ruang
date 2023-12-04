<div class="cover-peminjaman">
<div class="main">
  
<div class="d-flex justify-content-around align-self-center" style="padding-top : 150px">

<a href="<?= BASEURL ?>/peminjaman/status">
    
    <div class="Gambar1" style="width: 546px; height: 414px; position: relative">
            <div class="Subtitle" style="width: 536px; left: 5px; top: 380px; position: absolute; opacity: 0.50; text-align: center; color: black; font-size: 14px; font-weight: 400; line-height: 24px; word-wrap: break-word">Lihat status untuk mengetahui status peminjaman</div>
            <div class="Title" style="width: 536px; left: 5px; top: 351px; position: absolute; text-align: center; color: black; font-size: 16px;  font-weight: 400; line-height: 24px; word-wrap: break-word">Lihat Status</div>
            <img class="Image1" src="<?= BASEURL ?>/image/gambarStatus.png"  style="width: 536px; height: 334.62px; left: 5px; top: 5px; position: absolute; border-radius: 13px" />
            <div class="Rectangle" style="width: 546px; height: 346px; left: 0px; top: 0px; position: absolute; border-radius: 9px; border: 5px #F2F5FD solid"></div>
        </div>

</a>  
    
<a href="<?= BASEURL ?>/peminjaman/ruang">

<div class="Gambar2" style="width: 546px; height: 414px; position: relative">
        <div class="Subtitle" style="width: 536px; left: 5px; top: 380px; position: absolute; opacity: 0.50; text-align: center; color: black; font-size: 14px; font-weight: 400; line-height: 24px; word-wrap: break-word">Isi List untuk mengisi data pemninjam ruang</div>
        <div class="Title" style="width: 536px; left: 5px; top: 351px; position: absolute; text-align: center; color: black; font-size: 16px;  font-weight: 400; line-height: 24px; word-wrap: break-word">Pinjam Ruang</div>
        <img class="Image1" src="<?= BASEURL ?>/image/gambarPinjam.png" style="width: 536px; height: 334.62px; left: 5px; top: 5px; position: absolute; border-radius: 13px" />
        <div class="Rectangle" style="width: 546px; height: 346px; left: 0px; top: 0px; position: absolute; border-radius: 9px; border: 5px #F2F5FD solid"></div>
    </div>
</a>
   



</div>
    
    
    
</div>
</div>
<style>
    body{
        background-color: whitesmoke;
    }
    .cover-peminjaman{
        width: 100%;
        height: 100vh;
    }
    .main{
        
        height:100%;
        width: 100%;
        background-image: url('../image/bawahUngu.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .Gambar1:hover,
    .Gambar2:hover {
        transform: scale(1.05); 
        transition: transform 0.3s ease; 
    }

    .Subtitle,
    .Title {
        transition: opacity 0.3s ease; 
    }

    .Gambar1:hover .Subtitle,
    .Gambar1:hover .Title,
    .Gambar2:hover .Subtitle,
    .Gambar2:hover .Title {
        opacity: 1; 
    }

</style>





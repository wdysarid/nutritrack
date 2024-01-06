<?php $this->load->view($header);?>
<!-- Navbar -->
<?php $this->load->view($navbar);?>
      <!--Artikel-->
      <style>
  header h1 {
    font-size: 24px; /* Sesuaikan ukuran font dalam piksel sesuai keinginan Anda */
    margin-bottom: 5px; /* Sesuaikan margin bottom dalam piksel sesuai keinginan Anda */
  }
</style>
<header>
    <h1>Artikel </h1>     
</header >
    <div class="container" id="artikel" >
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card mb-3" style="background-color: #a8debd" >
                <img src="<?php echo base_url().'assets/img/mknsehat.jpg';?>" alt=" " class="card-img-top">
                <div class="card-body">
                <h5 class="card-title" style="font-size: 20px; font-weight: bold;">Manfaat Menkonsumsi Makanan Sehat</h5>
                    <p class="card-text">Makanan sehat untuk tubuh memiliki manfaat yang luar biasa. Tubuh memerlukan berbagai
                         asupan untuk menunjang kinerja organ tubuh dan kesehatan menjadi lebih baik. Makanan sehat merupakan 
                         makanan yang mengandung unsur-unsur yang dibutuhkan tubuh. </p>
                    <button class="btn btn-primary btn-lg btn-block" onclick="artikel1()">Read More</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
                <div class="card mb-3" style="background-color: #a8debd">
                    <img src="<?php echo base_url().'assets/img/polasehat.jpg';?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 20px; font-weight: bold;">Tips Menjaga Pola Hidup Sehat</h5>
                        <p class="card-text">Pola hidup sehat merupakan suatu kebutuhan yang tidak dapat ditinggalkan oleh seluruh orang. Serta pola hidup ini menjadi tren pada masa sekarang ini. Hal ini dikarenakan pada jaman ini semakin banyak timbul penyakit – penyakit baru.</p>
                        <button class="btn btn-primary btn-lg btn-block" onclick="artikel2()">Read More</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3" style="background-color: #a8debd">
                <img src="<?php echo base_url().'assets/img/alergimkn.jpg';?>" class="card-img-top" alt="...">
                    <img src="images/artikel.jpg" class="card-img-top" alt=" ">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 20px; font-weight: bold;">Penyebab Alergi Makanan</h5>
                        <p class="card-text">Alergi makanan adalah kondisi saat sistem kekebalan tubuh secara keliru menganggap suatu zat seperti protein dalam makanan tertentu berbahaya bagi tubuh. Akibatnya, sistem kekebalan tubuh akan bereaksi terhadap zat makanan yang tergolong berbahaya tersebut.</p>
                        <button class="btn btn-primary btn-lg btn-block" onclick="artikel3()">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <!-- Akhir Artikel -->

    <!-- About-->
<header>
    <h1>About Website</h1>
</header>
    <div class="card-container" id="about">
      <div class="custom-card" style="background-color: #9ED2BE">
      <div class="text-center">
          <h2>Catatan Nutrisi</h2>
          <p>Sistem pencatatan nutrisi, "NutriTrack" merupakan sistem yang melacak 
        asupan nutrisi harian pengguna dan mengelola pola makan secara efektif. Selain itu, 
        Nutritrack juga menyediakan beberapa artikel terkait kesehatan nutrisi. Sistem 
        pencatatan nutrisi ini memungkinkan masyarakat umum sebagai member dengan 
        berbagai latar belakang dan gaya hidup untuk dengan mudah mencatat asupan 
        nutrisi mereka setiap harinya. Sistem ini berfungsi sebagai jurnal nutrisi pribadi 
        yang membantu member memahami lebih banyak tentang pola makan mereka. 
        Selain itu, sistem ini juga menyediakan ringkasan asupan nutrisi dan rekomendasi 
        nutrisi yang dibutuhkan. Dengan sistem ini, member dapat memantau 
        perkembangan nutrisi mereka seiring waktu, memberikan pemahaman yang lebih 
        baik tentang kebutuhan nutrisi individu. Admin, sebagai pengelola sistem, memiliki 
        tanggung jawab untuk memantau aktivitas member dalam sistem dan mengelola 
        opsi menu pilihan makanan yang mencakup informasi seputar kalori, karbohidrat, 
        protein, dan lemak agar member dapat dengan mudah memilih makanan yang ingin 
        dikonsumsi tanpa perlu melakukan penginputan secara manual.
        Member dalam konteks aplikasi pencatatan nutrisi ini, dapat secara aktif 
        berpartisipasi dalam pemantauan dan perbaikan kebiasaan makan mereka, sehingga 
        dapat mencapai kondisi kesehatan yang lebih baik. Admin sebagai pemegang 
        kendali aplikasi berperan sebagai fasilitator dalam memastikan pengguna 
        mendapatkan informasi nutrisi yang akurat dan relevan untuk mencapai tujuan 
        kesehatan mereka.</p>
      </div>
  </div>
  </div>
  <!-- Akhir About -->

  <!-- Benefits -->
  <hr class="footer">
  <div class="container">
      <div class="row footer-body">
          <div class="col-md-6">
          </div>
      </div>
  </div>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Website Benefits</title>
  
</head>
<body>

  <header>
      <h1>Website Benefits</h1>
  </header>

  <div class="card-container" id="benefit" >
      <div class="card">
          <h2>Dapat Melakukan Pencatatan Makanan</h2>
          <p>Dapat mencatatat makanan yang anda konsumsi perhari, seperti nama makanan, dan berapa jumlah konsumsi makanan tersebut.</p>
      </div>

      <div class="card">
          <h2>Dapat Melihat Artikel Kesehatan</h2>
          <p>Anda dapat melihat artikel sesuai dengan yang anda catat sebelumnya ataupun artikel yang terkait dengan kesehatan.</p>
      </div>

      <div class="card">
          <h2>Dapat Melakukan Pencatatan Aktivitas</h2>
          <p>Anda dapat mencatat aktivitas yang anda lakukan perhari seperti nama aktivitas, jam mulai, jam selesai dan lama aktivitas yang anda lakukan.</p>
      </div>
  </div>
      <!-- Akhir benefits -->
<?php $this->load->view($footer);?>
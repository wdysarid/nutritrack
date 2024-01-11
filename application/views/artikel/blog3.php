<?php $this->load->view($headerblog);?>
<?php $this->load->view($navbarblog);?>
<main id="main">

<!-- Blog Details Page Title & Breadcrumbs -->
<div data-aos="fade" class="page-title">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Artikel Details</h1>
          <p class="mb-0">Penyebab Alergi Makananan</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">Blog Details</li>
      </ol>
    </div>
  </nav>
</div><!-- End Page Title -->

<!-- Blog-details Section - Blog Details Page -->
<section id="blog-details" class="blog-details">

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-5">

      <div class="col-lg-10">

        <article class="article">

          <div class="post-img">
            <img src="<?=base_url('assets1/img/blog/alergy.jpg')?>" alt="" class="img-fluid">
          </div>
          <a href="<?=base_url('clandingpg/blog3')?>">Penyebab Alergi Makanan</a>

          <div class="meta-top">
            <ul>
              <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                  href="<?=base_url('')?>">Sasmitha Putri</a></li>
              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="<?=base_url()?>"><time
                    datetime="2020-01-01">Januari 1, 2022</time></a></li>
              <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="<?=base_url()?>">12
                  Comments</a></li>
            </ul>
          </div><!-- End meta top -->

          <div class="content">

            <blockquote>
              <p>
                Alergi makanan adalah kondisi saat sistem kekebalan tubuh secara keliru menganggap suatu zat seperti
                protein dalam makanan tertentu berbahaya bagi tubuh.
                Akibatnya, sistem kekebalan tubuh akan bereaksi terhadap zat makanan yang tergolong berbahaya
                tersebut, atau alergen. Bahkan sejumlah kecil makanan penyebab
                alergi dapat memicu tanda dan gejala seperti masalah pencernaan, gatal-gatal atau saluran udara
                bengkak.
              </p>
            </blockquote>

            <p>
              Pada sebagian orang, alergi ini dapat menyebabkan gejala parah atau bahkan reaksi yang mengancam jiwa
              yang bernama anafilaksis. Selain itu, kondisi ini dapat bersifat
              akut atau tiba-tiba, tetapi dapat juga bersifat kronis atau berlangsung dalam waktu yang lama.
            </p>

            <p>
              Alergi makanan sering kali tertukar dengan kondisi kesehatan lain yaitu intoleransi makanan. Meski
              begitu, keduanya merupakan kondisi kesehatan yang berbeda. Sebab intoleransi
              makanan merupakan reaksi dari sistem pencernaan. Tidak ada kaitannya dengan antibodi seperti alergi
              pada makanan.
            </p>

            <p>
              Tak sedikit orang yang kesulitan menemukan penyebab alergi yang mereka alami. Namun, kondisi tersebut
              biasanya terjadi akibat hal berikut:
            </p>


            <h3>1. Sistem kekebalan tubuh</h3>
            <p>
              Antibodi adalah protein khusus yang diproduksi oleh sistem kekebalan untuk melindungi tubuh. Nah,
              antibodi bekerja dengan mengidentifikasi
              potensi berbahaya yang mengancam tubuh, seperti bakteri dan virus. Tugas antibodi memberi sinyal ke
              sistem kekebalan untuk melepaskan bahan
              kimia untuk membunuh ancaman dan mencegah penyebaran infeksi.
            </p>
            <p>
              Pada jenis alergi yang paling umum, antibodi yang dikenal sebagai imunoglobulin E (IgE), secara keliru
              menargetkan protein tertentu yang ada dalam makanan sebagai ancaman. IgE dapat
              menyebabkan beberapa bahan kimia terlepas, yang paling penting adalah histamin.
            </p>

            <h3>2. Alergi yang tidak diperantarai IgE</h3>
            <p>
              Salah satu jenis alergi makanan lainnya alergi pada makanan yang tidak diperantarai IgE, yang terjadi
              karena oleh sel-sel yang berbeda dalam sistem kekebalan tubuh. Kondisi ini jauh lebih
              sulit untuk dokter diagnosis karena tidak ada tes yang akurat untuk mengkonfirmasi alergi pada makanan
              yang tidak diperantarai IgE.Jenis reaksi ini sebagian besar terbatas pada kulit dan sistem
              pencernaan, menyebabkan gejala seperti mulas, gangguan pencernaan dan eksim. Pada bayi, alergi pada
              makanan yang tidak diperantarai IgE juga dapat menyebabkan diare dan refluks, di mana asam lambung
              naik ke tenggorokan.
            </p>

            <h3>3. Makanan tertentu</h3>
            <p>
              Pada anak-anak, makanan yang paling sering menyebabkan reaksi alergi adalah telur, susu dan produk
              turunannya, kedelai, gandum serta kacang-kacangan. Pada orang dewasa, makanan yang sering menyebabkan
              reaksi alergi adalah kacang-kacangan,
              ikan, dan seafood.
            </p>

          </div><!-- End post content -->

        </article><!-- End post article -->

        <div class="col-lg-6">

          <div class="sidebar">

            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Search</h3>
              <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Kategori</h3>
              <ul class="mt-3">
                <li><a href="#">Kesehatan <span>(25)</span></a></li>
                <li><a href="#">Nutrisi <span>(12)</span></a></li>
                <li><a href="#">Gizi <span>(5)</span></a></li>
                <li><a href="#">Hidup Sehat <span>(22)</span></a></li>
                <li><a href="#">Aktivitas <span>(8)</span></a></li>
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Recent Posts</h3>

              <div class="post-item">
                <img src="<?=base_url('assets1/img/blog/makanansehat.jpg')?>" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="<?=base_url('clandingpg/blog')?>">Manfaat Menkonsumsi Makanan Sehat</a></h4>
                  <time datetime="2020-01-01">Jan 1, 2020</time>
                </div>
              </div><!-- End recent post item-->

              <div class="post-item">
                <img src="<?=base_url('assets1/img/blog/polasehat.jpg')?>" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="<?=base_url('clandingpg/blog2')?>">Tips Menjaga Pola Hidup Sehat</a></h4>
                  <time datetime="2022-01-07">Jan 7, 2022</time>
                </div>
              </div><!-- End recent post item-->
            </div><!-- End sidebar recent posts-->
          </div><!-- End Sidebar -->

        </div>

      </div>

    </div>

</section><!-- End Blog-details Section -->

</main>
<?php $this->load->view($footerblog);?>
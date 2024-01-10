<?php $this->load->view($headerblog);?>
<?php $this->load->view($navbarblog);?>

<main id="main">
	<!-- Blog Details Page Title & Breadcrumbs -->
	<div data-aos="fade" class="page-title">
		<div class="heading">
			<div class="container">
				<div class="row d-flex justify-content-center text-center">
					<div class="col-lg-8">
						<h1>Menu Artikel</h1>
						<p class="mb-0">Manfaat Mengonsumsi Makanan Sehat</p>
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
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="sidebar">
                <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title"></h3>

                    
                    <div class="row">
                        <!-- kolom kiri -->
                        <div class="col-md-6">
                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/alergy.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog3')?>">Penyebab Alergi Makanan</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/alergy.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog3')?>">Penyebab Alergi Makanan</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/alergy.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog3')?>">Penyebab Alergi Makanan</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->
                            
                        </div>  <!-- akhir kolom kiri -->
                    
                   
                        <!-- kolom kanan -->
                        <div class="col-md-6">
                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/polasehat.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog2')?>">Tips Menjaga Pola Hidup Sehat</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/polasehat.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog2')?>">Tips Menjaga Pola Hidup Sehat</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="<?=base_url('assets1/img/blog/polasehat.jpg')?>" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="<?=base_url('clandingpg/blog2')?>">Tips Menjaga Pola Hidup Sehat</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->
                        <!-- </div> akhir kolom kanan -->
                    </div><!-- End row --> 


                </div><!-- End sidebar recent posts-->
            </div><!-- End Sidebar -->
        </div>
    </div>
</div>

	

	</section><!-- End Blog-details Section -->

</main>
<?php $this->load->view($footerblog);?>

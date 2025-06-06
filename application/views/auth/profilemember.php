<?php $this->load->view($header);?>
<?php $this->load->view($navbar);?>

<?php $this->load->view($sidebar);?>
<main id="main" class="main" style="margin-top:60px;">

	<div class="pagetitle">
		<h1>Profile</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url('cmember') ?>">Home</a></li>
				<li class="breadcrumb-item">Member</li>
				<li class="breadcrumb-item active">Profile</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section profile">
		<div class="row">
			<div class="col-xl-4">

				<div class="card">
					<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
						<?php
                  foreach(
                    $member as $key
                  ):
                  ?>
						<?php
                  if(empty($key['foto_member'])):
                  ?>
						<img src="<?=base_url('assets/img/profile-img.jpg')?>" alt="Profile" class="rounded-circle">
						<?php else:?>
						    <img src="<?= base_url('assets/imgmember/' . $key['foto_member']) ?>" alt="Silahkan tambahkan foto anda!">
						<?php
                endif;?>

						<h2><?= $key['nama_lengkap']?></h2>
						<h3><?= $key['username']?></h3>

						<div class="social-links mt-2">
							<a href="https://twitter.com/" class="twitter" target="_blank"><i class="bi bi-twitter"></i></a>
							<a href="https://facebook.com/" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
							<a href="https://instagram.com/<?= $key['username']?>" class="instagram" target="_blank"><i
									class="bi bi-instagram"></i></a>
							<a href="https://linkedin.com/in/" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></a>
						</div>
						<?php endforeach;?>
					</div>
				</div>

			</div>

			<div class="col-xl-8">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile
									Member</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti
									Password</button>
							</li>

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">
								<!-- Change Password Form -->
								<?php
                $pesan = $this->session->flashdata('pesan');
                if(isset($pesan)){
                    echo '<div class="alert alert-success alert-dismissible fade show mt-3 rounded-2 mx-4" role="alert">
                    '.$pesan.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                $this->session->unset_userdata('pesan');
				}

				$error = $this->session->flashdata('error');
                if(isset($error)){
                    echo '<div class="alert alert-danger alert-dismissible fade show mt-3 rounded-2 mx-4" role="alert">
                    '.$error.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                $this->session->unset_userdata('error');
                }
            ?>
								<?php
                  foreach(
                    $member as $key
                  ):
                  ?>
								<h5 class="card-title">Detail Profil</h5>
								<div class="row">
									<div class="col-md-6 text-center">
										<img src="<?= base_url('assets/imgmember/' . $key['foto_member']) ?>"
											class="img-fluid w-50 d-block">
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Username</div>
									<div class="col-lg-9 col-md-8"><?= $key['username']?></div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
									<div class="col-lg-9 col-md-8"><?= $key['nama_lengkap']?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
									<div class="col-lg-9 col-md-8"><?= date('d F Y', strtotime($key['tgl_lahir'])) ?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Usia</div>
									<div class="col-lg-9 col-md-8"><?= $key['usia']?> tahun</div>
								</div>
								
								<div class="row">
									<div class="col-lg-3 col-md-4 label">Berat Badan</div>
									<div class="col-lg-9 col-md-8"><?= $key['berat_badan']?> kg</div>
								</div>
								
								<div class="row">
									<div class="col-lg-3 col-md-4 label">Tinggi Badan</div>
									<div class="col-lg-9 col-md-8"><?= $key['tinggi_badan']?> cm</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
									<div class="col-lg-9 col-md-8"><?= $key['jenis_kelamin']?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Aktivitas</div>
									<div class="col-lg-9 col-md-8"><?= $key['aktivitas']?></div>
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Email</div>
									<div class="col-lg-9 col-md-8"><?= $key['email']?></div>
								</div>
								<?php endforeach;?>
							</div>

							<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
								<!-- Profile Edit Form -->
								<?php
                  foreach(
                    $member as $key
                  ):
                  ?>
								<form action="<?= base_url('cmember/editprofilemember')?>" method="post" enctype="multipart/form-data">
									<input type="hidden" name="id_member" value="<?=$key['id_member']?>">
									<div class="row mb-3">
										<label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
										<div class="col-md-8 col-lg-9">
											<img src="<?= base_url('assets/imgmember/' . $key['foto_member']) ?>"
												alt="Silahkan tambahkan foto anda!">

											<div class="pt-2">
												<input type="file" accept="image/png, image/jpeg, image/jpg" name="foto_member">
											</div>
										</div>
									</div>
									<input type="hidden" name="id_member" value="<?=$key['id_member']?>">
									<div class="row mb-3">
										<label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
										<div class="col-md-8 col-lg-9">
											<input name="username" type="text" class="form-control" id="username"
												value="<?=$key['username']?>"></input>
										</div>
									</div>

									<div class="row mb-3">
										<label for="nama_lengkap" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
										<div class="col-md-8 col-lg-9">
											<input name="nama_lengkap" type="text" class="form-control" id="nama_lengkap"
												value="<?=$key['nama_lengkap']?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="tgl_lahir" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
										<div class="col-md-8 col-lg-9">
											<input name="tgl_lahir" type="text" class="form-control" id="tgl_lahir"
												value="<?=$key['tgl_lahir']?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="usia" class="col-md-4 col-lg-3 col-form-label">Usia (tahun)</label>
										<div class="col-md-8 col-lg-9">
											<input name="usia" type="text" class="form-control" id="usia"
												value="<?=$key['usia']?>">
										</div>
									</div>

									<div class="row mb-3">
										<label for="berat_badan" class="col-md-4 col-lg-3 col-form-label">Berat Badan (kg)</label>
										<div class="col-md-8 col-lg-9">
											<input name="berat_badan" type="text" class="form-control" id="berat_badan"
												value="<?=$key['berat_badan']?>">
										</div>
									</div>

									
									<div class="row mb-3">
										<label for="tinggi_badan" class="col-md-4 col-lg-3 col-form-label">Tinggi Badan (cm)</label>
										<div class="col-md-8 col-lg-9">
											<input name="tinggi_badan" type="text" class="form-control" id="tinggi_badan"
												value="<?=$key['tinggi_badan']?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="jenis_kelamin" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
										<div class="col-md-8 col-lg-9">
											<input name="jenis_kelamin" type="text" class="form-control" id="jenis_kelamin"
												value="<?=$key['jenis_kelamin']?>">
										</div>
									</div>
									<div class="row mb-3">
										<label for="aktivitas" class="col-md-4 col-lg-3 col-form-label">Aktivitas</label>
										<div class="col-md-8 col-lg-9">
											<select name="aktivitas" class="form-control" id="aktivitas">
												<option value="" <?=$key['aktivitas']=="" ? "selected" : ""?>>Tidak Ada Aktivitas</option>
												<option value="sangat jarang berolahraga" <?=$key['aktivitas']=="sangat jarang berolahraga" ? "selected" : ""?>>Sangat jarang berolahraga</option>
												<option value="jarang olahraga" <?=$key['aktivitas']=="jarang olahraga" ? "selected" : ""?>>Jarang olahraga</option>
												<option value="cukup olahraga" <?=$key['aktivitas']=="cukup olahraga" ? "selected" : ""?>>Cukup olahraga</option>
												<option value="sering olahraga" <?=$key['aktivitas']=="sering olahraga" ? "selected" : ""?>>Sering olahraga</option>
												<option value="sangat sering olahraga" <?=$key['aktivitas']=="sangat sering olahraga" ? "selected" : ""?>>Sangat sering olahraga</option>
											</select>
										</div>
									</div>

									<div class="row mb-3">
										<label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
										<div class="col-md-8 col-lg-9">
											<input name="email" type="text" class="form-control" id="email" value="<?=$key['email']?>">
										</div>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form><!-- End Profile Edit Form -->
								<?php endforeach;?>
							</div>

							<div class="tab-pane fade pt-3" id="profile-change-password">
								<form method="post" action="<?php echo base_url('auth/change_password'); ?>">
									<div class="row mb-3">
										<label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
										<div class="col-md-8 col-lg-9">
											<input name="password" type="password" class="form-control" id="currentPassword">
										</div>
									</div>

									<div class="row mb-3">
										<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
										<div class="col-md-8 col-lg-9">
											<input name="newpassword" type="password" class="form-control" id="newPassword">
										</div>
									</div>

									<div class="row mb-3">
										<label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi password</label>
										<div class="col-md-8 col-lg-9">
											<input name="renewpassword" type="password" class="form-control" id="renewPassword">
										</div>
									</div>

									<div class="text-center">
										<button type="submit" class="btn btn-primary">Change Password</button>
									</div>
								</form>
								<!-- End Change Password Form -->


							</div>

						</div><!-- End Bordered Tabs -->

					</div>
				</div>

			</div>
		</div>
	</section>
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function () {
		$(".twitter, .facebook, .instagram, .linkedin").on("click", function (e) {
			e.preventDefault();
			var link = $(this).attr("href");
			window.open(link, "_blank");
		});
	});
    document.getElementById("aktivitas").addEventListener("change", function() {
        var aktivitasSelect = document.getElementById("aktivitas");
        var selectedValue = aktivitasSelect.options[aktivitasSelect.selectedIndex].value;

        if (selectedValue === "") {
            aktivitasSelect.setCustomValidity("Pilih aktivitas terlebih dahulu");
        } else {
            aktivitasSelect.setCustomValidity("");
        }
    });
</script>

<?php $this->load->view($footer);?>

<?php

/**
 * @Author: Eka Syahwan
 * @Date:   2017-04-18 21:21:18
 * @Modified by: Nikko Enggaliano & Muhammad Gholy
 * @Last Modified time: 2018-06-25
 */
require_once('../modules/modules.class.php');

require_once('../modules/db.class.php');

$Modules = new Modules;$Modules->isAdmin();

$Database = new Database;

if(isset($_SESSION['username']) == ""){

	header("Location: login.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<?= $Modules->header("Manage Flag");?>

</head>

<body>

	<div class="wrapper">

	<?= $Modules->slideMenu();?>

	<div class="main-panel">

		<!-- Head Navigator -->

		<nav class="navbar navbar-transparent navbar-absolute">

			<div class="container-fluid">

				<div class="navbar-minimize">

					<button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">

						<i class="material-icons visible-on-sidebar-regular">more_vert</i>

						<i class="material-icons visible-on-sidebar-mini">view_list</i>

					</button>

				</div>

				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse">

						<span class="sr-only">Toggle navigation</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

					</button>

				</div>

			</div>

		</nav>

		<!--End Head Navigator -->

		<div class="content">

			<div class="container-fluid">

            <?php

            if(@$_GET['_'] == "success"){

            	echo '<div class="alert alert-success">

                       <span>Sukses Update Data!</span>

                </div>';

            }?>

				<div class="row">

					<div class="col-md-12">

											<div class="card">

						<div class="card-header card-header-icon" data-background-color="green">

							<i class="material-icons">assignment</i>

						</div>

						<div class="card-content">

							<h4 class="card-title">Manage Flag</h4>

							<div class="row">

								<div class="col-md-12">

								<a href="tambahsoal" class="btn btn-rose" role="button">Tambah Soal</a>

									<div class="table-responsive table-sales">

										<table class="table">

											<tbody>

												<tr>

													<td>ID Soal</td>

													<td>Nama Soal</td>

													<td>Deskripsi</td>

													<td class="text-center">Kategori</td>

													<td class="text-center">score</td>

													<td class="text-center">Flag</td>

													<td class="text-center">Level</td>

													<td class="text-right">

														Actions

													</td>

												</tr>

												<?php

													$datarray = $Database->tampilkan_flag_list();

													foreach ($datarray as $key => $data) {?>

														<tr>

															<td><?= ($key+1); ?></td>

															<td><?= $data['nama_soal']; ?></td>

															<td><?php echo substr($data['deskripsi'],0,20);?> ...</td>

															<td class="text-center"><?=$data['kategori']?></td>

															<td class="text-right"><?= $data['score']; ?></td>

															<td><?php echo substr($data['flag'],0,40);?> ...</td>

															<td class="text-center"><?= $data['level']; ?></td>

															<td class="td-actions text-right">

																<a href="edit/<?= $data['id']; ?>/soal" class="btn btn-info" role="button"><i class="material-icons">edit</i></a>

																<a href="delete/<?= $data['id']; ?>/flag" class="btn btn-danger" role="button"><i class="material-icons">close</i></a>

															</td>

														</tr>

													<?php

													}

												?>

											</tbody>

										</table>

									</div>

								</div>

							</div>

						</div>

					</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	</div>



</div>

<?= $Modules->footer();?>

</body>

</html>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Penjualan <?php if ($tanggal_akhir == $tanggal_awal) {
					echo $tanggal_awal;
				} else if($tanggal_awal != NULL)
				{echo $tanggal_awal; echo" - "; echo $tanggal_akhir;} ?> </h2>
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix">
				</div>
			</div>

			<div class="x_content">
				<?php if($this->session->flashdata('inv_added')): ?>
                  <button id="melinda" style="display: none;" class="btn btn-default source" onclick="new PNotify({
                                  title: 'Berhasil',
                                  text: '<?php echo $this->session->flashdata('inv_added'); ?>',
                                  type: 'success',
                                  hide: false,
                                  styling: 'bootstrap3'
                              });">Success</button>
                 	</div>
                 	
				<?php endif; ?>

				<a href="<?php echo base_url('example/form_invoice') ?>"><button type="button" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-plus"></span> Tambah Penjualan </button></a>
				<form action="<?php echo base_url('example/table_invoice') ?>" method="post" id="searchForm">
					<div class="row">
						<div class="col-md-5">
							<div class='input-group date ' id='tanggal_awal'>
								<input type="text" name="tanggal_awal" id="tanggal_awal_input" class="form-control tanggal_awal" required="required" placeholder="Pilih tanggal awal">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="col-md-5">
							<div class='input-group date ' id='tanggal_akhir'>
								<input type="text" name="tanggal_akhir" id="tanggal_akhir_input" class="form-control tanggal_akhir" required="required" placeholder="Pilih tanggal akhir">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
							</div>
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn btn-success" style="margin-bottom: 13px"><span class="fa fa-search"></span> Cari </button>
						</div>
					</div>
				</form>
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Tanggal Transaksi</th>
							<th>No Referensi</th>
							<th>Nama Pembeli</th>
							<th>Banyak</th>
							<th>Total Penjualan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$total_grandtotal = 0;
						foreach($table_invoice as $i){ 
							$total_grandtotal += $i->grandtotal; ?>
						<tr>
							<td><?php echo date('j F Y',strtotime($i->tgl_beli)) ?></td>
							<td><?php echo $i->ref ?></td>
							<td><?php echo $i->nama_pembeli ?></td>

							
							<td><?php echo $i->banyak ?></td>
							<td>Rp <?php echo number_format($i->grandtotal) ?></td>
							
							<td style=" text-align: center;">
								<?php echo anchor('example/invoice_page/'.$i->ref, '<button class="btn btn-info btn-xs" type="button"><span class="fa fa-newspaper-o"></span></button>');?>
								
								<?php echo anchor('example/remove_inv/'.$i->ref, '<button class="btn btn-danger btn-xs" type="button"><span class="fa fa-trash"></span></button>');?>


					         </td>
						</tr>

						<?php } ?>
						<tr>
							<td colspan="4"><strong>Total Pemasukan</strong></td>
							<td colspan="2">Rp <?php echo number_format($total_grandtotal) ?></td>
						</tr>
					</tbody>

				</table>
		</div>
	</div>
	</div>

</div>



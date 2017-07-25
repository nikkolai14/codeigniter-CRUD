<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="wrapper">
				<a href="<?= site_url('crud/add_entry'); ?>" type="button" class="btn btn-default">Add Entry</a>
			</div>
		</div>
		<div class="col-md-12">
			<table class="table table-striped table-bordered">
			  <thead>
			  	<td>#</td>
			  	<td>Name</td>
			  	<td>Email</td>
			  	<td>Phone</td>
			  	<td>Created</td>
			  	<td>Actions</td>
			  </thead>
			  <tbody>
			  	<?php if ($records): ?>
					<?php for($i = 0; $i < count($records); $i++): ?>
						<tr>
							<?php foreach($records[$i] as $item): ?>
								<td><?= $item; ?></td>
							<?php endforeach; ?>
							<td>
								<?= $this->templates->view_edit_button(site_url('crud/edit_entry/' . $records[$i]['id'])); ?>
								<?= $this->templates->view_btn_divider(); ?>
								<?= $this->templates->view_delete_button(site_url('crud/delete_entry/' . $records[$i]['id'])); ?>
							</td>
						</tr>
					<?php endfor; ?>
	  			<?php else: ?>
	  				<tr><td colspan="6">No Records</td></tr>
  				<?php endif; ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
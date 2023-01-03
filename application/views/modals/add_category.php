<!-- Add Category Modal-->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('products/product_categories'); ?>" method="post">
					<div class="mb-3">
						<label for="category" class="form-label">Category</label>
						<input type="text" class="form-control" id="category" name="category" title="Enter new category" placeholder="Enter new category" value="<?= set_value('category') ?>">
						<?= form_error('category', '<small class="text-danger pl-1">', '</small>'); ?>
					</div>
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary btn-sm" type="submit">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>

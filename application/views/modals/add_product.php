<!-- Add Product Modal-->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('products/all_products'); ?>" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="category" class="form-label">Category</label>
						<select name="id_category" id="id_category" class="form-control" title="Choose category">
							<option value="">-- Choose category --</option>
							<?php foreach( $categories as $category ) : ?>
								<option value="<?= $category['id_category']; ?>"><?= $category['category']; ?></option>
							<?php endforeach; ?>
						</select>
						<?= form_error('id_category', '<small class="text-danger pl-1">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<label for="product" class="form-label">Product</label>
						<input type="text" class="form-control" id="product" name="product" title="Enter new product" placeholder="Enter new product" value="<?= set_value('product') ?>">
						<?= form_error('product', '<small class="text-danger pl-1">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<label for="price" class="form-label">Price</label>
						<input type="number" class="form-control" id="price" name="price" title="Enter new price" placeholder="Enter new price" value="<?= set_value('price') ?>">
						<?= form_error('price', '<small class="text-danger pl-1">', '</small>'); ?>
					</div>
					<div class="mb-3">
						<label for="image" class="form-label">Image</label>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image" required>
							<label for="image" class="custom-file-label">Choose file</label>
						</div>
					</div>
					<div class="mb-3">
						<label for="status" class="form-label">Status</label>
						<select name="status" id="status" class="form-control" title="Choose status">
							<option value="1">Active</option>
							<option value="0">Non active</option>
						</select>
						<?= form_error('status', '<small class="text-danger pl-1">', '</small>'); ?>
					</div>
					<button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary btn-sm" type="submit">Add</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- summernote -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/post') ?>">Posts</a></li>
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Post Edit Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open() ?>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" value="<?= set_value('title', $post->title ) ?>">
                                        <b class="text-danger"><?= form_error('title'); ?></b>
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="tag">Tag</label>
                                        <?php $posttag=explode(',',$post->tag); ?>
										<select class="form-control" name="tag[]" multiple id="tag" required>
                                            <option value="<?= set_value('tag', $post->tag ) ?>">Select Tag</option>
                                            <?php if ($tag) {
                                                foreach ($tag as $t) { ?>
                                                    <option value="<?= $t->id ?>" <?= in_array($t->id,$posttag) ? "selected" : "" ?>><?= $t->name ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <b class="text-danger"><?= form_error('tag'); ?></b>
                                    </div>
                                </div>
								<div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="category">Category</label>
										<select class="form-control" name="category" id="category" required>
                                            <option value="">Select Category</option>
                                            <?php if ($category) {
                                                foreach ($category as $cat) { ?>
                                                    <option value="<?= $cat->id ?>" <?= $cat->id == $post->category ? "selected" : "" ?>><?= $cat->name ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <b class="text-danger"><?= form_error('category'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="summernote">Description</label>
                                        <textarea class="form-control" name="description" id="summernote" rows="30"><?= set_value('description', $post->description ) ?></textarea>
                                        <b class="text-danger"><?= form_error('description'); ?></b>
                                    </div>
                                </div>

								<div class="col-sm-10 pt-2">
                                    <label class="pl-4">
										<input type="checkbox" name="featured" value="1" <?= $post->featured == 1 ? "checked" : "" ?> > Featured
									</label> 
									<label class="pl-4">
										<input type="checkbox" name="popular" value="1" <?= $post->popular == 1 ? "checked" : "" ?> > Popular
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="latest" value="1" <?= $post->latest == 1 ? "checked" : "" ?> > Latest
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="trending" value="1" <?= $post->trending == 1 ? "checked" : "" ?> > Trending
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="spotlight" value="1" <?= $post->spotlight == 1 ? "checked" : "" ?> > Spotlight
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="editorial" value="1" <?= $post->editorial == 1 ? "checked" : "" ?> > Editorial
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="homemainnews" value="1" <?= $post->homemainnews == 1 ? "checked" : "" ?> > Home Main
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="homemainnewsslider" value="1" <?= $post->homemainnewsslider == 1 ? "checked" : "" ?> > Home Slider
									</label>
                                    <label class="">
										<input type="checkbox" name="homemorenews" value="1" <?= $post->homemorenews == 1 ? "checked" : "" ?> > Home More
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="catmainnews" value="1" <?= $post->catmainnews == 1 ? "checked" : "" ?> > Category Main
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="catmainnewsslider" value="1" <?= $post->catmainnewsslider == 1 ? "checked" : "" ?> > Category Slider
									</label>
                                    <label class="pl-4">
										<input type="checkbox" name="catmorenews" value="1" <?= $post->catmorenews == 1 ? "checked" : "" ?> > Category More
									</label>
                                </div>

								<div class="col-sm-2">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#image_modal">Add Image</button>
									<span class="image_show">
                                        <img src="<?= base_url('img/admin/media/thumb/'.$post->image) ?>" width="100%">
									</span>
									<input type="hidden" name="image" id="image_name" value="<?= $post->image ?>">
								</div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?= form_close() ?>
						
<div class="modal fade" id="image_modal" role="dialog">
    <div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Media</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php if($media){
					foreach($media as $m){ ?>
						<div class="col-2">
							<img src="<?= base_url('img/admin/media/thumb/'.$m->image) ?>" width="100%" onclick="add_to_post('<?= $m->image ?>')">
						</div>
					<?php } } ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
</div>
						
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    // Image Modal
	function add_to_post(i){
		$(".image_show").html('<img src="<?= base_url() ?>img/admin/media/thumb/'+i+'" width="100%">');
		$("#image_name").val(i);
		$('#image_modal').modal('hide'); 
	}

    // Summernote
    $(function () {
        $('#summernote').summernote({height: 200})
    })
</script>

<!-- Summernote -->
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
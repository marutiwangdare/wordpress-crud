<?php

function swrj_category_list()
{
    include_once(ROOTDIR.'includes/header.php');
    global $wpdb;
    $table_name = $wpdb->prefix . "categories";

    $rows = $wpdb->get_results("SELECT * from $table_name");
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;margin-left: -20px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo admin_url('admin.php?page=swrj_team_dashboard'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">categories </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
	<div class="content">
		<div class="container-fluid">

			<div class="row">
				<div class="col-12">
					<!--@include('admin.includes.alert-message')-->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card" style="max-width:none">
						<div class="card-header">
							<h3 class="card-title"></h3>

							<a href="<?php echo admin_url('admin.php?page=sinetiks_schools_create'); ?>">
								<button type="button" class="btn btn-primary float-left"><i class="fas fa-plus"></i> Add New</button>
							</a>
							
							<div class="card-tools">
							<form role="search" autocomplete="off" action="{{ url('admin/category') }}" method="get">
								<div class="input-group input-group-sm" style="width: 150px;">
								  <input type="text" name="search" class="form-control float-right" placeholder="Search" value="<?php $filters['search'] ?? '' ?>">
			  
								  <div class="input-group-append">
									<button type="submit" class="btn btn-default">
									  <i class="fas fa-search"></i>
									</button>
								  </div>
								</div>
							</form><!-- form -->
							
							  </div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							

							<table id="datatable" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                <?php foreach ($rows as $category) { ?>

									<tr>
										<td><?php echo $category->title; ?></td>
										<td>
											<div class="user-block">
												<img class="user-block img-circle img-bordered-sm" src="{{$category->image?url('public/images/category', $category->image):url('public/images/dummy/dummy.png')}}" alt="user image">
											</div>	
										</td>
										<td>
                                        <?php if($category->is_active){ ?>
											<div class="badge badge-success">Active</div>
                                        <?php }else{ ?>
											<div class="badge badge-danger">Inactive</div>
                                            <?php }?>
										</td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-default">Action</button>
												<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
												  <span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu" role="menu">
												  <a class="dropdown-item" href="<?php echo admin_url('admin.php?page=sinetiks_schools_update&id=' . $category->id); ?>">
													<i class="fas fa-pencil-alt"></i>&nbsp Edit
												  </a>
												 	<a class="dropdown-item" href="#">
														<form method="POST" action="<?php echo admin_url('admin.php?page=sinetiks_schools_update&id=' . $category->id); ?>" accept-charset="UTF-8">
															<input name="_method" type="hidden" value="DELETE">
															<button type="submit" style="background: transparent;border: none;padding: 0;">
																<i class="fas fa-trash" type="submit"></i>&nbsp Deactivate
															</button>
														</form>
												  </a>
												</div>
											  </div>
										</td>
									</tr>

                                    <?php }?>

								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Image</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
							
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<div class="float-right">
								
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->

    </div>
    <!-- /.content-wrapper -->



<?php
    include_once(ROOTDIR.'includes/footer.php');
}
?>
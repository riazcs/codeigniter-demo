<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:12 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>User Registration</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('front-end/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('front-end/css/bootstrap-theme.min.css') ?>">
	<script type="text/javascript" src="<?php echo base_url(); ?>front-end/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>front-end/js/bootstrap.min.js"></script>
	<!-- start: CSS -->
	<link id="bootstrap-style" href="front-end/css/bootstrap.min.css" rel="stylesheet">
	<link href="front-end/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="front-end/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="front-end/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="front-end/img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>Metro</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white warning-sign"></i>
							</a>
							
						</li>
						<!-- start: Notifications Dropdown -->
						
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						
							
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i>
								<?php echo $this->session->userdata('admin_name');?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="<?php echo base_url();?>logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url()?>dashboard"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a href="<?php echo base_url();?>add-student"><i class="icon-envelope"></i><span class="hidden-tablet"> Add Student</span></a></li>
						<li><a href="<?php echo base_url();?>manage-student"><i class="icon-tasks"></i><span class="hidden-tablet"> Manage Student</span></a></li>
						<li><a href="<?php echo base_url();?>edit-admin"><i class="icon-eye-open"></i><span class="hidden-tablet">Add Admin</span></a></li>
						<li><a href="<?php echo base_url();?>manage-admin"><i class="icon-eye-open"></i><span class="hidden-tablet"> Manage Admin</span></a></li>
						<li><a href="<?php echo base_url();?>crud-view"><i class="icon-eye-open"></i><span class="hidden-tablet"> Operations</span></a></li>
						<!-- <li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Catalog</span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Categories</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Products</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Tax Presets</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Inventory</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Reports</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Billings</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Locations/Warehouses</span></a></li>
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> People</span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Suppliers</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Customer</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> Users</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> User Roles</span></a></li>
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Settings</span></a>
							<ul>
								<li><a class="submenu" href="submenu.html"><i class="icon-file-alt"></i><span class="hidden-tablet"> General Setting</span></a></li>
								<li><a class="submenu" href="submenu2.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Currency Setting</span></a></li>
								<li><a class="submenu" href="submenu3.html"><i class="icon-file-alt"></i><span class="hidden-tablet">Activity Log</span></a></li>
								
							</ul>	
						</li>
						<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Update</span></a></li>
						
					</ul> -->
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="#" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<div class="box span12">
					
					 <div class="container">
	                    <h3>Employee Lists</h3>
	                       <div class="alert alert-success" style="display: none;">
		
	                    </div>
	                   <button id="btnAdd" class="btn btn-success">Add New</button>
	                      <table class="table table-bordered table-responsive" style="margin-top: 20px;">
		                 <thead>
			      <tr>
				<td>ID</td>
				<td>Employee Name</td>
				<td>Address</td>
				<td>Created at</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody id="showdata">
			
		       </tbody>
	         </table>
         </div>
		</div><!--/span-->
		<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	</div>
		
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        	<form id="myForm" action="" method="post" class="form-horizontal">
        		<input type="hidden" name="txtId" value="0">
        		<div class="form-group">
        			<label for="name" class="label-control col-md-4">Employee Name</label>
        			<div class="col-md-8">
        				<input type="text" name="txtEmployeeName" class="form-control">
        			</div>
        		</div>
        		<div class="form-group">
        			<label for="address" class="label-control col-md-4">Address</label>
        			<div class="col-md-8">
        				<textarea class="form-control" name="txtAddress"></textarea>
        			</div>
        		</div>
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(function(){
		showAllEmployee();
		//Add New
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Add New Employee');
			$('#myForm').attr('action', '<?php echo base_url() ?>employee/addEmployee');
		});
		$('#btnSave').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
			//validate form
			var empoyeeName = $('input[name=txtEmployeeName]');
			var address = $('textarea[name=txtAddress]');
			var result = '';
			if(empoyeeName.val()==''){
				empoyeeName.parent().parent().addClass('has-error');
			}else{
				empoyeeName.parent().parent().removeClass('has-error');
				result +='1';
			}
			if(address.val()==''){
				address.parent().parent().addClass('has-error');
			}else{
				address.parent().parent().removeClass('has-error');
				result +='2';
			}
			if(result=='12'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#myModal').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'added'
							}else if(response.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('Employee '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}
				});
			}
		});
		//edit
		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Edit Employee');
			$('#myForm').attr('action', '<?php echo base_url() ?>employee/updateEmployee');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url: '<?php echo base_url() ?>employee/editEmployee',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=txtEmployeeName]').val(data.employee_name);
					$('textarea[name=txtAddress]').val(data.address);
					$('input[name=txtId]').val(data.id);
				},
				error: function(){
					alert('Could not Edit Data');
				}
			});
		});
		//delete- 
		$('#showdata').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo base_url() ?>employee/deleteEmployee',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Employee Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});
		//function
		function showAllEmployee(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>employee/showAllEmployee',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
									'<td>'+data[i].id+'</td>'+
									'<td>'+data[i].employee_name+'</td>'+
									'<td>'+data[i].address+'</td>'+
									'<td>'+data[i].created_at+'</td>'+
									'<td>'+
										'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
										'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
									'</td>'+
							    '</tr>';
					}
					$('#showdata').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
	});
</script>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://bootstrapmaster.com/" alt="Bootstrap Themes">creativeLabs</a></span>
			<span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co/" alt="Bootstrap Admin Templates">Metro</a></span>
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="front-end/js/jquery-1.9.1.min.js"></script>
	<script src="front-end/js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="front-end/js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="front-end/js/jquery.ui.touch-punch.js"></script>
	
		<script src="front-end/js/modernizr.js"></script>
	
		<script src="front-end/js/bootstrap.min.js"></script>
	
		<script src="front-end/js/jquery.cookie.js"></script>
	
		<script src='front-end/js/fullcalendar.min.js'></script>
	
		<script src='front-end/js/jquery.dataTables.min.js'></script>

		<script src="front-end/js/excanvas.js"></script>
	<script src="front-end/js/jquery.flot.js"></script>
	<script src="front-end/js/jquery.flot.pie.js"></script>
	<script src="front-end/js/jquery.flot.stack.js"></script>
	<script src="front-end/js/jquery.flot.resize.min.js"></script>
	
		<script src="front-end/js/jquery.chosen.min.js"></script>
	
		<script src="front-end/js/jquery.uniform.min.js"></script>
		
		<script src="front-end/js/jquery.cleditor.min.js"></script>
	
		<script src="front-end/js/jquery.noty.js"></script>
	
		<script src="front-end/js/jquery.elfinder.min.js"></script>
	
		<script src="front-end/js/jquery.raty.min.js"></script>
	
		<script src="front-end/js/jquery.iphone.toggle.js"></script>
	
		<script src="front-end/js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="front-end/js/jquery.gritter.min.js"></script>
	
		<script src="front-end/js/jquery.imagesloaded.js"></script>
	
		<script src="front-end/js/jquery.masonry.min.js"></script>
	
		<script src="front-end/js/jquery.knob.modified.js"></script>
	
		<script src="front-end/js/jquery.sparkline.min.js"></script>
	
		<script src="front-end/js/counter.js"></script>
	
		<script src="front-end/js/retina.js"></script>

		<script src="front-end/js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:56:47 GMT -->
</html>

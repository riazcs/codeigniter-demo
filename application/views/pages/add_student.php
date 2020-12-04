
<html>
<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
</head>
<body>

	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>

		<div>



		</div>

		<div class="box-content">
			<form class="form-horizontal" action="<?php base_url();?>save-student" method="POST">
				<fieldset>

					<div class="control-group">
						<label class="control-label" for="date01">Student Name</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="date01" name="student_name" required="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Student Phone</label>
						<div class="controls">
							<input type="text" class="input-xlarge " id="date01" name="student_phone" required="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Student Roll</label>
						<div class="controls">
							<input type="text" class="input-xlarge " id="date01" name="student_roll" required="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"for="form-subject">Subject</label>
						<div class="form-group">
							<select class="input-xlarge" name="subject">
								<option value="">select</option>
								<option value="CSE">CSE</option>
								<option value="EEE">EEE</option>
								<option value="ME">ME</option>
								<option value="TE">TE</option>
								<option value="ETE">ETE</option>
								<option value="Pharmacy">Pharmacy</option>
							</select>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Division</label>
						<select class="input-xlarge" name="address" id="address" required>
							<option value="">No Selected</option>
							<?php 
							foreach ($admin_main_content as $row)
							{

								?>
								<option value="<?php echo $row->division_id;?>"><?php echo $row->division_name;?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="control-group">
						<label class="control-label"for="form-distict">Distict</label>
						<div class="form-group">
							<select class="input-xlarge" name="distict" id="sub_category">
								<option value="">No select</option>
							
							</select>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label"for="form-upozila">Upozila</label>
						<div class="form-group">
							<select class="input-xlarge" name="upozila" id="upozila">
								<option value="">No select</option>
							
							</select>

						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Year</label>
						<div class="controls">
							<input type="text" class="input-xlarge " id="date01" name="year" required="">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="date01">Registration Date</label>
						<div class="controls">
							<input type="date" class="input-xlarge" id="date01" name="registration" required="">
						</div>
					</div>						

					<div class="control-group">
						<label class="control-label" for="date01">Gender</label>
						<div class="controls">
							<select class="input-xlarge" name="sex">
								<option value="">Select</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>

						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="date01">Search Student Name</label>
						<div class="controls">
							<input type="text" id="myInput" class="form-control student_search ui-autocomplete-input input-xlarge" name="expense_name" placeholder="Search Student Name" autocomplete="off">

							<input type="hidden" class="input-xlarge " id="student_id" name="student_id">
							<button type="button" class="btn btn-primary"><span onclick="newElement()" class="addBtn">Add</span></button>
						</div>
					</div>
					<ul id="myUL">

					</ul>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Add student</button>
						<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			</form>   

		</div>
	</div>



					<!-- <div class="container">
						<br />
						<br />
						
						<br />
		
					</div> -->
				</body>
				</html>


				<script type="text/javascript">
				$(function() {
					$(".student_search").autocomplete({
						source: '<?php echo base_url()?>employee/searchStudent',
						minLength: 1,
						select: function(event, ui) {
							console.log(ui.item);
							$(".student_search").val(ui.item.label);
							$("#student_id").val(ui.item.student_id);

							return false;
						}
					});
				});

				$.ui.autocomplete.prototype._renderItem = function(ul, item) {
					var ab = String(item.label).replace(new RegExp('/^[a-z0-9_-]{3,16}$^/' + this.term), "<b>$&</b>");
					return $("<li></li>").data("item.autocomplete", item).append("<a>" + ab + "</a>").appendTo(ul);
				};

		</script>
				<!-- <form action="<?php echo base_url()?>sbmit-id" method="post">




					<ul id="myUL">

					</ul>
					<button type="submit" class="btn btn-primary"> Submit </button>
				</form> -->

		<script>
    // Create a "close" button and append it to each list item
    var myNodelist = document.getElementsByTagName("LI");
    var i;
    for (i = 0; i < myNodelist.length; i++) {
      // var span = document.createElement("SPAN");
      var span = document.createElement('<input type="text"  name="student_id[]"');
      // var txt = document.createTextNode("\u00D7");
      span.className = "close";
      // span.appendChild(txt);
      myNodelist[i].appendChild(span);
  }

 // Click on a close button to hide the current list item
 var close = document.getElementsByClassName("close");
 var i;
 for (i = 0; i < close.length; i++) {
 	close[i].onclick = function() {
 		var div = this.parentElement;
 		div.style.display = "none";
 	}
 }

 // Add a "checked" symbol when clicking on a list item
 var list = document.querySelector('ul');
 list.addEventListener('click', function(ev) {
 	if (ev.target.tagName === 'LI') {
 		ev.target.classList.toggle('checked');
 	}
 }, false);

 // Create a new list item when clicking on the "Add" button
 function newElement()
 {

  // var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var student_id = document.getElementById("student_id").value;
  $("ul").append('<li class="li_delete'+student_id+'">'+inputValue+'<input type="hidden" name="students_id[]" value="'+student_id+'"> <button type="button" class="btn btn-danger row_delete" onclick="delete_li('+student_id+')"><i class="fa fa-minus"></i></button></li>');
}


function delete_li(i){
	$('.li_delete'+i).remove();
}
</script>

<script type="text/javascript">
$(document).ready(function(){

	$('#address').change(function(){ 
		var id=$(this).val();
		$.ajax({
			url : "<?php echo site_url('admin/get_sub_category');?>",
			method : "POST",
			data : {id: id},
			async : true,
			dataType : 'json',
			success: function(data){

				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<option value='+data[i].distict_id+'>'+data[i].distict_name+'</option>';
				}
				$('#sub_category').html(html);

			}
		});
		return false;
	}); 

	$('#sub_category').change(function(){ 
		var id=$(this).val();
		$.ajax({
			url : "<?php echo site_url('admin/get_upozilla');?>",
			method : "POST",
			data : {id: id},
			async : true,
			dataType : 'json',
			success: function(data){

				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<option value='+data[i].upozilla_id+'>'+data[i].upozilla_name+'</option>';
				}
				$('#upozila').html(html);

			}
		});
		return false;
	}); 

});
</script>

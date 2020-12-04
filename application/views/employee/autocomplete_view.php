<html>
<head>
  <title>Autocomplete Search Box using Typeahead in Codeigniter</title>
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
  <div class="container">
    <br/> 
    <br />
    <h3 text-align="center">ADD STUDENT BY SEARCH</h3>
    <br />
    <div>

 <!-- <input type="text" id="myInput" name="search_box" id="search_box" class="form-control input-lg typeahead" placeholder="Search Here" />
 <button type="submit" class="btn btn-primary"><span onclick="newElement()" class="addBtn">Add</span></button> -->


 <div class="input-group">
  <input type="text" id="myInput" class="form-control student_search ui-autocomplete-input" name="student_name" placeholder="Search Student Name" autocomplete="off">
  <span class="input-group-addon"><i class="fa fa-search"></i></span>
  <input type="hidden" value="" id="student_id" name="student_id">
  <input type="hidden" value="" id="student_phone" name="student_phone">
  <!-- <button type="submit" class="btn btn-primary"><span onclick="newElement()" class="addBtn">Add</span></button> -->
</div>

</div>
</div>
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
     $("#student_phone").val(ui.item.student_phone);

     return false;
   }
 });
});

$.ui.autocomplete.prototype._renderItem = function(ul, item) {
  var ab = String(item.label).replace(new RegExp('/^[a-z0-9_-]{3,16}$^/' + this.term), "<b>$&</b>");
  return $("<li></li>").data("item.autocomplete", item).append("<a>" + ab + "</a>").appendTo(ul);
};

</script>
<form action="<?php echo base_url('admin/saveStudentId')?>" method="post">
 


  <ul id="myUL">

  </ul>
  <button type="submit" class="btn btn-primary"> Submit </button>


</form>
<button class="addcart btn btn-success btn-sm">Add To Cart</button>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Student ID </th>
     
      <th>Number</th>
      
      
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="detail_cart">

  </tbody>

</table>


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
  var x = 0;
  // var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var student_id = document.getElementById("student_id").value;
  $("ul").append('<li class="li_delete'+student_id+'">'+inputValue+'<input type="text" name="students_id[]" value="'+student_id+'"> <button type="button" class="btn btn-danger row_delete" onclick="delete_li('+student_id+')"><i class="fa fa-minus"></i></button></li>');
}
function delete_li(i){
  $('.li_delete'+i).remove();
}


//ADD to cart 

$(document).ready(function(){
  $('.addcart').click(function(){
    
    var student_id    = $('#student_id').val();
    var student_phone  = $('#student_phone').val();
   
    $.ajax({
      url : "<?php echo site_url('employee/add_to_cart');?>",
      method : "POST",
      data : {student_id: student_id,student_phone: student_phone},
      success: function(data){
        $('#detail_cart').html(data);
      }
    });
  });


  $('#detail_cart').load("<?php echo site_url('employee/load_cart');?>");


  $(document).on('click','.romove_cart',function(){
    
    var row_id=$(this).attr("student_id"); 
    $.ajax({
      url : "<?php echo site_url('employee/delete_cart');?>",
      method : "POST",
      data : {student_id : student_id,student_phone:student_phone},
      success :function(data){
        $('#detail_cart').html(data);
      }
    });
  });
});
</script>
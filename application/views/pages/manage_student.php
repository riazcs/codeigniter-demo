     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
        <div class="col-md-12">
          <div class="container-fluid"> 
         <form class="form-horizontal" action="<?php echo base_url('admin/search_keyword');?>" method="POST">
     
                     
          <div class="row">
             <div class="col-sm-4">
             <div class="form-group">
                <label for="form-uname">Student Name</label>
                <input type="text" name="student_name" placeholder="Student Full Name..." >
            </div>  

             </div>
                <div class="col-sm-4" >
                 <div class="form-group">
                <label for="form-phone">Student Phone</label>
                <input type="text" name="student_phone" placeholder="Student Phone..." >
            </div> 
                </div>
             <div class="col-sm-4" >
              <div class="form-group">
                <label for="form-roll">Student Roll</label>
                 <input type="text" name="student_roll" placeholder="Student Roll..." >
            </div>
           
             </div>
            <div class="col-sm-4" >
              <div class="form-group">
                <label for="form-roll">Address</label>
                 <input type="text" name="address" placeholder="Address..." >
            </div>
           
             </div>
               
               <div class="col-sm-4">
               <label for="form-subject">Subject</label>
                <div class="form-group">
                  <select class="" name="subject">
                  <option value="">Select</option>
                  <?php
                  // $value_unique = array_unique($all_admin_info);
                   foreach($all_admin_info as $value)
                   {
                    ?>
                   <option value="<?php echo $value->subject;?> "><?php echo $value->subject;?>
                    </option>'
                   <?php
                    }
                    ?>                 
                  </select>
                
                </div>
              </div>

              <div class="col-sm-4" >
              <div class="form-group">
                <label for="form-year">Year</label>
                 <input type="text" name="year" placeholder="Year..." >
            </div>
           
             </div>


             <div class="col-sm-4" >
              <div class="form-group">
                <label for="form-year">Start Registration Date</label>
                 <input type="date" name="registration" placeholder="Registration Date..." >
            </div>
           
             </div>
             <div class="col-sm-4" >
              <div class="form-group">
                <label for="form-year">Last Registration Date</label>
                 <input type="date" name="lregistration" placeholder="Registration Date..." >
            </div>
           
             </div>

             
              <div class="col-sm-4">
               <label for="form-subject">Admin</label>
                <div class="form-group">
                  <select class="" name="admin">
                  <option value="">Select</option>
                  <?php
                   foreach($all_admin_info as $value)
                   {
                    ?>
                   <option value="<?php echo $value->admin_name;?> "><?php echo $value->admin_name;?> </option>
                   <?php
                    }
                    ?>                 
                  </select>
                
                </div>
              </div>
              
            </div>

                  
              
           <button  type="submit" class="btn btn-primary" >Search</button>
            </form> 
           </div>
          </div> 
        
             
            


            

            


          <div class="box-content">
        <p>
          <?php

                     $message=$this->session->userdata('message');
                     if ($message) {
                      echo "<span class='alert alert-danger'>$message</span>";
                      $this->session->unset_userdata('message');
                      # code...
                     }

          ?>
        </p>
	<table class="table table-striped table-bordered ">
		<thead>
		<tr>
           <th>Student ID</th>
           <th>Student name</th>
           <th>Phone </th>
           <th>Roll</th>
           <th>Subject</th>
           <th>Address</th>
           <th>Year</th>
           <th>Registration Date</th>           
           <th>Gender</th>
           <th>Actions</th>
       </tr>
		</thead>
		<tbody>
      <?php

       foreach ($all_student_info as $value) {
         # code...
       

      ?>
           <tr>

            <td class="center"><?php echo $value->student_id?></td>
            <td class="center"><?php echo $value->student_name?></td>
            <td class="center"><?php echo $value->student_phone?></td>
            <td class="center"><?php echo $value->student_roll?></td>
            <td class="center"><?php echo $value->subject?></td>
            <td class="center"><?php echo $value->address?></td>
            <td class="center"><?php echo $value->year?></td>
            <td class="center"><?php echo $value->registration?></td>
            <td class="center"><?php echo $value->sex?></td>
            <td>
               <a class="btn btn-info" href="<?php echo base_url();?>edit-student/<?php 
                echo $value->student_id?>">
               	<i class="halflings-icon white edit"></i>
               </a>
               <a class="btn btn-danger" href="<?php echo base_url();?>delete-student/<?php 
                echo $value->student_id?>" id="delete">
               	<i class="halflings-icon white trash"></i>
               </a>
            </td>
           </tr>
           <?php 
            }

           ?>
		</tbody>
	 </table>
	</div>
  <?= $this->pagination->create_links();?>
  <style type="text/css">
    .btn a
   {
     background-color:#CCC;
     padding:10px;
  }

  </style>

  
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
	<table class="table table-striped table-bordered bootstrap-datatable datatable">
		<thead>
		<tr>
           <th>Admin ID</th>
           <th>Email Address</th>
           <th>Password </th>
           <th>Phone</th>
           <th>Image</th>
       </tr>
		</thead>
		<tbody>
      <?php

       foreach ($admin_main_content as $admin_v) {
         # code...

      ?>
           <tr>

            <td class="center"><?php echo $admin_v->admin_id?></td>
            <td class="center"><?php echo $admin_v->email_address?></td>
            <td class="center"><?php echo $admin_v->password?></td>
            <td class="center"><?php echo $admin_v->admin_phone?></td>
            <td class="center"> <img width='100px'src="<?php echo $admin_v->admin_image?>"></td>
            <!-- <td>
               <a class="btn btn-info" href="<?php echo base_url();?>edit-admin/<?php 
                echo $value->admin_id?>">
               	<i class="halflings-icon white edit"></i>
               </a>
               <a class="btn btn-danger" href="<?php echo base_url();?>delete-admin/<?php 
                echo $value->admin_id?>" id="delete">
               	<i class="halflings-icon white trash"></i>
               </a>
            </td> -->
           </tr>
           <?php 
            }

           ?>
		</tbody>
	 </table>
	</div>
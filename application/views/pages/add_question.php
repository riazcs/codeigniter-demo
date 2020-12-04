<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<form class="form-horizontal" action="<?php base_url();?>save-question" method="POST">
						  <fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Question</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="date01" name="question" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Answer</label>
							  <div class="controls">
								<input type="text" class="input-xlarge " id="date01" name="answer" required="">
							  </div>
							</div>
							

							<!-- <div class="control-group">
							  <label class="control-label" for="fileInput">File input</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file">
							  </div>
							</div>  -->         
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Question</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->
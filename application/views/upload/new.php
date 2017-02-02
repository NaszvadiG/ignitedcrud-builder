<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
   <div class="row" style="margin-left:30px; margin-right:30px;">
   		<div class="col-sm-12">
   		    <header class="panel-heading font-bold">New upload
   		    	<div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Order history information" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> 
   		       	 </div>
   		    </header>
   		    <section class="panel">
   		        
   		        <div class="panel-body">
   		        	<form  action="<?php echo site_url("admin/upload_test/do_upload"); ?>" method="post" enctype="multipart/form-data">
   		        		
   		        		<?php echo form_upload('userfile'); ?>

   		        		<button type="submit" class="btn btn-purplet btn-s-xs pull-right" id="">
   		        			    <i class="fa fa-check"></i> <strong>Save</strong>
   		        		</button>
   		        		
   		        		

   		        	</form>



   		        </div>
   		    </section>
   		</div>
   		
   </div>
</div>
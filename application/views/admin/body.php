
<!-- .vbox -->
<section id="content">
  <section class="vbox">
   

 <div class="head-outer">
      

      <div class="head" id="tidy">
        <div class="logo visible-lg visible-md">
       
        </div>

        <div class="logo-text">Ignited Crud Builder</div>
        <div class="menu-options pull-right" style="margin-top:20px;">
          <div class="btn btn-sm  btn-black" data-toggle="popover" data-html="true" data-placement="bottom" 
          data-content='<?php echo anchor('admin/profile','My Profile','attributs'); ?>
          <br/>
          <?php echo anchor('admin/login/logout', 'Logout', 'attributs'); ?>
          

          ' title="" data-original-title='<button type="button" class="close pull-right" data-dismiss="popover">&times;</button>Profile'> <i class="fa fa-user"></i>  <strong> <?php echo my_username(); ?></strong></div>

          

          
          

          </div>
      </div> <!-- end class head-->
  </div> <!-- end head-outer -->

    
  <!-- Actual content goes here took out wrapper -->
  <section class="scrollable " > 
    <section class="tab-content" 
      <section class="tab-pane active" id="basic">

        <!-- <div class="gap"></div> -->

            <!-- show the dashboard -->
            <div class="pmf-container" style="margin-left:auto; margin-right:auto;    ">
              <div class="row" style="margin-left:30px; margin-right:30px; ">
              <div class="col-sm-12">
                  
                      

                      <div class="panel-body">
                        
                        <div class="row " >
                          
                          <?php echo my_render_dashboard(); ?>

                          
                          <?php  $file_path = base_url("img/dashboard") . "/help.svg"; ?>

                         <!--  <a href="<?php echo site_url('admin/help'); ?>">
                            <div class="col-sm-2 my-pad-top">
                              <img class='img-responsive my-center' src='<?php echo $file_path; ?>' alt='image'>
                                 <div class="igs-label">Help</div>

                              
                            </div>
                          </a> -->
                          
                          
                        
                        
                      </div>
                 
              </div>
    
        </div>
      </div>




            <!-- show dashboard -->


            </div>
            



                     
        
          
        
            
            
        
              
  
 
<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">

    <!-- breadcrumb -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li class='active'><a href="<?php echo site_url('admin/upload_test'); ?>"><i class="fa fa-list-ul"></i> <?php echo ('New Upload'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end breadcrumb -->





    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">New upload
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Upload a new file" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">
                    <form action="<?php echo site_url("admin/upload_test/do_upload"); ?>" method="post" enctype="multipart/form-data">
                        <div class="igs-small">Please pick a file jpg,png,or gif</div>
                        <?php echo form_upload( 'userfile'); ?>
                        <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id=""> <i class="fa fa-check"></i> <strong>Upload</strong> </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
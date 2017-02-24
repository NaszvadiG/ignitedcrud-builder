<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
        <?php if($this->session->flashdata('msg')) {?>
                    
            <?php if($this->session->flashdata('type') =='0') { ?>
        
            <div class="alert alert-danger">
        
            <?php } else {?>
            <div class="alert alert-success">
                <?php } ?>
                <button type="button" class="close" data-dismiss="alert"><i class="fa fa-times"></i>
                </button> <i class="fa fa-ban-circle"></i>
                <?php echo $this->session->flashdata('msg');?>
            </div>
        <?php } ?>
        </div>
    </div>


    <?php $this->load->view('{{table}}/breadcrumb-edit'); ?>
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Edit {{table}}
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Edit {{table}}" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">
                    <form action="<?php echo site_url("admin/{{table}}/edit_{{table}}/$id"); ?>" method="post" enctype="multipart/form-data">
                        <?php foreach ($query->result() as $key): ?>
                        {{fields}}
                        
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-purplet btn-s-xs pull-right" id=""> <i class="fa fa-check"></i> <strong>Save</strong> </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
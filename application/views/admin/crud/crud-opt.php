<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;">

    <!-- breadcrumb -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li class='active'><a href="<?php echo site_url('admin/crud_generator'); ?>"><i class="fa fa-list-ul"></i> <?php echo ('Crud Generator'); ?></a>
                </li>
                <li class='active'><a href=""><i class="fa fa-list-ul"></i> <?php echo ('Column Type selection'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end breadcrumb -->

    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Table
                <?php echo $table; ?>
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Column Logic" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">
                    <form action="<?php echo site_url("admin/crud_generator/process_conds/$table"); ?>" method="post" enctype="multipart/form-data">
                        <?php foreach ($fields as $key) : ?>
                        <?php if($key->name != "id"): ?>
                        <div class="sup-contacts m-t">
                            <h3 class="purplet"><?php echo $key->name; ?> </h3>
                            <div class="form-group">
                                <select name="<?php echo $key->name; ?>" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="pmtext"> Plain Text</option>
                                    <option value="pmtextbox"> Text Box</option>
                                    <option value="pmdate"> Date</option>
                                    <option value="pmnumber"> Number</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Helper Instructions</label>
                                <div class="igs-small"></div>
                                <input name="<?php echo $key->name; ?>-helper" type="text" class="form-control" placeholder="Type here" data-toggle="tooltip" data-placement="top" value=""> </div>
                            <label>
                                <input type="checkbox" name="<?php echo $key->name ?>-check" value="1" /> Required?</label>
                            <br/> </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-purplet btn-s-xs pull-right m-t" id=""> <i class="fa fa-check"></i> <strong>Save and process information</strong> </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="gap"></div>
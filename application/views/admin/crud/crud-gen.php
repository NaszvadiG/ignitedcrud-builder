<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
    <!-- breadcrumb -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <!-- .breadcrumb -->
            <ul class="breadcrumb">
                <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard </a>
                </li>
                <li class='active'><a href="<?php echo site_url('admin/crud_generator'); ?>"><i class="fa fa-list-ul"></i> <?php echo ('Crud Generator'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end breadcrumb -->
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Crud generator
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Select a table" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">
                    <form action="<?php echo site_url('admin/crud_generator/get_fields'); ?>" method="post" enctype="multipart/form-data">
                        <div class="sup-box"><strong>Instructions</strong>  <br>
                            1. Open the database 'crud' through PHP My Admin <br/>
                            2. Create a new table prefixed with '<?php echo $prefix; ?>'  <br/>
                            3. Make sure you create one column called 'id' and make sure it is set to auto increment <br/>
                            4. Then just create any other columns you wish. <br/>
                            5. Once you're done choose the column types and conditional logic.


                        </div>


                        <div class="form-group">
                            <label>Please select a table to apply the crud generator on</label>
                            <div class="igs-small">If you don't see a table please create one in mysql admin, it needs to have one column called id and has to be auto increment!</div>
                            <select name="name" class="form-control">
                                <option value="0">Please select</option>
                                <?php foreach ($tables as $field): ?>
                                <option value="<?php echo $field; ?>">
                                    <?php echo $field; ?>
                                </option>
                                <?php endforeach; ?> </select>
                        </div>
                        <button type="submit" class="btn btn-purplet btn-s-xs pull-right m-t" id=""> <i class="fa fa-check"></i> <strong>Select</strong> </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
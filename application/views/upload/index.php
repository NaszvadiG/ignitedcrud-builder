<div class="pmf-container" style="margin-left:auto; margin-right:auto; margin-top:30px; min-height:800px;  ">
    <div class="row" style="margin-left:30px; margin-right:30px;">
        <div class="col-sm-12">
            <header class="panel-heading font-bold">Quick upload test
                <div class="pull-right btn btn-sm  btn-info btn-rounded" data-toggle="popover" data-html="true" data-placement="top" data-content="Upload test" title="" data-original-title="<button type=&quot;button&quot; class=&quot;close pull-right&quot; data-dismiss=&quot;popover&quot;>×</button>Info"> <i class="fa fa-question"></i> <strong></strong> </div>
            </header>
            <section class="panel">
                <div class="panel-body">
                    <?php echo anchor( 'admin/upload_test/new_view', 'new', 'attributs'); ?>
                    <?php echo br(2); ?>
                    <?php foreach ($query->result() as $key) 
                    {   echo $key->id; echo(" "); 
                        echo $key->filename; echo(" ");
                        echo $key->size; echo(" ");
                        echo $key->type; echo(" ");
                        echo my_pretty_date($key->last_ammended);
                        echo anchor("admin/upload_test/delete_file/$key->id", 'Delete', 'attributs');
                        echo br(); 
                    } ?> 
                </div>
            </section>
        </div>
    </div>
</div>


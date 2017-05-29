<div class="container">

    <?php echo form_open('colorpicker/editDB', array('id'=>'form-edit-colorpicker', 'class'=>'form-dialog-edit')); ?>

        <?php echo form_hidden('inf', "edit"); ?>
        <?php echo form_hidden('id', $colorpicker->id); ?>

        <?php echo validation_errors();?>

        <div id="msg"></div>

        <div class="form-group">
            <label class="control-label" for="titulo">*<?php echo lang('label_color_picker') ?></label>
            <input type="text" name="titulo" id="titulo" class="form-control required" placeholder="<?php echo lang('placeholder_color_picker') ?>" maxlength="100" value="<?php echo set_value('titulo', $colorpicker->titulo); ?>" />
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label" for="cor">*<?php echo lang('label_cor_text') ?></label>
                    <input type="text" name="cor" id="cor" class="form-control required colorpicker" value="<?php echo set_value('titulo', $colorpicker->cor); ?>" maxlength="7" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label" for="bg_cor">*<?php echo lang('label_bg_cor') ?></label>
                    <input type="text" name="bg_cor" id="bg_cor" class="form-control required colorpicker" value="<?php echo set_value('titulo', $colorpicker->bg_cor); ?>" maxlength="7" />
                </div>
            </div>
        </div>

    <?php echo form_close(); ?>

</div> <!-- /container -->

<script>
    $('.colorpicker').minicolors();
</script>
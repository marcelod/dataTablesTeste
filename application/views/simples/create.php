<div class="container">

    <?php echo form_open('simples/send', array('id'=>'form-create-simples', 'class'=>'form-dialog')); ?>

        <?php echo form_hidden('inf', "create"); ?>

        <?php echo validation_errors();?>

        <div id="msg"></div>

        <div class="form-group">
            <label class="control-label" for="titulo">*<?php echo lang('label_simples') ?></label>
            <input type="text" name="titulo" id="titulo" class="form-control required" placeholder="<?php echo lang('placeholder_simples') ?>" maxlength="255" value="<?php echo set_value('titulo'); ?>" />
        </div>

    <?php echo form_close(); ?>

</div> <!-- /container -->

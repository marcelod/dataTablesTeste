<div class="container">

    <?php echo form_open('simples/deleteRow', array('id'=>'form-delete-simples', 'class'=>'form-dialog-remove')); ?>

    <?php echo form_hidden('id', $simples->id); ?>

	<p>
        <?php echo sprintf(lang('confirm_delete_simples'), $simples->titulo); ?>
    </p>

    <?php echo form_close(); ?>

</div> <!-- /container -->

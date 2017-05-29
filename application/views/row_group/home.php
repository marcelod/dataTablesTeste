<div id="main">
  <?php echo cBreadcrumb($navigation); ?>

  <?php echo lineHeaderBt(lang('dt_row_group'), 'h3', false); ?>

  <?php echo form_open(); ?>

    <table id="simples" class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th><?php echo lang('label_agrupador'); ?></th>
          <th><?php echo lang('label_titulo'); ?></th>
          <!-- <th><span class="glyphicon glyphicon-cog"></span></th> -->
        </tr>
      </thead>
      <tbody></tbody>
    </table>

  <?php echo form_close(); ?>

</div>

<!-- MODALS -->
<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModelCreate" aria-hidden="true" data-backdrop="static"></div>
<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModelDelete" aria-hidden="true"></div>
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModelEdit" aria-hidden="true" data-backdrop="static"></div>
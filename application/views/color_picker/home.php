<div id="main">
  <?php echo cBreadcrumb($navigation); ?>

  <?php echo lineHeaderBt(lang('title_color_picker'), 'h3', false); ?>

  <?php echo form_open(); ?>

    <table id="color_picker" class="table table-striped table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th><?php echo lang('label_color_picker'); ?></th>
          <th><span class="glyphicon glyphicon-cog"></span></th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

  <?php echo form_close(); ?>

</div>

<!-- MODALS -->
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModelEdit" aria-hidden="true" data-backdrop="static"></div>
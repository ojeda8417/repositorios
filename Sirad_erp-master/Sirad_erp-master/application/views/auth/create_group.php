<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group");?>

      <p>
      		<label for="group_name">Nombre</label>
      		<input tyepe="text" name="group_name" id="group_name">
      </p>

      <p>
            <label for="description">Description</label>
      		<input tyepe="text" name="description" id="description">
      </p>

       <p>
            <label for="tipo">Tipo</label>
      		<input tyepe="text" name="tipo" id="tipo">
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'));?></p>

<?php echo form_close();?>
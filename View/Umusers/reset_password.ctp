<?php
echo $this->Form->create( "Umuser", array("id"=>"reset_password", "name"=>"reset_password", "class"=>"form-horizontal") );
?>
<div class="control-group">
<label class="control-label" for="prependedInput"> <?php  echo __("Password") ?>: </label>
  <div class="controls">
    <div class="input-prepend">
      <span class="add-on">@</span>
        <?php echo $this->Form->input("email", array("label"=>false,  "class"=>"span2"));?>
    </div>
  </div>
</div>


<div class="form-actions">
  <?php  echo $this->Form->submit( __("Send") , array( "div"=>false,  "class"=>"btn btn-primary" )) ?>
  <button type="reset" class="btn">Cancel</button>
</div>
<?php
echo $this->Form->end();
?>

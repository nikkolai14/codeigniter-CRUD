<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="wrapper">
        <a href="<?= site_url('crud'); ?>" type="button" class="btn btn-default">Back</a>
      </div>
    </div>
    <div class="col-md-12">
      <?php
        if ($add_success) {
          echo '<div class="alert alert-success" role="alert">Added Successfull!</div>';
        } 

        if ($error_field) {
          echo '<div class="alert alert-danger" role="alert">Please input required fields.</div>';   
        }
      ?>

      <div class="panel panel-default">
        <div class="panel-body">
          <?= form_open('crud/process_add_entry'); ?>
            <div class="form-group">
              <?php
                echo form_label('Name <span class="required-field">*</span>', 'name');

                $data = array(
                  'name' => 'name',
                  'id' => 'name',
                  'class' => 'form-control',
                  'value' => ($error_field) ? set_value('name') : ''
                );

                echo form_input($data);
              ?>
            </div>
            <div class="form-group">
              <?php
                echo form_label('Phone <span class="required-field">*</span>', 'phone');

                $data = array(
                  'name' => 'phone',
                  'id' => 'phone',
                  'class' => 'form-control',
                  'type' => 'number',
                  'value' => ($error_field) ? set_value('phone') : ''
                );

                echo form_input($data);
              ?>
            </div>
            <div class="form-group">
              <?php
                echo form_label('Email <span class="required-field">*</span>', 'email');

                $data = array(
                  'name' => 'email',
                  'id' => 'email',
                  'class' => 'form-control',
                  'type' => 'email',
                  'value' => ($error_field) ? set_value('email') : ''
                );

                echo form_input($data);
              ?>
            </div>
            <?php 

              echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary'));
            ?>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
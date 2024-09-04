<div class="wrap">
  <h1>Pablo's Plugin</h1>
  <?php settings_errors(); ?>

  <form method="post" action="options.php">
    <?php
    settings_fields('pablos_options_group');
    do_settings_sections('pablos_plugin');
    submit_button();
    ?>
  </form>
</div>
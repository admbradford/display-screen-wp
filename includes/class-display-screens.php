<?php

class DisplayScreens {

  public function __construct() {
    require( 'Pusher.php' );

    $options = array(
      'encrypted' => true
    );

    $this->pusher = new Pusher(
    '25f5dee7cef7f2d3e85a',
    'a73f604dbbabb5daf5e0',
    '199390'
    );

    $this->channel = 'display_screen';

     add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
     //add_action( 'admin_init', array( $this, 'page_init' ) );
  }
  public function add_plugin_page() {
      // This page will be under "Settings"
      add_options_page(
          'Settings Admin',
          'Displays',
          'manage_options',
          'displays-admin',
          array( $this, 'create_admin_page' )
      );
  }

  public function create_admin_page() {
    if (isset($_POST['display_screen'])) {
        update_option('display_screen', $_POST['display_screen']);
        $value = $_POST['display_screen'];

        $this->push_content( $this->channel, $value );
    }
    $this->push_content( $this->channel, $value );
    $value = get_option('awesome_text', '<h1>hey-ho</h1>');
  ?>
        <div class="wrap">
            <h2>Displays</h2>
            <form method="POST">
                <label for="awesome_text">Update Screen</label>
                <input type="text" name="display_screen" id="display_screen" value="<?php echo $value; ?>">
                <input type="submit" value="Save" class="button button-primary button-large">
            </form>
        </div>
  <?php }
  public function push_content( $channel, $message ){
    $data['message'] = $message;
    $this->pusher->trigger(
      $channel,
      'push_content',
      $data
    );
  }

}

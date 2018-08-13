<?php 
defined( 'ABSPATH' ) or exit;


function canvasjs_charts_register_settings() {
   add_option( 'canvasjs_charts_url', 'https://canvasjs.com/assets/script/canvasjs.min.js');
   register_setting( 'canvasjs_charts_options_group', 'canvasjs_charts_url', 'canvasjs_charts_callback' );
}
add_action( 'admin_init', 'canvasjs_charts_register_settings' );


function canvasjs_charts_register_options_page() {
  add_options_page('CanvasJS Charts Settings', 'CanvasJS Charts', 'manage_options', 'CanvasJSCharts', 'canvasjs_charts_options_page');
}
add_action('admin_menu', 'canvasjs_charts_register_options_page');


function canvasjs_charts_options_page() {
	?>
	<div>
	<?php screen_icon(); ?>
	<h1>WP CanvasJS Charts</h1>
	<p>CanvasJS is an HTML5 & JavaScript based Charting Library that runs on all modern devices including iPhone, Android, Desktops, etc. Charts are beautiful and API is very simple to use.</p>
	
	<form method="post" action="options.php">
	<?php settings_fields( 'canvasjs_charts_options_group' ); ?>
		<h2>Change Options Below:</h2>
		<label for="canvasjs_charts_url">CanvasJS Script URL</label>
		<input type="text" id="canvasjs_charts_url" style="width: 30em" name="canvasjs_charts_url" value="<?php echo get_option('canvasjs_charts_url'); ?>" />
		<?php  submit_button(); ?>
	</form>
	<p><h4>Note: You can replace the above URL with the self-hosted commercial version of CanvasJS. Please visit <a href="https://canvasjs.com/license/" target="_blank">CanvasJS.com</a> for more info.</h4></p>
	</div>
<?php
}



function canvasjs_admin_page() {
    echo '<h3>CanvasJS Charts</h3>';
	?>
	 <div>
  <div class="wrap">
            <form method="post" action="options.php">
                <input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">        
            </form>
        </div>
  <?php
}



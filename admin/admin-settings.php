<?php 
defined( 'ABSPATH' ) or exit;


function canvasjs_chart_register_settings() {
   add_option( 'canvasjs_chart_url', 'https://canvasjs.com/assets/script/canvasjs.min.js');
   register_setting( 'canvasjs_chart_options_group', 'canvasjs_chart_url', 'canvasjs_chart_callback' );
}
add_action( 'admin_init', 'canvasjs_chart_register_settings' );

function canvasjs_stockchart_register_settings() {
   add_option( 'canvasjs_stockchart_url', 'https://canvasjs.com/assets/script/canvasjs.stock.min.js');
   register_setting( 'canvasjs_stockchart_options_group', 'canvasjs_stockchart_url', 'canvasjs_stockchart_callback' );
}
add_action( 'admin_init', 'canvasjs_stockchart_register_settings' );


function canvasjs_chart_register_options_page() {
  add_menu_page('CanvasJS Settings', 'CanvasJS', 'manage_options', 'canvasjssettings', 'canvasjs_settings_page', 'dashicons-chart-pie', 6);
}
add_action('admin_menu', 'canvasjs_chart_register_options_page');


function canvasjs_settings_page() {
	?>
	<div class="wrap">
	<?php screen_icon(); ?>
	<h1>WP CanvasJS Charts & StockCharts</h1>
	<p><a href="https://canvasjs.com">CanvasJS</a> is an HTML5 & JavaScript based Charting Library that runs on all modern devices including iPhone, Android, Desktops, etc. Charts are beautiful and API is very simple to use.</p>
	
	<form method="post" action="options.php">
	<?php settings_fields( 'canvasjs_chart_options_group' ); ?>
	<?php settings_fields( 'canvasjs_stockchart_options_group' ); ?>
		<h2>Settings:</h2>
		<p>If you have commercial license, you can upload the commercial version of CanvasJS to your server and provide the link below</p>
		<table>
			<tr>
				<td><label for="canvasjs_chart_url">CanvasJS Charts Script URL</label></td>
				<td><input type="text" id="canvasjs_chart_url" style="width: 30em" name="canvasjs_chart_url" value="<?php echo get_option('canvasjs_chart_url'); ?>" /></td>
			</tr>
			<tr>	
				<td><label for="canvasjs_stockchart_url">CanvasJS StockCharts Script URL</label></td>
				<td><input type="text" id="canvasjs_stockchart_url" style="width: 30em" name="canvasjs_stockchart_url" value="<?php echo get_option('canvasjs_stockchart_url'); ?>" /></td>
			</tr>
		</table>
		<?php  submit_button(); ?>
	</form>
	<p><h4>Note: You can replace the above URL with the self-hosted commercial version of CanvasJS. Please visit <a href="https://canvasjs.com/license/" target="_blank">CanvasJS.com</a> for more info.</h4></p>
	</div>
<?php
}



function canvasjs_admin_page() {
    echo '<h3>CanvasJS Charts & StockCharts</h3>';
	?>
	 <div>
  <div class="wrap">
            <form method="post" action="options.php">
                <input name="submit" id="submit" class="button button-primary" value="Save Changes" type="submit">        
            </form>
        </div>
  <?php
}



<?php 
defined( 'ABSPATH' ) or exit;

function canvasjs_settings_register() {
	if(get_option('canvasjs_chart_url'))
		delete_option('canvasjs_chart_url');

	if(get_option('canvasjs_stockchart_url'))
		delete_option('canvasjs_stockchart_url');
}
add_action( 'admin_init', 'canvasjs_settings_register' );

add_action('wp_ajax_canvasjs_set_options', 'canvasjs_set_options');

function canvasjs_register_options_page() {
  add_menu_page('CanvasJS Settings', 'CanvasJS', 'manage_options', 'canvasjssettings', 'canvasjs_settings_page', 'dashicons-chart-pie', 6);
}
add_action('admin_menu', 'canvasjs_register_options_page');

function canvasjs_set_options() {
	if (current_user_can('editor') || current_user_can('administrator')) {
		$urls = [];
		if(isset($_POST['commercial'])) {
			$urls['chart_url'] = isset($_POST['canvasjs_chart_url']) ? sanitize_text_field($_POST['canvasjs_chart_url']) : '';
			$urls['stockchart_url'] = isset($_POST['canvasjs_stockchart_url']) ? sanitize_text_field($_POST['canvasjs_stockchart_url']) : '';
			$urls['commercial'] = true;
		}
		else {
			$urls['chart_url'] = PLUGIN_URL . '/assets/js/canvasjs.min.js';
			$urls['stockchart_url'] = PLUGIN_URL . '/assets/js/canvasjs.stock.min.js';
			$urls['commercial'] = false;
		}
		update_option('canvasjs_settings', $urls);

		return array("success" => true);
	}

	return array("error" => "You are not authorized to do visit this page.");
}

function canvasjs_settings_page() {

	$_options = get_option('canvasjs_settings');
	?>
	<div class="wrap" >
	<?php screen_icon(); ?>
	<h1>WP CanvasJS Charts & StockCharts</h1>
	<p style="font-size: 16px;">WP CanvasJS lets you to create and add interactive Charts & StockCharts to your wordpress page and posts using CanvasJS library.</p>
	<p style="font-size: 16px;"><a href="https://canvasjs.com" target="_blank">CanvasJS</a> is a powerful JavaScript library that provides developers with an intuitive and interactive way to create dynamic charts and graphs for web applications. It offers a wide range of features and customization options, making it a popular choice among developers for data visualization.</p>


	<form method="post" id="canvasjs-settings-form">
	<?php settings_fields( 'canvasjs_chart_options_group' ); ?>
		<div>
			<input type="checkbox" id="commercial" name="commercial" <?php echo $_options['commercial'] ? 'checked' : '' ?>>
			<label for="commercial"> I'm using CanvasJS in Commercial Applciation</label><br>
		</div>
		<div id="commercialSettings">
			<h2>Commercial Script URLs:</h2>
			<p>If you have commercial license of CanvasJS, you can upload the commercial version of CanvasJS script files to your website / server and provide the link below.</p>
			<table>
				<tr>
					<td><label for="canvasjs_chart_url">CanvasJS Charts Script URL</label></td>
					<td><input type="text" id="canvasjs_chart_url" style="width: 30em" name="canvasjs_chart_url" value="<?php echo $_options['commercial'] ? $_options['chart_url'] : ''; ?>" placeholder="https://cdn.canvasjs.com/canvasjs.min.js"/></td>
				</tr>
				<tr>	
					<td><label for="canvasjs_stockchart_url">CanvasJS StockCharts Script URL</label></td>
					<td><input type="text" id="canvasjs_stockchart_url" style="width: 30em" name="canvasjs_stockchart_url" value="<?php echo $_options['commercial'] ? $_options['stockchart_url'] : ''; ?>" placeholder="https://cdn.canvasjs.com/canvasjs.stock.min.js"/></td>
				</tr>
			</table>
		</div>
		<?php  submit_button(); ?>
	</form>
	<p><h4>Note: You can replace the above URL with the self-hosted commercial version of CanvasJS. Please visit <a href="https://canvasjs.com/license/" target="_blank">CanvasJS.com</a> for more info on licensing.</h4></p>
	</div>
	<script>
		jQuery("#canvasjs-settings-form").on("submit", function(e) {
			e.preventDefault();
			var formData = new FormData(jQuery(this)[0]);
			var value = Object.fromEntries(formData.entries());
			
			jQuery.ajax({
				type: 'POST',
				url: 'admin-ajax.php',
				dataType: 'json',
				data: { ...value, action:'canvasjs_set_options' }
			});

		});
		function toggleCommercialSetting() {
			if(jQuery('#commercial').is(':checked')) {
				jQuery('#commercialSettings').show();
			}
			else {
				jQuery('#commercialSettings').hide();
			}
		}
		jQuery(document).ready(function() {	
			toggleCommercialSetting();
			jQuery('#commercial').change(toggleCommercialSetting);
		});
	</script>
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

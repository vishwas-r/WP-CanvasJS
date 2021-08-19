<?php
/**
 * canvasjschart shortcode
 *
 * @package	 WPCanvasJS
 * @since    1.0.0
 */

 if (!function_exists('canvasjs_chart_script')){
	function add_canvasjs_chart_script() {
		$_url = get_option('canvasjs_chart_url');
		wp_register_script('canvasjs_chart_script', $_url, array('jquery'), null, true);
		wp_enqueue_script('canvasjs_chart_script');
	}
	add_action('wp_enqueue_scripts', 'add_canvasjs_chart_script');
}
 
if (!function_exists('canvasjs_chart_shortcode')){
	// Add the action.
	add_action('plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'canvasjschart', 'canvasjs_chart_shortcode' );
	});

	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts
	 * @return string
	 * @since  1.0.0
	 */
	function canvasjs_chart_shortcode($atts) {
		STATIC $chartCount = 0;
		$chartContainerID = "chartContainer".$chartCount;
		$chart = "chart".$chartCount;
		$chartCount++;
		
		$chartOptions = $atts['options'];
		$divStyle = $atts['style'];
		
		//Safe in PHP 7.0.
		$_chart .= '<div id='.$chartContainerID.' style='.$divStyle.'></div>
				   <script>
						jQuery(document).ready(function( $ ){
							var '.$chart.'= new CanvasJS.Chart('. $chartContainerID .','. $chartOptions .');'.
							$chart.'.render();
						});
				   </script>';

		// Return the data.
		return $_chart;
	}
} // End if().

<?php
/**
 * canvasjschart shortcode
 *
 * @package	 WPCanvasJSCharts
 * @since    1.0.0
 */

 if (!function_exists('canvasjs_script')){
	function add_canvasjs_script() {
		$_url = get_option('canvasjs_charts_url');
		wp_register_script('canvasjs_script', $_url, array('jquery'),'1.1', true);
		wp_enqueue_script('canvasjs_script');
	}
	add_action('wp_enqueue_scripts', 'add_canvasjs_script');
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
		STATIC $count = 0;
		$containerID = "chartContainer".$count;
		$chart = "chart".$count;
		$count++;
		
		$chartOptions = $atts['options'];
		$divStyle = $atts['style'];
		
		//Safe in PHP 7.0.
		$_chart .= '<div id='.$containerID.' style='.$divStyle.'></div>
				   <script>
						jQuery(document).ready(function( $ ){
							var '.$chart.'= new CanvasJS.Chart('. $containerID .','. $chartOptions .');'.
							$chart.'.render();
						});
				   </script>';

		// Return the data.
		return $_chart;
	}
} // End if().

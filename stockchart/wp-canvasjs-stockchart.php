<?php
/**
 * canvasjsstockchart shortcode
 *
 * @package	 WPCanvasJS
 * @since    1.3.0
 */

 if (!function_exists('canvasjs_stockchart_script')){
	function add_canvasjs_stockchart_script() {
		$_url = get_option('canvasjs_stockchart_url');
		wp_register_script('canvasjs_stockchart_script', $_url, array('jquery'), null, true);
		wp_enqueue_script('canvasjs_stockchart_script');
	}
	add_action('wp_enqueue_scripts', 'add_canvasjs_stockchart_script');
}
 
if (!function_exists('canvasjs_stockchart_shortcode')){
	// Add the action.
	add_action('plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'canvasjsstockchart', 'canvasjs_stockchart_shortcode' );
	});

	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts
	 * @return string
	 * @since  1.3.0
	 */
	function canvasjs_stockchart_shortcode($atts) {
		STATIC $stockChartCount = 0;
		$stockChartContainerID = "stockChartContainer".$stockChartCount;
		$stockChart = "stockChart".$stockChartCount;
		$stockChartCount++;
		
		if(isset($atts['optionsurl'])) {
			$stockChartOptions = file_get_contents($atts['optionsurl']);
		}
		if(isset($atts['options'])) {
			$stockChartOptions = $atts['options'];
		}
		
		$divStyle = $atts['style'];
		
		//Safe in PHP 7.0.
		$_stockChart .= '<div id='.$stockChartContainerID.' style='.$divStyle.'></div>
				   <script>
						jQuery(document).ready(function( $ ){
							var '.$stockChart.'= new CanvasJS.StockChart('. $stockChartContainerID .','. $stockChartOptions .');'.
							$stockChart.'.render();
						});
				   </script>';
				   
		// Return the data.
		return $_stockChart;
	}
} // End if().

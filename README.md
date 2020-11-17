# CanvasJS for WordPress

This plugin allows you to create and add interactive Charts & StockCharts to your wordpress page and posts using CanvasJS library. It creates responsive high-performance Charts & StockCharts that renders across devices including iPhone, iPad, Android, Mac & PCs.

## CanvasJS Library
CanvasJS is built from ground up for high performance data visualization and can render millions of data points in a matter of milliseconds. CanvasJS is trusted by 500K+ users in 192 Countries. Customers include Microsoft, NASA, Apple, Intel, Boing, Samsung, BMW, Sony, HP, Bosch, Motorola, etc.

Note:
- This plugin requires you to have CanvasJS License. Please visit [CanvasJS](https://canvasjs.com/license/) for more info.

## CanvasJS Gallery / Demos
[CanvasJS Chart Gallery](https://canvasjs.com/javascript-charts/)
[CanvasJS StockChart Gallery](https://canvasjs.com/javascript-stockcharts/)

## How to add CanvasJS to your WordPress Page / Post?
#### CanvasJS Chart
- Add shortcode `[canvasjschart]`
- Pass chart-options to the chart as 'options'.
  >[canvasjschart options="{title:{text: 'CanvasJS Column Chart'}, data: new Array({dataPoints: new Array({ label: 'apple', y: 10 },{ label: 'orange', y: 15 },{ label: 'banana', y: 25 },{ label: 'mango', y: 30 },{ label: 'grape', y: 28 })})}" style="width:100%;height:300px"]
  
#### CanvasJS StockChart
- Add shortcode `[canvasjsstockchart]`
- Pass chart-options to the chart as 'options'.
  >[canvasjsstockchart options="{title:{text: 'CanvasJS StockChart'}, charts: new Array({data: new Array({dataPoints: new Array({ label: 'apple', y: 10 },{ label: 'orange', y: 15 },{ label: 'banana', y: 25 },{ label: 'mango', y: 30 },{ label: 'grape', y: 28 })})})}" style="width:100%;height:400px"]

Note:
- Don't add space within style. i.e. Use `style="width:100%;height:300px"` and avoid `style="width: 100%; height: 300px"`

#### Plugin Testing
- Last Tested with: WordPress 5.5.3, CanvasJS Charts v3.2.3 & CanvasJS StockCharts v1.2.3
- Last Tested on: Nov 17, 2020

#### License
MIT

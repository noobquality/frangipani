<?
session_start();
include("includes/session.php");?>
<html>
<head>
<?
include("includes/head.php");
?>
</head>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    	
    	// Radialize the colors
		Highcharts.getOptions().colors = $.map(Highcharts.getOptions().colors, function(color) {
		    return {
		        radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
		        stops: [
		            [0, color],
		            [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
		        ]
		    };
		});
		
		// Build the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Total Order from Customers'
            },
            tooltip: {
        	    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
            	percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Interesting Customers',
                data: [
					['Tum Be Siap', 26.8],
                    ['Betutu',   25.0],
					{
                        name: ' Nasi Goreng',
                        y: 12.8,
                        sliced: true,
                        selected: true
                    },
					['Gerangasem Siap',   10.0],
					['Chilli Prawn',    8.5],
					['Gedang Mekuah',     6.2],
					['Pesan be Pasih',   5.0],
					['Jukut Undis',   5.0],
                    ['Jukut Siap',   0.7]
                ]
            }]
        });
    });
    
});
</script>
<body>
	<div id="header">
        <nav>
          <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="chart.php"  class="current">Chart</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="member.php">Member</a></li>
          </ul>
        </nav>
	</div>
	<div id="header2">
	<header>
	<?
	include("includes/user.php");
	?>
	</header>
	<br />
	<div class="border"></div>
	<br />
	</div>
	<div id="container">
		<script src="scripts/highcharts.js"></script>
    </div>
	<div id="container">
	<br />
	<div class="border2"></div>
        <br />
		<? include("includes/footer.php");?>
	</div>
</body>
</html>

<div class="col-md-8">
  <div class="widget widget-fullwidth">
    <div class="widget-head">
      <div class="tools"><span class="icon mdi mdi-chevron-down"></span>
        <span
        class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
      </div><span class="title">Aplikasi Monitoring Barang</span>
      <span
      class="description">
        </span>
    </div>
	<!-- Isi -->
  </div>
</div>
 

<script>
      function i() {
        var a = tinycolor(App.color.primary).lighten(5).toString();
        $.plot($("#line-chart3"), [{
          data: [
		  <?php
		  
		  for ($i=2013; $i<=2020; $i++){ 
			 $j=cari("select count(*) as j from bencana where Tahun='$i'");
			if ($j[j]<1)
				$jm=0;
			else
				$jm=$j[j];
		  echo"
			[$i, $jm ],";
		  }
           
		 
		?>
		 
          ],
          label: "Page Views"
        }], {
          series: {
            lines: {
              show: !0,
              lineWidth: 2,
              fill: !0,
              fillColor: {
                colors: [{
                  opacity: .1
                }, {
                  opacity: .1
                }]
              }
            },
            points: {
              show: !0
            },
            shadowSize: 0
          },
          legend: {
            show: !1
          },
          grid: {
            margin: {
              left: 23,
              right: 30,
              top: 20,
              botttom: 40
            },
            labelMargin: 15,
            axisMargin: 500,
            hoverable: !0,
            clickable: !0,
            tickColor: "rgba(0,0,0,0.15)",
            borderWidth: 0
          },
          colors: [a],
          xaxis: {
            ticks: 11,
            tickDecimals: 0
          },
          yaxis: {
            ticks: 4,
            tickSize: 15,
            tickDecimals: 0
          }
        })
      }

</script>

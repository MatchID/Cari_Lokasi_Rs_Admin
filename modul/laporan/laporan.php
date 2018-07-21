<?php
mysql_connect("localhost","richi_ririn","ririn123");
mysql_select_db("richi_ririn");
include("mpdf.php");

 
$mpdf=new mPDF('c'); 
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage','two');

 
$tx=tx();
 
$html ="$tx ";
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

function tx(){
 $date=date("d-M-Y");
$t="$t
  
<div class='wrapper'>
  <!-- Main content -->
  <section class='invoice'>
    <!-- title row -->
    <div class='row'>
      <div class='col-xs-12'>
        <h2 class='page-header'>
          <i class='fa fa-globe'></i> LAPORAN DATA BENCANA  
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class='row invoice-info'>
      <div class='col-sm-4 invoice-col'>
	  
       
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
         
        <address>
          
        </address>
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
  
     
       
 
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class='row'>
      <div class='col-xs-12 table-responsive'>
        <table class='table table-striped' style='width:800px; border-collapse:collapse;' border=1 >
          <thead>
          <tr>
		  
					<th>  No</th>
					<th>  Nama Lokasi</th>
					<th>  Keterangan</th>
					<th>  Tahun</th>	
					<th>  Jumlah Korban KK</th>
					<th>  Jumlah Korban Jiwa</th>
					<th>  Jumlah Korban Meninggal</th>	
					<th>  Jumlah Kerugian</th>		
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select * from bencana left join lokasi on bencana.KodeLokasi=lokasi.KodeLokasi
									left join korban on bencana.KodeLokasi=korban.KodeLokasi";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
					$n++;
						 
$t="$t	
		<tr >
 		  
		  <td align=left> &nbsp;	$n  </td> 
		  <td align=left> &nbsp;	$w[Lokasi]  </td> 
		  <td align=left> &nbsp;	$w[Keterangan]  </td> 
		  <td align=left> &nbsp;	$w[Tahun]  </td>  
		  <td align=left> &nbsp;	$w[KK]  </td> 
		  <td align=left> &nbsp;	$w[Jiwa]  </td> 
		  <td align=left> &nbsp;	$w[Meninggal]  </td>  
		  <td align=left> &nbsp;	$w[Materil]  </td> 
										
</tr>";}

 
$t="$t
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class='row'>
      <!-- accepted payments column -->
      <div class='col-xs-6'>
 
      </div>
      <!-- /.col -->
      <div class='col-xs-6'>
 

        <div class='table-responsive'>
          <table class='table'>
             <tr>
              <th  align=right style='width:50%'>Total Data  : $n</th>
              <td align=right> </td>
            </tr>
      
            
             
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
 
";

return $t;
}

function sela($sql){
	$r=mysql_query($sql);
	return $w=mysql_fetch_array($r);
}

 
?>  
           
          
           

 
 
 
 
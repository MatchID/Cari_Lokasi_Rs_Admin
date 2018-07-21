<?php
mysql_connect("localhost","root","");
mysql_select_db("db_barang");


echo "$t
  
<div class='wrapper'>
  <!-- Main content -->
  <section class='invoice'>
    <!-- title row -->
    <div class='row'>
      <div class='col-xs-12'>
        <h2 class='page-header'>
          <i class='fa fa-globe'></i> LAPORAN DATA STOK GUDANG  
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
					<th>  Nama Barang</th>
					<th>  Stok Gudang</th>
					<th>  Satuan</th>	
					<th>  Harga Satuan</th>	
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select * from barang";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
					$n++;
						 
echo "$t	
		<tr >
 		  
		  <td align=left> &nbsp;	$n  </td> 
		  <td align=left> &nbsp;	$w[Nama_Barang]  </td> 
		  <td align=left> &nbsp;	$w[Jumlah_Total]  </td> 
		  <td align=left> &nbsp;	$w[Satuan]  </td>  
		  <td align=left> &nbsp;	$w[Harga_Satuan]  </td> 
										
</tr>";}

 
echo "$t
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

 
?>  
           
          
           

 
 
 
 
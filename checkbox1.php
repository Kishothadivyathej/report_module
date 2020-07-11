<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </head>

  <body>
  <?php
  //$result =[];

  include('config.php');
  //include('export_report.php');
 

  if(isset($_POST['b2'])) {
    $columns_selected = $_POST['column_name'];
    $table_name =  $_POST['tb_name'];
    $inner_join_query = '';
    $columns_selected2 = [];
    
  $col_builder = "";
  
  if($table_name =='liveissue') {
    $mapping_col1 = ['categ', 'subcateg', 'tags', 'cnt','comment'];
    $mapping_col2 = ['maping.categ', 'maping.subcateg', 'maping.tags', 'maping.cnt','maping.comment'];

    //array_push($a,"blue","yellow");
    foreach($columns_selected as $check) {
      //  $col_builder = $col_builder  . $table_name. '.' . $check .", "; 
      $combine = $table_name.".".$check;
      array_push($columns_selected2, $combine);
    }


    $columns_selected = array_merge($columns_selected, $mapping_col1);
    $columns_selected2 = array_merge($columns_selected2, $mapping_col2);
    foreach($columns_selected2 as $check) {
      //  $col_builder = $col_builder  . $table_name. '.' . $check .", "; 
      $col_builder = $col_builder . $check .", "; 
    }

  $inner_join_query = " INNER JOIN categories  on liveissue.issue_no = categories.issueid INNER join maping on categories.mappingid = maping.cnt ";
  }  else {
    foreach($columns_selected as $check) {
      //  $col_builder = $col_builder  . $table_name. '.' . $check .", "; 
      $col_builder = $col_builder . $check .", "; 
    }
  }

  $col_builder = trim($col_builder , ", "); 
  $sql_select = "select  $col_builder from  $table_name $inner_join_query ";

  // $sql_select = "select TAGS from liveissue INNER JOIN categories on issue_no = issueid INNER join maping on mappingid = cnt";
    echo "xxxxxxxxxxxxxxxxxx  " . $sql_select;
  //  $con=mysqli_connect("localhost","root","","smdb");
      $result=mysqli_query($con,$sql_select);

     
  ?>
  



  <div class="container">
    <h2>REPORT</h2>
    <h4><?php echo $table_name ?></h4> 
    <div><a href="javascript:void(0)" onclick="xxx();" id="export-to-excel">Export to excel</a></div>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
						<input type="hidden"   id='hidden-type' name='ExportType'/>
            <input type="hidden"   id='hidden-type2' name='ExportType2'/>
					  </form> 
    <!-- <button  name="create_excel" id="create_excel" onclick="export_exel()" class="btn btn-success">Create Excel File</button>  -->
    <div name="report_table" id="report_table">
    <table class="table table-striped" >
      <thead class="thead-dark">
        <tr class="table-secondary">
        <?php foreach($columns_selected as $header){ ?>    
          <th><?php echo $header ?></th>
        <?php
          }
        ?>
        </tr>
      </thead>
      <tbody>
        <?php 
        while($row=mysqli_fetch_assoc($result)) { ?>
        <tr class="active">
      
        <?php foreach($columns_selected as $header){ ?>
          <td> <?php echo $row[$header];  ?></td>
        <?php } ?>
        </tr>
        <?php }  ?>
      </tbody>
    </table> 
    </div>
    </div>
        <?php } 
        
  include('export_report1.php');
  ?>
  </body>
</html>
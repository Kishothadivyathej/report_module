<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>

<body>
  
<?php
  include('config.php'); 
  
?>


        <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <a class="navbar-brand" href="#">HOME</a>
                  </div>
                  <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#">Home</a></li> -->
                    <!-- <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>  -->
                  </ul>
                 
                </div>
              </nav>


      <?php
        $sql="SELECT * FROM report_tables";
        $result=mysqli_query($con,$sql);
      ?>
      
    
      <?php
      //$res_col_name=null;
      $res_col_name = [];
      $name='';
      if (isset($_GET["table_name"]))
      {
          $name=$_GET["table_name"]; 
          
          $sql="select column_name from information_schema.columns where TABLE_SCHEMA='smdb' and  table_name='$name'";
          $res_col_name=mysqli_query($con,$sql);
          echo "xxxxxnnnnnnnnnn  ". $name. " nnnn   ".$sql;
      }
     
      ?>
              

    <div class="container-fluid ">
          <div class="row">
            <div class="col-md-4 ">
            <div class="container">
                <h4>Select a Table </h2> 
                <div class="dropdown">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Select ....
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu"> 
                    <?php
                      while ($rowRace = $result->fetch_assoc()){
                    ?>
                      <li id="<?php echo $rowRace['table_name'] ?>" onclick="tableSelection(this)">
                         <a ><?php echo $rowRace['table_name'] ?></a>
                       </li>  
                    <?php
                      }
                    ?>    
                  </ul>
                </div>
              </div>
            </div>
            <?php 
              if($name!='') { ?>
                <div class="col-md-8"><h2>Select here</h2>
                  <form name="f2" method="post" action="checkbox1.php">

                        <?php 
                        $counter = 12;
                        while($row=mysqli_fetch_assoc($res_col_name)) { 
                        ?>
                          <label  class="container">
                            <input type="checkbox" name="column_name[]" value ="<?php echo $row['column_name']; ?>" >
                                <?php  echo $row['column_name']; ?>
                                <?php  echo "<br/>" ?>
                            </input>
                            <input type="hidden" name="tb_name" value="<?php echo $name ?>"/>
                          </label>
                        <?php  
                          $counter--;
                         } ?> 
                    
                  <input type="submit"  class="btn btn-primary"  name="b2" value="Get Report"  >
                  </form>
            </div>
            <?php  } ?>
          </div>
        </div>



</body>
</html>
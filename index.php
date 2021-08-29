<html>  
      <head>  
           <title>ifsc</title> 
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <style>
   
   .box
   {
    width:750px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:100px;
   }
  </style>
      </head>  
      <body>  
        <div class="container box">
          <h3 align="center">Import JSON File Data into Mysql Database in PHP</h3><br />
          <?php
          $connect = mysqli_connect("localhost", "root", "", "bank"); //Connect PHP to MySQL Database
		set_time_limit(500);
          $query = '';
          $table_data = '';
          $filename = "IFSC.json";
          $data = file_get_contents($filename); //Read the JSON file in PHP
          $array = json_decode($data, true); //Convert JSON String into PHP Array
		echo count($array);
          foreach($array as $key=>$value) //Extract the Array Values by using Foreach Loop
          {
		foreach($value as $ifsc)
		{
           $query = "INSERT INTO bank_ifsc(bank_id,bank_ifsc) VALUES ('".$key."', '".$ifsc."'); ";  // Make Multiple Insert Query 
		$result = mysqli_query($connect,$query);
           $table_data .= '
            <tr>
       <td>'.$key.'</td>
       <td>'.$ifsc.'</td>
      </tr>
           '; //Data for display on Web page
          }
         }
     echo '<h3>Imported JSON Data</h3><br />';
     echo '
      <table class="table table-bordered">
        <tr>
         <th width="45%">bank_id</th>
         <th width="10%">bank_ifsc</th>
        </tr>
     ';
     echo $table_data;  
     echo '</table>';
          




          ?>
     <br />
         </div>  
      </body>  
 </html>  
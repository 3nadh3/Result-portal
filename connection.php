<?php
$server_name="localhost:3306";
$user_name="root";
$password="";
$database_name=$_POST['Regulation'];

$connection= mysqli_connect($server_name,$user_name,$password,$database_name);
if ($connection->connect_error)
{
    die("Connection failed: " . $connection->connect_error);
}
else
$htno = $_POST['id'];
$semester=$_POST['sem'];
$Sno=1;
?>
<!DOCTYPE html >
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
  <?php echo $semester." ";?>Results 
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
 <style>
 .print{
        margin: 0;
  position: fixed;
  top: 8%;
  right: 3%;
    }
    h3{
        padding: 30px;
    }
    </style>
    </head>
<body style="background-color: bisque">

<?php
if($semester=='All')
{
    $query= "SELECT * FROM `test` WHERE Htno='$htno' ";
    $result=mysqli_query($connection,$query);
    if($htno=='')
    {?>
        
       <h3 align="center"><strong> <?php echo "please Enter Register number 👀😒😒";?></strong></h3>
    <?php 
    }
    elseif(mysqli_num_rows($result)==0)
        { ?>
            
           <h3 align="center"><strong> <?php echo "please check the Entered Register Number 👀🧐";?></strong></h3>
        <?php
        }
    
        else
        {
        ?>
        <table align ="center" border="3px" style ="width:650px; line-height:40px;">
    <tr>
    <th colspan="10" ><h2 align="center"> Results</h2></th>
    </tr>
    <t>  
        <th style="color: cornflowerblue"> Sno </th>
        <th style="color: cornflowerblue">Hall Ticket number</th>
        <th style="color: cornflowerblue">subject code</th>
        <th style="color: cornflowerblue"> Subject Name</th>
        <th style="color: cornflowerblue">Grade</th>
        <th style="color: cornflowerblue">Credits</th>
        <th style="color: cornflowerblue"> Internals</th>
    </t>
    
    <?php
         while($rows=mysqli_fetch_assoc($result))
        {
    ?> <tr>
             <td> <?php echo $Sno; $Sno++ ?> </td>
            <td> <?php echo $rows['Htno']; ?> </td>
            <td> <?php echo $rows['Subcode']; ?> </td>
            <td> <?php echo $rows['Subname']; ?> </td>
            <td> <?php echo $rows['Grade']; ?> </td>
            <td> <?php echo $rows['Credits']; ?> </td>
            <td> <?php echo $rows['Internals']; ?> </td>
        </tr>
    <?php
        }
        ?>
        <div class="print">
    <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
    </div>
    <p style="position:fixed;right: 3%;bottom: 0; opacity: 0.5 "><strong> Provided by IT</strong></p>
    <br>
    <?php
        }
        ?>
    </table>
    <br>
<?php
}
else
{
$query= "SELECT * FROM `test` WHERE Htno='$htno'";
$result=mysqli_query($connection,$query);
if($htno=='')
{?>
    
   <h3 align="center"><strong> <?php echo "please Enter Register number 👀😒😒";?></strong></h3>
<?php 
}
elseif(mysqli_num_rows($result)==0)
    { ?>
        
       <h3 align="center"><strong> <?php echo "please check the Entered Register number 👀🧐";?></strong></h3>
    <?php
    }

    else
    {
    ?>
    <table align ="center" border="3px" style ="width:650px; line-height:40px;">
<tr>
<th colspan="10" ><h2 align="center"> Results</h2></th>
</tr>
<t>  
    <th style="color: cornflowerblue"> Sno </th>
    <th style="color: cornflowerblue">Hall Ticket number</th>
    <th style="color: cornflowerblue">subject code</th>
    <th style="color: cornflowerblue"> Subject Name</th>
    <th style="color: cornflowerblue">Grade</th>
    <th style="color: cornflowerblue">Credits</th>
    <th style="color: cornflowerblue"> Internals</th>
</t>

<?php
     while($rows=mysqli_fetch_assoc($result))
    {
?> <tr>
         <td> <?php echo $Sno; $Sno++ ?> </td>
        <td> <?php echo $rows['Htno']; ?> </td>
        <td> <?php echo $rows['Subcode']; ?> </td>
        <td> <?php echo $rows['Subname']; ?> </td>
        <td> <?php echo $rows['Grade']; ?> </td>
        <td> <?php echo $rows['Credits']; ?> </td>
        <td> <?php echo $rows['Internals']; ?> </td>
    </tr>
<?php
    }
    ?>
    <div class="print">
<button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
</div>
<p style="position:fixed;right: 3%;bottom: 0; opacity: 0.5 "><strong> Provided by IT</strong></p>
<br>
<?php
    }
    }
    ?>
</table>
<br>



</body>
</html>
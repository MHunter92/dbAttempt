<!DOCTYPE html>
<html>
<?php


    $link = mysql_connect('localhost', 'root', '');

      if (!$link)
      {
        echo 'Not connected to server';
      }

    if (!mysql_select_db('outloudbookings'))
    {
      echo 'Database not connected';
    }
    $startTime = $_POST['StartTime'];
    $endTime = $_POST['EndTime'];
    $bandItem = $_POST['BandItem'];
    $eftpos = $_POST['EFT'];
    $cash = $_POST['CASH'];
    $paypal = $_POST['PAYPAL'];
    $total = $eftpos + $cash + $paypal;

    $sql = "INSERT INTO daysheet (startTime, endTime, bandItem, EFT, CASH,
      PAYPAL, TOTAL)
    VALUES ('$startTime', '$endTime', '$bandItem', '$eftpos', '$cash',
      '$paypal', '$total')";

    if(!mysql_query($sql))
    {
      echo " Not Inserted";
    }
    else
    {
      echo "Data Inserted";
    }


?>




<form method="post" action="daySheet.php">

    Start Time <input type = "time" name = "StartTime"/>
    End Time <input type = "time" name = "EndTime"/>
    Band/Item <input type ="text" name= "BandItem"/>
    Eftpos <input type = "number" name = "EFT"/>
    Cash <input type = "number" name = "CASH"/>
    Paypal <input type ="number" name = "PAYPAL"/>
    <input type = "submit"/>
</form>
</html>

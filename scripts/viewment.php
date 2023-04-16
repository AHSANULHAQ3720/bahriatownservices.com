<html>
<head>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-112703545-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-112703545-1');
</script>

<link rel="stylesheet" href="css/billingment.css" />
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
<CENTER><input id="printpagebutton" type="button" value="Print Bill" onclick="printpage()"/></center>
</head>
<body>
<?php
sleep(5);
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bahriat6_billingdb";
$ref = $_POST['ref#'];



      // Check connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
// Create connection

      $sql = "SELECT * FROM bahriabillingment where NewRefrence = '$ref'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
    echo "<table align='center' class='main'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $dash="-";
       $issuedate=$row["Issuedate"];
       $duedate=$row["DateDue"];
       $dash1=" ";

        date_default_timezone_set('Asia/Karachi');
       
       $issuedateammend=date('d-M-Y',strtotime(($issuedate . ' + 0 days')));
       $duedateammend=date('d-M-Y',strtotime(($duedate . ' + 0 days')));
      
       $t = $row["Sector"];
     // /  echo "<script type='text/javascript'>alert('$t');</script>";
      if (strpos($t,'-') !== false || strpos($t,'I') !== false || strpos($t,'I-Ext') !== false || strpos($t,'II') !== false || strpos($t,'II-S') !== false || strpos($t,'III') !== false || strpos($t,'IV') !== false || strpos($t,'V') !== false || strpos($t,'III-E') !== false || strpos($t,'SA') !== false || strpos($t,'Safari Mall') !== false || strpos($t,'Safari I') !== false || strpos($t,'Safari III') !== false)
       {
         $bank = "Askari/Allied/UBL/JS/Soneri<br/>Alfallah Islamic/Bank Alfallah/Al Habib<br/>Phase 1 to 6";
       }
       else
       {
           $bank = "Askari/Alfallah Islamic Bank<br>Alfallah/Askari Islamic<br/>"; 
       }



       echo "<tr><td rowspan=3><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'>"."<h3 class='title'><center>BAHRIA TOWN (Pvt) Ltd (MAINTENANCE BILL)</center></h3><center>www.bahriatownservices.com.pk</center>"."</td></tr>";
       echo "<tr><td colspan='2'>"."<center><b><p class='heading'>Old Refrence</p></b></center>"."</td><td  class='color' colspan='2'>"."<center><b><p class='heading' class='color'>Billing Month</p></center></b>"."</td><td>"."<center><b><p class='heading'>Conn Date</p></b></center>"."</td><td colspan='2'>"."<center><b><p class='heading'>ISSUEDATE</p></b></center>"."</td><td>"."<center><b><p class='heading'>DUEDATE</p></b></center>"."</td></tr>";
       echo "<tr><td colspan='2'><center>".$row["OldRefrence"]."</center></td><td colspan='2' class='color'><center>".$row["BillingMonth"]."$dash1".$row["BillingYear"]."</center></td><td><center><p class='heading'></P></center></td><td colspan='2'><center><p class='heading'>$issuedateammend</P></center></td><td class='color'><center><p class='heading'>$duedateammend</P></b></center></td></tr>"; 
       echo "<tr><td>"."<center><b><p class='heading'>New Refrence</p></b></center>"."</td><td><center><b><p class='heading'>"."Type"."</p></center></b></td><td><center><b><p class='heading'>"."Size"."</p></center></b></td><td><center><b><p class='heading'>"."Plot Status"."</p></center></b></td><td><center><b><p class='heading'>"."Banks"."</p></center></b></td>
       
       <td colspan='6' rowspan='9' class='no-border'>
       <table class='no-border' class='child1'>
       <tr>
             <td><p class='heading'><b>Month</b></p></td>
             <td><p class='heading'><b>Amount</b></p></td>
             <td><p class='heading'><b>Billed</b></p></td>
             <td><p class='heading'><b>Status</b></p></td>
       </tr>
      <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Jan&nbsp;&nbsp;&nbsp;".$row["jan-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["janmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountjan"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["jan-status"]."</p></td>
      </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Feb&nbsp;&nbsp;&nbsp;".$row["feb-year"]."</p></td> 
             <td class='no-border'><p class='headingc'>".$row["febmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountfeb"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["feb-status"]."</p></td>
       </tr>
       <tr class='no-border' >
             <td class='no-border'><p class='headingc'>Mar&nbsp;&nbsp;&nbsp;".$row["mar-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["marmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'><p class='headingc'>".$row["billamountmar"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["mar-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Apr&nbsp;&nbsp;&nbsp;".$row["april-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["aprilmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountapril"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["april-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>May&nbsp;&nbsp;&nbsp;".$row["may-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["maymentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountmay"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["may-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>June&nbsp;&nbsp;&nbsp;".$row["june-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["junementcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountjune"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["june-status"]."</p></td>
       </tr>
       <tr class='no-border'>
            <td class='no-border'><p class='headingc'>July&nbsp;&nbsp;&nbsp;".$row["july-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["julymentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountjuly"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["july-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Aug&nbsp;&nbsp;&nbsp;".$row["aug-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["augmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountaug"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["aug-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Sep&nbsp;&nbsp;&nbsp;".$row["sep-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["sepmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountsep"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["sep-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Oct&nbsp;&nbsp;&nbsp;".$row["oct-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["octmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountoct"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["oct-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Nov&nbsp;&nbsp;&nbsp;".$row["nov-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["novmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountnov"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["nov-status"]."</p></td>
       </tr> 
       <tr class='no-border'>
            <td class='no-border'><p class='headingc'>Dec&nbsp;&nbsp;&nbsp;".$row["dec-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["decmentcharges"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["billamountdec"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["dec-status"]."</p></td>
       </tr>
       </table>
       </td></tr>";
      echo "<tr><td><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td><center><p class='headingc'>".$row["plotcategory"]."</p></center></td><td><center><p class='headingc'>".$row["size"]."</p></td></center><td><center><p class='headingc'>".$row["plotstatus"]."</p></center></td><td><center><p class='headingc'>".$bank."</center></p></td></tr>"; 
      echo "<tr><td colspan='5'><b>&nbsp;&nbsp;&nbsp;"."NAME & ADDRESS"."</b></td></tr>";
      echo "<tr><td colspan='5'>&nbsp;&nbsp;&nbsp;".$row["Customer-Name"]."<br/>&nbsp;&nbsp;&nbsp;"."PLOT NO/HOUSE NO"."&nbsp;.".$row["Plot-Number"]."&nbsp;"."STREET"."&nbsp;".$row["Street-Number"]."&nbsp;"."Sector"."&nbsp;".$row["Sector"]."</td></tr>";
      echo "<tr><td>"."<center><b><p class='heading'>Meter No</b></center>"."</td><td>"."<center><p class='heading'>Plot#</p></center>"."</td><td>"."<center><b><p class='heading'>Street#</p></b></center>"."</td><td>"."<center><b><p class='heading'>Type</p></b></center>"."</td><td><center><p class='heading'>Status</center></p></td></tr>";
      echo "<tr><td><center><p class='headingc'>".$row["meter#"]."</p></center></td><td><center><p class='headingc'>".$row["Plot-Number"]."</p></center></td><td><center><p class='headingc'>".$row["Street-Number"]."</p></td></center><td><center><p class='headingc'>".$row["plotcategory"]."</p></center></td>
      <td><center><p class='headingc'>".$row["plotstatus"]."</p></center></td>
      </tr>"; 
      echo "<tr><td colspan='2'>"."<center><b><p class='heading'>WATER CHARGES</p></b></center>"."</td><td colspan='2'>"."<center><b><p class='heading'>MENTINENCE CHARGES</p></b></center>"."</td><td>"."<center><b><p class='heading'>OTHER CHARGES</p></b></center>"."</td></tr>";
      echo "<tr><td colspan='2'><center><p class='headingc'>".$row["watercharges"]."</p></center></td><td colspan='2'><center><p class='headingc'>".$row["mentcharges"]."</p></td><td><center><p class='headingc'>".$row["othercharges"]."</p></td></center></tr>"; 
      echo "<tr><td colspan='1'>"."<center><p class='heading'>ADVANCE&nbsp;=&nbsp;<em>".$row["advance"]."</em></p></center>"."</td><td colspan='2'>"."<center><p class='heading'>ADVANCE LEFT&nbsp;=&nbsp;<em>".$row["adleft"]."</em></p></center>"."</b></center>"."</td><td colspan='2'>"."<center><p class='heading'>BILL ADJUSTMENT&nbsp;=&nbsp;<em>".$row["adjustment"]."</em></p></center>"."</td></tr>";
      echo "<tr><td colspan='5' rowspan='6'><p class='headingc'><u><b>NOTES</b></u><br/>This is standard portrait format print of Bahria Town Mentience Bill Provided to Customer through online system <br/> you can get MENTINENCE Duplicate Bill within few minutes.service is<br/> very easy and user friendly</p></center>"."</td>
      </td><td colspan='3'>"."<b><p class='heading'>Maint/Water Charges</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["mentcharges"]."</p></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>Arrears</p></b>"."</td><td id='amount' colspan='3'><em>".$row["arrears"]."</em></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>Bill Adjustment</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["adjustment"]."</p></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>Payment within duedate</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>LP.SURCHARGE</b>"."</p></td><td id='amount' colspan='3'><p class='headingc'>".$row["surcharges"]."</p></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>Payment After Due Date</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

      echo "<tr class='color'><td colspan='10'><center><b>Instruction</b></center></td></tr>";
      echo "<tr><td colspan='4'>
      <ul>
      <li>Monthly Maintenance Charges:On occupation of house we providing security,<br/>fire brigade,garbage lifting,outside lawn mantenance & other utilites to our<br/> resident for which charges w.e.f 1st June 11 will be paid:- 
      <table width='100%'><tr><td><b>Size</b></td><td><b>Charges</b></td></tr>
            <tr><td><p class='headingc'>10/11 Marla(Residential)</p></td><td><p class='headingc'>Rs.3,300/-</p></td></tr>
            <tr><td><p class='headingc'>1 Kanal(Residential)</p></td><td><p class='headingc'>Rs.4,460/-</p></td></tr>
            <tr><td><p class='headingc'>2 Kanal(Residential)</p></td><td><p class='headingc'>Rs.8,740/-</p></td></tr>
      </table></li>
      </ul>
      </td><td colspan='6'>
      <ul class='first'>
      <li>For Phase 8 Billing Please Dial<b> 5410387</b></li>
      <li>For queries regarding MAINTENANCE Bill Please Dial <b>5731500 ( Ext -129,140,141)</b></li>
      <li>W.e.f billing month Sep-2012 water cahrges for 1 kanal of under construction <br/> house is Rs-2000/PM as Maint/Water Charges.</li>
      <li>Monthly charges of Flats/Appts/Shops/Office/Resturant are charged from <br/>1st April-2014</li>
      </ul>
      <b></td></b></tr>";

      $slach="/";
      echo "<tr><td colspan='10'><center>------------------------------------------------------------------ <b>CUT HERE</b> ------------------------------------------------------------------</center.</b></td></tr>";
      echo "<tr><td><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'><h3 class='title'><center>BAHRIA TOWN (PVT) Ltd(MAINTENANCE BILL)</center></h3><strong>(OFFICE COPY)</strong></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>Plot/Street/Old Refrence</center></p></td><td colspan='3'><center><p class='headingc'>".$row["Plot-Number"]."$slach".$row["Street-Number"]."$slach".$row["OldRefrence"]."</center></p></td><td colspan='3'><p class='heading'>Meter Number</p><td colspan='3' id='amount'><p class='headingc'>".$row["meter#"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>BILL MONTH</p></center></td><td colspan='1'><center><p class='heading'>DUEDATE</center></p></td><td colspan='2'><center><p class='heading'>New Refrence Number</p></center></td><td colspan='3'><p class='heading'>PAYMENT WITHIN DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='headingc'>".$row["BillingMonth"]."$dash1".$row["BillingYear"]."</p></center></b></td><td colspan='1'><center><p class='headingc'>$duedateammend</p></center></b></td><td colspan='2'><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td colspan='3' ><p class='heading'>PAYMENT AFTER DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

     $slach="/";
      echo "<tr><td colspan='10'><center>------------------------------------------------------------------ <b>CUT HERE</b> ------------------------------------------------------------------</center.</b></td></tr>";
      echo "<tr><td><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'><h3 class='title'><center>BAHRIA TOWN (PVT) Ltd(MANTINENCE BILL)</center></h3><center><strong>(BANK COPY)</strong></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>Plot/Street/Old Refrence</center></p></td><td colspan='3'><center><p class='headingc'>".$row["Plot-Number"]."$slach".$row["Street-Number"]."$slach".$row["OldRefrence"]."</center></p></td><td colspan='3'><p class='heading'>Meter Number</p><td colspan='3' id='amount'><p class='headingc'>".$row["meter#"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>BILL MONTH</p></center></td><td colspan='1'><center><p class='heading'>DUEDATE</center></p></td><td colspan='2'><center><p class='heading'>New Refrence Number</p></center></td><td colspan='3'><p class='heading'>PAYMENT WITHIN DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='headingc'>".$row["BillingMonth"]."$dash1".$row["BillingYear"]."</p></center></b></td><td colspan='1'><center><p class='headingc'>$duedateammend</p></center></b></td><td colspan='2'><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td colspan='3'><p class='heading' >PAYMENT AFTER DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

     

 }
    echo "</table>";
} else {
    header('Location: sorrypage.php');
    header('Refresh: 3;url=page.php');
}
$conn->close();
?>
<html>
<head>
<link rel="stylesheet" href="css/billing.css" />
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
<script>
function tar()
    {
       var resd = document.getElementById("resd");
        //Set the print button visibility to 'hidden' 
        resd.style.visibility = 'hidden';
    }
</script>
<CENTER><input id="printpagebutton" type="button" value="Print Bill" onclick="printpage()"/></center>
</script>
</style>
</head>
<body> 
<?php
sleep(3);
?>
<?php
$servername = "bahriatownservices.com";
$username = "bahriat6_ehsan@localhost";
$password = "PAKISTAN90";
$dbname = "bahriat6_billingdb";
$ref = $_POST['ref#'];
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM bahriabilling where NewRefrence = '$ref'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    echo "<table align='center' class='main'>";
    // output data of each row
     while($row = $result->fetch_assoc()) {
       $dash="-";
       $readingdate=$row["ReadingDate"];
       $issuedate=$row["Issuedate"];
       $duedate=$row["DateDue"];
       $conndate=$row["CONN#DATE"];
       $dash1=" ";

       date_default_timezone_set('Asia/Karachi');
       

       $readdateammend=date('d-M-Y', strtotime($readingdate));
       $issuedateammend=date('d-M-Y',strtotime(($issuedate)));
       $duedateammend=date('d-M-Y',strtotime(($duedate)));
       $conndateammend=date('d-M-Y',strtotime(($conndate)));



       echo "<tr><td rowspan=3><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'>"."<h3 class='title'><center>BAHRIA TOWN (Pvt) Ltd Electricity Bill</center></h3><center><b>www.bahriatownservices.com.pk</b></center>"."</td></tr>";
       echo "<tr><td colspan='2'>"."<center><b><p class='heading'>Old Refrence</p></b></center>"."</td><td  class='color' colspan='2'>"."<center><b><p class='heading' class='color'>Billing Month</p></center></b>"."</td><td colspan='2'>"."<center><b><p class='heading'>Reading Date</p></center></b>"."</td><td colspan='2'>"."<center><b><p class='heading'>ISSUEDATE</p></b></center>"."</td><td colspan='2'>"."<center><b><p class='heading'>DUEDATE</p></b></center>"."</td></tr>";
       echo "<tr><td colspan='2'><center>".$row["OldRefrence"]."</center></td><td colspan='2' class='color'><center>".$row["BillingMonth"]."$dash1".$row["BilllingYear"]."</center></td><td colspan='2'><center><p class='heading'>$readdateammend</P></center></td><td colspan='2'><center><p class='heading'>$issuedateammend</P></center></td><td class='color' colspan='2'><center><p class='heading'>$duedateammend</P></b></center></td></tr>"; 
       echo "<tr><td>"."<center><b><p class='heading'>New Refrence</p></b></center>"."</td><td><center><b><p class='heading'>"."TARIFF"."</p></center></b></td><td><center><b><p class='heading'>"."LOAD"."</p></center></b></td><td><center><b><p class='heading'>"."METERTYPE"."</p></center></b></td><td><center><b><p class='heading'>"."Banks"."</p></center></b></td>
       
       <td colspan='6' rowspan='9' class='no-border'>
       <table class='no-border' class='child1'>
       <tr>
             <td><p class='heading'><b>Month</b></p></td>
             <td><p class='heading'><b>UNITS</b></p></td>
             <td><p class='heading'><b>BILL</b></p></td>
             <td><p class='heading'><b>PAYMENT</b></p></td>
       </tr>
      <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Jan&nbsp;&nbsp;&nbsp;".$row["jan-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["jan-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["jan"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["jan-status"]."</p></td>
      </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Feb&nbsp;&nbsp;&nbsp;".$row["feb-year"]."</p></td> 
             <td class='no-border'><p class='headingc'>".$row["feb-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["feb"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["feb-status"]."</p></td>
       </tr>
       <tr class='no-border' >
             <td class='no-border'><p class='headingc'>Mar&nbsp;&nbsp;&nbsp;".$row["mar-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["mar-units"]."</p></td>
             <td class='no-border'><p class='headingc'><p class='headingc'>".$row["mar"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["mar-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Apr&nbsp;&nbsp;&nbsp;".$row["april-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["april-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["april"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["april-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>May&nbsp;&nbsp;&nbsp;".$row["may-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["may-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["may"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["may-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>June&nbsp;&nbsp;&nbsp;".$row["june-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["june-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["june"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["jane-status"]."</p></td>
       </tr>
       <tr class='no-border'>
            <td class='no-border'><p class='headingc'>July&nbsp;&nbsp;&nbsp;".$row["july-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["july-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["july"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["july-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Aug&nbsp;&nbsp;&nbsp;".$row["aug-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["aug-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["aug"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["aug-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Sep&nbsp;&nbsp;&nbsp;".$row["sep-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["sep-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["sep"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["sep-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Oct&nbsp;&nbsp;&nbsp;".$row["oct-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["oct-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["oct"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["oct-status"]."</p></td>
       </tr>
       <tr class='no-border'>
             <td class='no-border'><p class='headingc'>Nov&nbsp;&nbsp;&nbsp;".$row["nov-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["nov-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["nov"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["nov-status"]."</p></td>
       </tr>
       <tr class='no-border'>
            <td class='no-border'><p class='headingc'>Dec&nbsp;&nbsp;&nbsp;".$row["dec-year"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["dec-units"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["dec"]."</p></td>
             <td class='no-border'><p class='headingc'>".$row["dec-status"]."</p></td>
       </tr>
       </table>
       </td></tr>";
      echo "<tr><td><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td><center><p class='headingc'>".$row["Tarrif"]."</p></center></td><td><center><p class='headingc'>".$row["Load"]."</p></td></center><td><center><p class='headingc'>".$row["Meter_Type"]."</p></center></td><td><center><p class='headingc'>"."Askari/Alfallah Islamic Bank<br>Alfallah/Askari Islamic<br/>"."</center></p></td></tr>"; 
      echo "<tr><td colspan='2'><center><b>"."NAME & ADDRESS"."</b></center></td><td colspan='1'><center><b>"."CONN.DATE"."</b><center></td><td colspan='2'><center><p class='headingc'>$conndate</p></center></td></tr>";
      echo "<tr><td colspan='5'>&nbsp;&nbsp;&nbsp;".$row["Customer-Name"]."<br/>&nbsp;&nbsp;&nbsp;"."PLOT NO/HOUSE NO"."&nbsp;.".$row["Plot-Number"]."&nbsp;"."STREET"."&nbsp;".$row["Street-Number"]."&nbsp;"."Sector"."&nbsp;".$row["Sector"]."</td></tr>";
      echo "<tr><td>"."<center><b><p class='heading'>Meter No</b></center>"."</td><td>"."<center><p class='heading'>PREVIOUS</p></center>"."</td><td>"."<center><b><p class='heading'>PRESENT</p></b></center>"."</td><td>"."<center><b><p class='heading'>MF</p></b></center>"."</td>
      <td class='no-border'><table class='no-border'><tr class='no-border'><td class='no-border'><b>UNITS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td class='leftborder'><b>STATUS</b></td></tr></table></td>
      </tr>";
      echo "<tr><td><center><p class='headingc'>".$row["Meter No"]."</p></center></td><td><center><p class='headingc'>".$row["Previous"]."</p></center></td><td><center><p class='headingc'>".$row["Present"]."</p></td></center><td><center><p class='headingc'>".$row["MF"]."</p></center></td>
      <td class='no-border'><table class='no-border'><tr class='no-border'><td class='no-border'>".$row["Total Unit"]."</td><td class='leftborder'>".$row["status"]."</td></tr></table></td>
      </tr>"; 
      echo "<tr><td>"."<center><b><p class='heading'>Total Units Consumed</p></b></center>"."</td><td colspan='2'>"."<center><b><p class='heading'>COST OF ELECTRICITY</p></b></center>"."</td><td>"."<center><b><p class='heading'>N.J Surcharge</p></b></center>"."</td>
      <td class='no-border'>
      <table class='no-border'>
      <tr class='no-border'>
       <td class='no-border'><table class='no-border'><tr class='no-border'><td class='no-border'><b>ADVANCE&nbsp;&nbsp;&nbsp;&nbsp;</b></td><td class='leftborder'><b>INCOMETAX</b></td></tr></table></td>
      </tr>
      </table></td></tr>";
      echo "<tr><td><center><p class='headingc'>".$row["Total Unit"]."</p></center></td><td colspan='2'><center><p class='headingc'>".$row["COE"]."</p></center></td><td><center><p class='headingc'>".$row["NJ"]."</p></td></center>
      <td class='no-border'>
      <table class='no-border'>
      <tr class='no-border'>
      <td class='no-border'><center><p class='headingc'>".$row["advance"]."&nbsp;&nbsp;&nbsp;&nbsp;</p></center></td><td class='leftborder'><center><p class='headingc'>".$row["Incometax"]."</p></center></td>
      </tr>
      </table>
      </td></tr>"; 
      echo "<tr><td colspan='2'>"."<center><p class='heading'>E.D&nbsp;=&nbsp;<em>".$row["ED"]."</em></p></center>"."</td><td colspan='2'>"."<center><p class='heading'>INSTALMENT&nbsp;=&nbsp;<em>0</em></p></center>"."</b></center>"."</td><td>"."<center><p class='heading'>BILL ADJUSTMENT&nbsp;=&nbsp;<em>".$row["BillAdjustment"]."</em></p></center>"."</td></tr>";
      echo "<tr><td colspan='2'>"."<center><p class='heading'>EXTRA Tax&nbsp;=&nbsp;<em>".$row["ExtraTax"]."</em></p></center>"."</td><td colspan='2'><center><em><p class='heading'>AdvanceTax&nbsp;=&nbsp;<em>".$row["AdvanceTax"]."</em></p></td><td><center><b><p class='heading'>FPA&nbsp;=&nbsp;<em>".$row["FPA"]."</em></p></center>"."</td><td colspan='3'>"."<b><p class='heading'>CURRENT BILL</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["Current Bill"]."</p></td></tr>";
      echo "<tr><td>"."<center><p class='heading'>PTV Fees</p></center>"."</td><td>"."<center><p class='heading'>G.S.T</p></td><td colspan='2'>"."<center><p class='heading'>TR Surcharge</p></td><td>"."<center><p class='heading'>Furthur Tax</center></p>"."</td><td colspan='3'>"."<b><p class='heading'>Arrears</p></b>"."</td><td id='amount' colspan='3'><em>.".$row["Arrears"]."</em></td></tr>";
      echo "<tr><td><center><p class='headingc'>".$row["PTV Fees"]."</p></center>"."</td><td>"."<center><p class='headingc'>".$row["GST"]."</p></td><td colspan='2'>"."<center><p class='headingc'>".$row["TRSurcharge"]."</p></td><td><b><center><p class='headingc'>".$row["Furthur Tax"]."</p></center></b></td><td colspan='3'>"."<b><p class='heading'>Tarrif Subsidy+GST</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>0</p></td></tr>";
      echo "<tr><td>"."<center><p class='heading'>Feeder</p></center>"."</td><td>"."<center><p class='headingc'>".$row["feeder"]."</p></td><td colspan='3' rowspan='3'>"."
      <b><center>Tarrif &nbsp;&nbsp;Subsidy &nbsp;&nbsp;GOP&nbsp;&nbsp;Units</b>
      <br/><center>
      ".$row["unitsrate1"]." - ".$row["unitsubsidy1"]." = ".$row["appliedunitrate1"]." * ".$row["appliedunit1"]."<br/>
      ".$row["unitsrate2"]." - ".$row["unitsubsidy2"]." = ".$row["appliedunitrate2"]." * ".$row["appliedunit2"]."<br/>
      </center>
      </td>

      <td colspan='3'>"."<b><p class='heading'>Payment within duedate</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td rowspan='2'>"."<center><p class='heading'>FC Surcharge&nbsp;=&nbsp;<em>".$row["FCSurcharge"]."</em></p></center>"."</td><td rowspan='2'>"."<center><p class='headingc'>Phase 8</p></td><td colspan='3'>"."<b><p class='heading'>LP.SURCHARGE</b>"."</p></td><td id='amount' colspan='3'><p class='headingc'>".$row["surcharges"]."</p></td></tr>";
      echo "<tr><td colspan='3'>"."<b><p class='heading'>Payment After Due Date</p></b>"."</td><td id='amount' colspan='3'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

      echo "<tr class='color'><td colspan='10'><center><b>Instruction</b></center></td></tr>";
      echo "<tr><td colspan='4'>
      <ul>
      <li>Incase of disconnection restration only on payment of fees as under:- 
      <table width='100%'><tr><td><b>Arrears Amount</b></td><td><b>Charges</b></td></tr>
            <tr><td><p class='headingc'>up to 1000</p></td><td><p class='headingc'>Rs.100/-</p></td></tr>
            <tr><td><p class='headingc'>Btw 1,001 to 5,000</p></td><td><p class='headingc'>Rs.300/-</p></td></tr>
            <tr><td><p class='headingc'>Btw 5,001 to 15,000</p></td><td><p class='headingc'>Rs.900/-</p></td></tr>
            <tr><td><p class='headingc'>Btw 15,001 to 1 Lac</p></td><td><p class='headingc'>Rs.2,000/-</p></td></tr>
            <tr><td><p class='headingc'>Over 5 Lac</p></td><td><p class='headingc'>Rs.10,000/-</p></td></tr>
      </table></li>
      </ul>
      </td><td colspan='6'>
      <ul>
      <li>For Web Query or any suggestion Please Dial<b> 5733277</b></li>
      <li>For electricity BILL compalints dial.5705644 (121,135)</li>
      <li>For queries regarding Electric Bill Please Dial <b>5705644 ( Ext -121,135)</b></li>
      <li>Minimum charges
      <ol>
      <li>A-1   Residential &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs-150</li>
      <li>A-2-a Commercial  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs-500</li>
      <li>Temp Supply for Const &nbsp;&nbsp;&nbsp;&nbsp; Rs-500</li>
      </li>
      </ul>
      <b></td></b></tr>";

      $slach="/";
      echo "<tr><td colspan='10'><center>------------------------------------------------------------------ <b>CUT HERE</b> ------------------------------------------------------------------</center.</b></td></tr>";
      echo "<tr><td><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'><h3 class='title'><center>BAHRIA TOWN (PVT) Ltd Electricity Bill</center></h3><strong>(OFFICE COPY)</strong></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>Plot/Street/Old Refrence</center></p></td><td colspan='3'><center><p class='headingc'>".$row["Plot-Number"]."$slach".$row["Street-Number"]."$slach".$row["OldRefrence"]."</center></p></td><td colspan='3'><p class='heading'>Meter Number</p><td colspan='3' id='amount'><p class='headingc'>".$row["Meter No"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>BILL MONTH</p></center></td><td colspan='1'><center><p class='heading'>DUEDATE</center></p></td><td colspan='2'><center><p class='heading'>New Refrence Number</p></center></td><td colspan='3'><p class='heading'>PAYMENT WITHIN DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='headingc'>".$row["BillingMonth"]."$dash1".$row["BilllingYear"]."</p></center></b></td><td colspan='1'><center><p class='headingc'>$duedateammend</p></center></b></td><td colspan='2'><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td colspan='3' ><p class='heading'>PAYMENT AFTER DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

     $slach="/";
      echo "<tr><td colspan='10'><center>------------------------------------------------------------------ <b>CUT HERE</b> ------------------------------------------------------------------</center.</b></td></tr>";
      echo "<tr><td><center><img src=\"images\logo.jpg\"></center></td><td colspan='9'><h3 class='title'><center>BAHRIA TOWN (PVT) Ltd Electricity Bill</center></h3><center><strong><img class='barcode' src ='images/barcode.jpg?D=<?php echo $duedateammend 
      ?>'>(BANK COPY)</center></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>Plot/Street/Old Refrence</center></p></td><td colspan='3'><center><p class='headingc'>".$row["Plot-Number"]."$slach".$row["Street-Number"]."$slach".$row["OldRefrence"]."</center></p></td><td colspan='3'><p class='heading'>Meter Number</p><td colspan='3' id='amount'><p class='headingc'>".$row["Meter No"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='heading'>BILL MONTH</p></center></td><td colspan='1'><center><p class='heading'>DUEDATE</center></p></td><td colspan='2'><center><p class='heading'>New Refrence Number</p></center></td><td colspan='3'><p class='heading'>PAYMENT WITHIN DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amount Due dATE"]."</p></td></tr>";
      echo "<tr><td colspan='2'><center><p class='headingc'>".$row["BillingMonth"]."$dash1".$row["BilllingYear"]."</p></center></b></td><td colspan='1'><center><p class='headingc'>$duedateammend</p></center></b></td><td colspan='2'><center><p class='headingc'>".$row["NewRefrence"]."$dash".$row["UD"]."</p></center></td><td colspan='3'><p class='heading' >PAYMENT AFTER DUE DATE</p></td><td colspan='3' id='amount'><p class='headingc'>".$row["Amountafterdate"]."</p></td></tr>";

 }
    echo "</table>";
} else {
    header('Location: sorrypage.php');
    header('Refresh: 3;url=page.php');
}
$conn->close();
?>
<?php
session_start();
require_once("classes/pdfClass.php");
function replaceWithOnes($arr){
  foreach($arr as $key=>$val){
    if (is_array($val)){
       $arr[$key] = replaceWithZeroes($arr[$key]);
    } else {
       if ($val == 0) $arr[$key] = 1;
    }
  }
  return $arr;
}
if(isset($_POST['pdf'])){
    $pdf = new PDF('P','pt','A4');
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->AddPage();
    $pdf->Cell(20,10,'Total Expenditure: Euro: ' . number_format($_SESSION['totalexpenditure'],2,".",","),0,1);
    $pdf->Ln(8);
    $data = array(
    "Housing" => $_SESSION['houseing'],
    "House Keeping" => $_SESSION['housekeeping'],
    "Protection" => $_SESSION['protection'],
    "Loans" => $_SESSION['loanstotal'],
    "Bad Habits" => $_SESSION['badhabits'],
    "Good Habits" => $_SESSION['goodhabits'],
    "Travel" => $_SESSION['travel']);
    //colours
    $col1=array(255,163,224);
    $col2=array(102,194,255);
    $col3=array(102,168,102);
    $col4=array(255,102,102);
    $col5=array(176,176,210);
    $col6=array(163,194,163);
    $col7=array(194,163,102);
    //make the piechart
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    $pdf->PieChart(400, 400, $data, '%l (%p)',array($col1,$col2,$col3,$col4,$col5,$col6,$col7));
    $pdf->SetXY($valX, $valY + 410);
    //$pdf->AddPage();
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Housing: Euro: ' .  number_format($_SESSION['houseing'],2,".",",") ,0,1);
    $pdf->Ln(8);
    $data1 =array(
        "Mortgage /Rent: " => $_SESSION['renttotal'],
        "Mortgage Protection" => $_SESSION['mortgageprotectiontotal'],
        "Gas" => $_SESSION['gastotal'],
        "Electricity" => $_SESSION['electrictotal'],
        "Broadband" => $_SESSION['broadbandtotal'],
        "Phone" => $_SESSION['phonetotal'],
        "Waste" => $_SESSION['wastetotal'],
        "TV" => $_SESSION['tvtotal']
    );
    if($_SESSION['houseing'] != 0){
        $pdf->BarDiagram(500, 200, $data1, '%l : %v (%p)',$col1);
    }
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Travel: Euro: ' . number_format($_SESSION['travel'],2,".",","),0,1);
    $pdf->Ln(8);
    $data2 =array(
        "Car Payment" => $_SESSION['carpaymenttotal'],
        "Vehicle Tax" => $_SESSION['vehicletaxtotal'],
        "Vehicle Fuel" => $_SESSION['vehiclefueltotal'],
        "Vehicle Insurance" => $_SESSION['vehicleinsurancetotal'],
        "Commuting" => $_SESSION['commutingtotal']
    );
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    if($_SESSION['travel'] != 0){
        $pdf->BarDiagram(500, 200, $data2, '%l : %v (%p)',$col2);
    }
    $pdf->SetXY($valX, $valY + 240);
    //$pdf->AddPage();
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'House Keeping: Euro: ' . number_format($_SESSION['housekeeping'],2,".",","),0,1);
    $pdf->Ln(8);
    $data3 =array(
        "Groceries " => $_SESSION['groceriestotal'],
        "Lunch" => $_SESSION['lunchtotal'],
        "Kids Lunch" => $_SESSION['kidslunchtotal'],
        "Personal Items" => $_SESSION['personalitemstotal'],
        "Literature" => $_SESSION['literaturetotal']
    );
    if($_SESSION['housekeeping'] != 0){
        $pdf->BarDiagram(500, 200, $data3, '%l : %v (%p)',$col3);
    }
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Protection: Euro: ' . number_format($_SESSION['protection'],2,".",","),0,1);
    $pdf->Ln(8);
    $data4 =array(
        "House Insurance" => $_SESSION['insurancetotal'],
        "Life Protection" => $_SESSION['lifeprotectiontotal'],
        "Health Insurance" => $_SESSION['healthinsurancetotal'],
        "Pension" => $_SESSION['pensiontotal'],
        "Income Protection" => $_SESSION['incomeprotectiontotal']
    );
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    if($_SESSION['protection'] != 0){
        $pdf->BarDiagram(500, 200, $data4, '%l : %v (%p)',$col4);
    }
    $pdf->SetXY($valX, $valY + 240);
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Bad Habits: Euro: ' . number_format($_SESSION['badhabits'],2,".",","),0,1);
    $pdf->Ln(8);
    $data5 =array(
        "Smoking" => $_SESSION['smokingtotal'],
        "Drinking" => $_SESSION['drinkingtotal'],
        "Snacks" => $_SESSION['snacktotal'],
        "Fast Food" => $_SESSION['fastfoodtotal'],
        "Gambling" => $_SESSION['gamblingtotal'],
        "Parking Tickets" => $_SESSION['parkingtickettotal'],
        "Fines" => $_SESSION['finestotal']
    );
    if($_SESSION['badhabits'] != 0){
        $pdf->BarDiagram(500, 200, $data5, '%l : %v (%p)',$col5);
    }
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Good Habits Euro: ' . number_format($_SESSION['goodhabits'],2,".",","),0,1);
    $pdf->Ln(8);
    $data5 =array(
        "Entertainment" => $_SESSION['entertainmenttotal'],
        "Gym" => $_SESSION['gymtotal'],
        "Holidays" => $_SESSION['holidaytotal'],
        "Pet Expenses" => $_SESSION['petexpensestotal'],
        "Savings" => $_SESSION['savingstotal']
    );
    $valX = $pdf->GetX();
    $valY = $pdf->GetY();
    if($_SESSION['goodhabits'] != 0){
        $pdf->BarDiagram(500, 200, $data5, '%l : %v (%p)',$col6);
    }
    $pdf->SetXY($valX, $valY + 240);
    $pdf->SetFont('Arial', 'U', 12);
    $pdf->Cell(20,10,'Loans and Credits Cards: Euro: '. number_format($_SESSION['loanstotal'],2,".",","),0,1);
    $pdf->Ln(8);
    $data6 =array(
        "Credit Card 1" => $_SESSION['creditcard1total'],
        "Credit Card 2" => $_SESSION['creditcard2total'],
        "Credit Card 3" => $_SESSION['creditcard3total'],
        "Loan 1" => $_SESSION['loan1total'],
        "Loan 2" => $_SESSION['loan2total'],
        "Loan 3" => $_SESSION['loan3total'],
        "Loan 4" => $_SESSION['loan4total'],
        "Loan 5" => $_SESSION['loan5total'],
    );
    if($_SESSION['loanstotal'] != 0){
        $pdf->BarDiagram(500, 200, $data6, '%l : %v (%p)',$col7);
    }
    $filename = "CredyCare_Budget_360_Advice_" . date("d-m-Y_H-i",time()) . ".pdf";
    $pdf->Output($filename, "D");
}
if(isset($_POST['emailme'])){
require('classes/class.phpmailer.php');
//read in email
    $email = Trim(stripslashes($_POST['email']));
    //Convert to SESSION VARS
    $body = "- Housing - \n";
    $body .= "Rent / Mort: " . number_format($_SESSION['renttotal'], 2, '.', ',') . "\n";
    $body .= "Mortgage Protection: " . number_format($_SESSION['mortgageprotectiontotal'], 2, '.', ','). "\n";
    $body .= "Gas: " . number_format($_SESSION['gastotal'], 2, '.', ','). "\n";
    $body .= "Electricity: " . number_format($_SESSION['electrictotal'], 2, '.', ','). "\n";
    $body .= "Broadband: " .  number_format($_SESSION['broadbandtotal'], 2, '.', ','). "\n";
    $body .= "Phone: "  .number_format( $_SESSION['phonetotal'], 2, '.', ',') . "\n";
    $body .= "Waste: " . number_format($_SESSION['wastetotal'], 2, '.', ','). "\n";
    $body .= "TV: " . number_format($_SESSION['tvtotal'], 2, '.', ','). "\n\n";
    $body .= "- Travel - \n";
    $body .= "Car Payments: " . number_format($_SESSION['carpaymenttotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Tax: " . number_format($_SESSION['vehicletaxtotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Fuel: " . number_format($_SESSION['vehiclefueltotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Insurance: " . number_format($_SESSION['vehicleinsurancetotal'], 2, '.', ','). "\n";
    $body .= "Commuting: " . number_format($_SESSION['commutingtotal'], 2, '.', ','). "\n\n";
    $body .= "- Food and Housekeeping - \n";
    $body .= "Groceries: " . number_format($_SESSION['groceriestotal'], 2, '.', ',') . "\n";
    $body .= "Lunch: " . number_format($_SESSION['lunchtotal'], 2, '.', ',') . "\n";
    $body .= "Kids Lunch: " . number_format($_SESSION['kidslunchtotal'], 2, '.', ','). "\n";
    $body .= "Personal Items: " . number_format($_SESSION['personalitemstotal'], 2, '.', ','). "\n";
    $body .= "Literature: " . number_format($_SESSION['literaturetotal'], 2, '.', ','). "\n\n";
    $body .= "- Protection - \n";
    $body .= "house insurnace: " . number_format($_SESSION['insurancetotal'], 2, '.', ','). "\n";
    $body .= "Life Protection: " . number_format($_SESSION['lifeprotectiontotal'], 2, '.', ','). "\n";
    $body .= "Health Insurance: " . number_format($_SESSION['healthinsurancetotal'], 2, '.', ','). "\n";
    $body .= "Pension: " . number_format($_SESSION['pensiontotal'], 2, '.', ','). "\n";
    $body .= "Income Protection: " . number_format($_SESSION['incomeprotectiontotal'], 2, '.', ','). "\n\n";
    $body .= "- Bad Habits - \n";
    $body .= "Smoking: " . number_format($_SESSION['smokingtotal'], 2, '.', ','). "\n";
    $body .= "Drinking: " . number_format($_SESSION['drinkingtotal'], 2, '.', ','). "\n";
    $body .= "Snacks: " .number_format($_SESSION['snacktotal'], 2, '.', ','). "\n";
    $body .= "Fast Food: " . number_format($_SESSION['fastfoodtotal'], 2, '.', ','). "\n";
    $body .= "Gambling: " . number_format($_SESSION['gamblingtotal'], 2, '.', ','). "\n";
    $body .= "Parking Tickets: " . number_format($_SESSION['parkingticketstotal'], 2, '.', ','). "\n";
    $body .= "Fines: " . number_format($_SESSION['finestotal'], 2, '.', ','). "\n\n";
    $body .= "- Good Habits- \n";
    $body .= "Entertainment: " . number_format($_SESSION['entertainmenttotal'], 2, '.', ','). "\n";
    $body .= "Gym: " . number_format($_SESSION['gymtotal'], 2, '.', ','). "\n";
    $body .= "Holidays: " . number_format($_SESSION['holidaytotal'], 2, '.', ','). "\n";
    $body .= "Pet Expenses: " . number_format($_SESSION['petexpensestotal'], 2, '.', ','). "\n";
    $body .= "Savings: " . number_format($_SESSION['savingstotal'], 2, '.', ','). "\n\n";
    $body .= "- Loans and Credit Cards - \n";
    $body .= "Credit Card 1: " . number_format($_SESSION['creditcard1total'], 2, '.', ','). "\n";
    $body .= "Credit Card 2: " . number_format($_SESSION['creditcard2total'], 2, '.', ','). "\n";
    $body .= "Credit Card 3: " . number_format($_SESSION['creditcard3total'], 2, '.', ','). "\n";
    $body .= "Loan 1: " . number_format($_SESSION['loan1total'], 2, '.', ','). "\n";
    $body .= "Loan 2: " . number_format($_SESSION['loan2total'], 2, '.', ','). "\n";
    $body .= "Loan 3: " . number_format($_SESSION['loan3total'], 2, '.', ','). "\n";
    $body .= "Loan 4: " . number_format($_SESSION['loan4total'], 2, '.', ','). "\n";
    $body .= "Loan 5: " . number_format($_SESSION['loan5total'], 2, '.', ','). "\n";
    $body .= "\nTotal: " . number_format($_SESSION['totalexpenditure'], 2, '.', ',');
    
    try{
        $mail = new PHPMailer();
        $mail->IsSMTP(); // telling the class to use SMTP
         $mail->SMTPAuth   = true;
        $mail->Host = "mail.johnjoallen.com";
        $mail->Port = 25;
        $mail->SMTPDebug  = 2;
        $mail->Username = "john@johnjoallen.com";
        $mail->Password = "butchers2";
        //email
        $mail->AddAddress($email);
        $mail->SetFrom("info@credycare.ie", 'Credy Care LTD');
        $mail->AddReplyTo("info@credycare.ie","Credy Care");
        $mail->Subject = "Credy Care - Budget 360 Evaluation";
        $mail->From = "info@credycare.ie";
        $mail->FromName = "Credy Care LTD";
        $mail->Body = $body;

        if($mail->Send()){
            header('Location:outcome.php?&msg=Email Sent');
        }
    } catch (phpmailerException $e){
         header('Location:outcome.php?&msg=' . $e->errorMessage());
    }
}
if(isset($_POST['emailcredy'])){
    require('classes/class.phpmailer.php');
    //read in email
    $email = Trim(stripslashes($_POST['email']));
    $name = Trim(stripslashes($_POST['name']));
    $phone = Trim(stripslashes($_POST['phone']));
    $to = "markd@credycare.ie";
    $subject = "CredyCare Budget 360 Evaluation";
    //Convert to SESSION VARS

    $body = "Name: " . $name . "\n";
    $body .= "Phone: " .$phone. "\n";
    $body .= "Email: " . $email . "\n\n";
    $body .= "Total Income: " . number_format($_SESSION['income'], 2, '.', ',') . "\n\n";
    $body .= "- Housing - \n";
    $body .= "Rent / Mort: " . number_format($_SESSION['renttotal'], 2, '.', ',') . "\n";
    $body .= "Mortgage Protection: " . number_format($_SESSION['mortgageprotectiontotal'], 2, '.', ','). "\n";
    $body .= "Gas: " . number_format($_SESSION['gastotal'], 2, '.', ','). "\n";
    $body .= "Electricity: " . number_format($_SESSION['electrictotal'], 2, '.', ','). "\n";
    $body .= "Broadband: " .  number_format($_SESSION['broadbandtotal'], 2, '.', ','). "\n";
    $body .= "Phone: "  .number_format( $_SESSION['phonetotal'], 2, '.', ',') . "\n";
    $body .= "Waste: " . number_format($_SESSION['wastetotal'], 2, '.', ','). "\n";
    $body .= "TV: " . number_format($_SESSION['tvtotal'], 2, '.', ','). "\n\n";
    $body .= "- Travel - \n";
    $body .= "Car Payments: " . number_format($_SESSION['carpaymenttotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Tax: " . number_format($_SESSION['vehicletaxtotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Fuel: " . number_format($_SESSION['vehiclefueltotal'], 2, '.', ','). "\n";
    $body .= "Vehicle Insurance: " . number_format($_SESSION['vehicleinsurancetotal'], 2, '.', ','). "\n";
    $body .= "Commuting: " . number_format($_SESSION['commutingtotal'], 2, '.', ','). "\n\n";
    $body .= "- Food and Housekeeping - \n";
    $body .= "Groceries: " . number_format($_SESSION['groceriestotal'], 2, '.', ',') . "\n";
    $body .= "Lunch: " . number_format($_SESSION['lunchtotal'], 2, '.', ',') . "\n";
    $body .= "Kids Lunch: " . number_format($_SESSION['kidslunchtotal'], 2, '.', ','). "\n";
    $body .= "Personal Items: " . number_format($_SESSION['personalitemstotal'], 2, '.', ','). "\n";
    $body .= "Literature: " . number_format($_SESSION['literaturetotal'], 2, '.', ','). "\n\n";
    $body .= "- Protection - \n";
    $body .= "house insurnace: " . number_format($_SESSION['insurancetotal'], 2, '.', ','). "\n";
    $body .= "Life Protection: " . number_format($_SESSION['lifeprotectiontotal'], 2, '.', ','). "\n";
    $body .= "Health Insurance: " . number_format($_SESSION['healthinsurancetotal'], 2, '.', ','). "\n";
    $body .= "Pension: " . number_format($_SESSION['pensiontotal'], 2, '.', ','). "\n";
    $body .= "Income Protection: " . number_format($_SESSION['incomeprotectiontotal'], 2, '.', ','). "\n\n";
    $body .= "- Bad Habits - \n";
    $body .= "Smoking: " . number_format($_SESSION['smokingtotal'], 2, '.', ','). "\n";
    $body .= "Drinking: " . number_format($_SESSION['drinkingtotal'], 2, '.', ','). "\n";
    $body .= "Snacks: " .number_format($_SESSION['snacktotal'], 2, '.', ','). "\n";
    $body .= "Fast Food: " . number_format($_SESSION['fastfoodtotal'], 2, '.', ','). "\n";
    $body .= "Gambling: " . number_format($_SESSION['gamblingtotal'], 2, '.', ','). "\n";
    $body .= "Parking Tickets: " . number_format($_SESSION['parkingticketstotal'], 2, '.', ','). "\n";
    $body .= "Fines: " . number_format($_SESSION['finestotal'], 2, '.', ','). "\n\n";
    $body .= "- Good Habits- \n";
    $body .= "Entertainment: " . number_format($_SESSION['entertainmenttotal'], 2, '.', ','). "\n";
    $body .= "Gym: " . number_format($_SESSION['gymtotal'], 2, '.', ','). "\n";
    $body .= "Holidays: " . number_format($_SESSION['holidaytotal'], 2, '.', ','). "\n";
    $body .= "Pet Expenses: " . number_format($_SESSION['petexpensestotal'], 2, '.', ','). "\n";
    $body .= "Savings: " . number_format($_SESSION['savingstotal'], 2, '.', ','). "\n\n";
    $body .= "- Loans and Credit Cards - \n";
    $body .= "Credit Card 1: " . number_format($_SESSION['creditcard1total'], 2, '.', ','). "\n";
    $body .= "Credit Card 2: " . number_format($_SESSION['creditcard2total'], 2, '.', ','). "\n";
    $body .= "Credit Card 3: " . number_format($_SESSION['creditcard3total'], 2, '.', ','). "\n";
    $body .= "Loan 1: " . number_format($_SESSION['loan1total'], 2, '.', ','). "\n";
    $body .= "Loan 2: " . number_format($_SESSION['loan2total'], 2, '.', ','). "\n";
    $body .= "Loan 3: " . number_format($_SESSION['loan3total'], 2, '.', ','). "\n";
    $body .= "Loan 4: " . number_format($_SESSION['loan4total'], 2, '.', ','). "\n";
    $body .= "Loan 5: " . number_format($_SESSION['loan5total'], 2, '.', ','). "\n";
    $body .= "\nTotal: " . number_format($_SESSION['totalexpenditure'], 2, '.', ',');

     try{
        $mail = new PHPMailer();
        $mail->IsSMTP();
         $mail->SMTPAuth   = true;
        $mail->Host = "mail.johnjoallen.com";
        $mail->Port = 25;
        $mail->SMTPDebug  = 2;
        $mail->Username = "john@johnjoallen.com";
        $mail->Password = "butchers2";
        //email
        $mail->AddAddress("markd@credycare.ie");
        $mail->SetFrom("info@credycare.ie", 'Credy Care LTD');
        $mail->AddReplyTo("info@credycare.ie","Credy Care");
        $mail->Subject = "Credy Care - Budget 360 Evaluation";
        $mail->From = "info@credycare.ie";
        $mail->FromName = "Credy Care LTD";
        $mail->Body = $body;

        if($mail->Send()){
            header('Location:outcome.php?&msg=Email Sent');
        }
    } catch (phpmailerException $e){
         header('Location:outcome.php?&msg=' . $e->errorMessage());
    }
}
?>
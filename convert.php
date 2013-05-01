<?php
session_start();
//clean the arrays
function replaceWithZeroes($arr){
  foreach($arr as $key=>$val){
    if (is_array($val)){
       $arr[$key] = replaceWithZeroes($arr[$key]);
    } else {
       if ($val == '') $arr[$key] = 0;
    }
  }
  return $arr;
}
$_SESSION = array_merge($_SESSION, $_POST);
//get rid of null val
$_SESSION = replaceWithZeroes($_SESSION);
//dependencies
require('classes/FusionCharts_Gen.php');
require_once('classes/budget360.class.php');
$chartloc = "charts/";
//read in a parse data
$income = Trim(stripslashes($_SESSION['income']));
$budget = new Budget360();
//calculate totals for each expenditure item
$renttotal = $budget->addItemTotal($_SESSION['rent'], $_SESSION['rentrate']);
$mortgageprotectiontotal = $budget->addItemTotal($_SESSION['mortgageprotection'], $_SESSION['mortprorate']);
$gastotal = $budget->addItemTotal($_SESSION['gas'], $_SESSION['gasrate']);
$electrictotal = $budget->addItemTotal($_SESSION['electricity'], $_SESSION['electricrate']);
$broadbandtotal = $budget->addItemTotal($_SESSION['broadband'], $_SESSION['broadbandrate']);
$phonetotal = $budget->addItemTotal($_SESSION['phone'], $_SESSION['phonerate']);
$wastetotal = $budget->addItemTotal($_SESSION['waste'], $_SESSION['wasterate']);
$tvtotal = $budget->addItemTotal($_SESSION['tv'], $_SESSION['tvrate']);
//Travel Payments
$carpaymenttotal = $budget->addItemTotal($_SESSION['car'], $_SESSION['carrate']);
$vehicletaxtotal = $budget->addItemTotal($_SESSION['vehicletax'], $_SESSION['vtaxrate']);
$vehiclefueltotal = $budget->addItemTotal($_SESSION['vehiclefuel'], $_SESSION['vfuelrate']);
$vehicleinsurancetotal = $budget->addItemTotal($_SESSION['vehicleinsurance'], $_SESSION['vinsurancerate']);
$commutingtotal = $budget->addItemTotal($_SESSION['commuting'], $_SESSION['commutingrate']);
//Household / food expenditures
$groceriestotal = $budget->addItemTotal($_SESSION['groceries'], $_SESSION['groceriesrate']);
$lunchtotal = $budget->addItemTotal($_SESSION['lunch'], $_SESSION['lunchrate']);
$kidslunchtotal = $budget->addItemTotal($_SESSION['kidslunch'], $_SESSION['kidslunchrate']);
$personalitemstotal = $budget->addItemTotal($_SESSION['personalitems'], $_SESSION['personalitemsrate']);
$literaturetotal = $budget->addItemTotal($_SESSION['literature'], $_SESSION['literaturerate']);
//Protection Expenses
$insurancetotal = $budget->addItemTotal($_SESSION['insurance'], $_SESSION['insurancerate']);
$lifeprotectiontotal = $budget->addItemTotal($_SESSION['lifeprotection'], $_SESSION['lifeprotectionrate']);
$healthinsurancetotal = $budget->addItemTotal($_SESSION['healthinsurance'], $_SESSION['healthinsurancerate']);
$pensiontotal = $budget->addItemTotal($_SESSION['pension'], $_SESSION['pensioninsurancerate']);
$incomeprotectiontotal = $budget->addItemTotal($_SESSION['incomeprotection'], $_SESSION['incomeprotectionrate']);
//Bad Habits
$smokingtotal = $budget->addItemTotal($_SESSION['smoking'], $_SESSION['smokingrate']);
$drinkingtotal = $budget->addItemTotal($_SESSION['drinking'], $_SESSION['drinkingrate']);
$snacktotal = $budget->addItemTotal($_SESSION['snacks'], $_SESSION['snackrate']);
$fastfoodtotal = $budget->addItemTotal($_SESSION['fastfood'], $_SESSION['fastfoodrate']);
$gamblingtotal = $budget->addItemTotal($_SESSION['gambling'], $_SESSION['gamblingrate']);
$parkingtickettotal = $budget->addItemTotal($_SESSION['parkingtickets'], $_SESSION['parkingticketrate']);
$finestotal = $budget->addItemTotal($_SESSION['fines'], $_SESSION['finesrate']);
//Good Habits
$entertainmenttotal = $budget->addItemTotal($_SESSION['entertainment'], $_SESSION['entertainmentrate']);
$gymtotal = $budget->addItemTotal($_SESSION['gym'], $_SESSION['gymrate']);
$holidaytotal = $budget->addItemTotal($_SESSION['holiday'], $_SESSION['holidayrate']);
$petexpensestotal = $budget->addItemTotal($_SESSION['petexpenses'], $_SESSION['petexpense']);
$savingstotal = $budget->addItemTotal($_SESSION['savings'], $_SESSION['savingsrate']);
//Loans and Credit cards
$creditcard1total = $budget->addItemTotal($_SESSION['creditcard1'], $_POST['creditcard1rate']);
$creditcard2total = $budget->addItemTotal($_SESSION['creditcard2'], $_POST['creditcard2rate']);
$creditcard3total = $budget->addItemTotal($_SESSION['creditcard3'], $_POST['creditcard3rate']);
$loan1total = $budget->addItemTotal($_SESSION['loan1'], $_SESSION['loan1rate']);
$loan2total = $budget->addItemTotal($_SESSION['loan2'], $_SESSION['loan2rate']);
$loan3total = $budget->addItemTotal($_SESSION['loan3'], $_SESSION['loan3rate']);
$loan4total = $budget->addItemTotal($_SESSION['loan4'], $_SESSION['loan4rate']);
$loan5total = $budget->addItemTotal($_SESSION['loan5'], $_SESSION['loan5rate']);

//Convert to SESSION VARS
$_SESSION['renttotal'] = $renttotal;
$_SESSION['mortgageprotectiontotal'] = $mortgageprotectiontotal;
$_SESSION['gastotal'] = $gastotal;
$_SESSION['electrictotal']= $electrictotal;
$_SESSION['broadbandtotal'] = $broadbandtotal;
$_SESSION['phonetotal'] = $phonetotal;
$_SESSION['wastetotal'] = $wastetotal;
$_SESSION['tvtotal'] = $tvtotal;
//Travel Payments
$_SESSION['carpaymenttotal'] = $carpaymenttotal;
$_SESSION['vehicletaxtotal'] = $vehicletaxtotal;
$_SESSION['vehiclefueltotal'] = $vehiclefueltotal;
$_SESSION['vehicleinsurancetotal'] = $vehicleinsurancetotal;
$_SESSION['commutingtotal'] = $commutingtotal;
//Household / food expenditures
$_SESSION['groceriestotal'] = $groceriestotal;
$_SESSION['lunchtotal'] = $lunchtotal;
$_SESSION['kidslunchtotal'] = $kidslunchtotal;
$_SESSION['personalitemstotal'] = $personalitemstotal;
$_SESSION['literaturetotal'] = $literaturetotal;
//Protection Expenses
$_SESSION['insurancetotal'] = $insurancetotal;
$_SESSION['lifeprotectiontotal'] = $lifeprotectiontotal;
$_SESSION['healthinsurancetotal'] = $healthinsurancetotal;
$_SESSION['pensiontotal'] = $pensiontotal;
$_SESSION['incomeprotectiontotal'] = $incomeprotectiontotal;
//Bad Habits
$_SESSION['smokingtotal'] = $smokingtotal;
$_SESSION['drinkingtotal'] = $drinkingtotal;
$_SESSION['snacktotal'] = $snacktotal;
$_SESSION['fastfoodtotal'] = $fastfoodtotal;
$_SESSION['gamblingtotal'] = $gamblingtotal;
$_SESSION['parkingtickettotal'] = $parkingtickettotal;
$_SESSION['finestotal'] = $finestotal;
//Good Habits
$_SESSION['entertainmenttotal'] = $entertainmenttotal;
$_SESSION['gymtotal'] = $gymtotal;
$_SESSION['holidaytotal'] = $holidaytotal;
$_SESSION['petexpensestotal'] = $petexpensestotal;
$_SESSION['savingstotal'] = $savingstotal;
//Loans and Credit cards
$_SESSION['creditcard1total'] = $creditcard1total;
$_SESSION['creditcard2total'] = $creditcard2total;
$_SESSION['creditcard3total'] = $creditcard3total;
$_SESSION['loan1total'] = $loan1total;
$_SESSION['loan2total'] = $loan2total;
$_SESSION['loan3total'] = $loan3total;
$_SESSION['loan4total'] = $loan4total;
$_SESSION['loan5total'] = $loan5total;

//calculate totals
$loanstotal = $budget->totalLoans($creditcard1total, $creditcard2total, $creditcard3total, $loan1total, $loan2total, $loan3total, $loan4total, $loan5total);
$goodhabits = $budget->totalGoodHabits($entertainmenttotal, $gymtotal, $holidaytotal, $petexpensestotal, $savingstotal);
$badhabits = $budget->totalBadHabits($smokingtotal, $drinkingtotal, $snacktotal, $fastfoodtotal, $gamblingtotal, $parkingtickettotal, $finestotal);
$protection = $budget->totalProtection($insurancetotal, $lifeprotectiontotal, $healthinsurancetotal, $pensiontotal, $incomeprotectiontotal);
$housekeeping = $budget->totalHouskeeping($groceriestotal, $lunchtotal, $kidslunchtotal, $personalitemstotal, $literaturetotal);
$travel = $budget->totalTravel($carpaymenttotal, $vehicletaxtotal, $vehiclefueltotal, $vehicleinsurancetotal, $commutingtotal);
$houseing = $budget->totalHousing($renttotal, $mortgageprotectiontotal, $gastotal, $electrictotal, $broadbandtotal, $phonetotal, $wastetotal, $tvtotal);

$_SESSION['loanstotal'] = $loanstotal;
$_SESSION['goodhabits'] = $goodhabits;
$_SESSION['badhabits'] = $badhabits;
$_SESSION['protection'] = $protection;
$_SESSION['housekeeping'] = $housekeeping;
$_SESSION['travel'] = $travel;
$_SESSION['houseing'] = $houseing;

$totalexpenditure = $loanstotal + $goodhabits + $badhabits + $protection + $housekeeping + $travel + $houseing;
$_SESSION['totalexpenditure'] = $totalexpenditure;
?>
<meta http-equiv="refresh" content="0;url=outcome.php">
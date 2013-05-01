<?php
session_start();
require('classes/FusionCharts_Gen.php');
$chartloc = "charts/";
//include the header
include('header.php');
?>
<!-- fullpage -->
<div id="fullpage">
<div id="page">
<div class="budgethead">
	<div class="progress">
		<img src="images/progress-outcome.png" height="36px" width="305px" title="Income" />
	</div>
    <p><img src="images/budgetlogo.png" height="59px" width="238px" alt="Budget 360" title="Budget 360 - Credy Care" /></p>
<h1>Outcome</h1>
</div>
<div id="sidebar">
        <div class="sidebaritem">
            <div id="aboutbox">
                <p>
                    Tip<br />
                    Scroll down the page to see more of your current budget
                </p>
            </div>
            <p><br/><a href="index.php" title="Start Again"><img src="images/startagain_btn.png" height="65px" alt="Start Again" title="Start Again"width="174px" /></a></p>
            <p><a id="showpopup" href="#popupform" title="Contact Us Now"><img src="images/contact.png" height="65px" width="174px" /></a></p>
            <?php
            $user = $_SERVER['HTTP_USER_AGENT'];
            if(!preg_match('/MSIE/',$user)){
            echo('<form action="outcome-resource.php" method="post" name="todo">
                 <p><input type="image" src="images/getpdf.png" value="pdf" name="pdf" /></p>
                  </form>');
              }
            ?>
            <p><a id="showemail" href="#emailpopup" title="Email the Results"><img src="images/email.png" height="65px" width="174px" /></a></p>
            <div style="display: none;">
                <a id="onloadselector" href="#alert" Title="Message">onload</a>
                <div id="alert" style="height:100px; width: 600px; overflow: auto;">
                    <p><?php
                    if(isset($_GET['msg'])){
                        echo($_GET['msg']);
                    }
                    if($_SESSION['display'] == 0){
                        if($_SESSION['lifeprotectiontotal'] == 0 || $_SESSION['mortgageprotectiontotal'] == 0 || $_SESSION['insurancetotal'] == 0 || $_SESSION['healthinsurancetotal'] == 0){
                            echo("We notice that you have not filled in any expenditure for <span style='color:#000000'>");
                            if($_SESSION['lifeprotectiontotal'] == 0){
                                echo('Life Assurance, ');
                            }
                            if($_SESSION['mortgageprotectiontotal'] == 0){
                                echo('Mortgage Protection, ');
                            }
                            if($_SESSION['insurancetotal'] == 0){
                                echo('Home &amp; Contents Insurance, ');
                            }
                            if($_SESSION['healthinsurancetotal'] == 0){
                                echo('Health Insurance ');
                            }
                            echo('</span>on your personal budget planner.
                                This is a critical protection for you and your family.
                                Our team can provide you with a range of affordable options to suit your current household budget.');
                        }
                      $_SESSION['display'] = 1;
                    }
                    ?>
                    </p>
                </div>
            </div>
            <div style="display: none;">
                <div id="emailpopup" style="height:180px; width: 280px; overflow: auto;">
                    <form action="outcome-resource.php" id="popupemail" method="post" >
                        <h2>Email Yourself the results!</h2>
                        <table>
                        <tr><td><input type="text" name="email" id="email" value="enter your email" onfocus="this.value='';" /></td></tr>
                        <tr><td align="center"><input type="submit" name="emailme" value="submit" /></td></tr>
                        </table>
                    </form>
                    <p>*Submitting this form does not submit any financial data to Credy Care</p>
                </div>
            </div>

            <div style="display: none;">
                <div id="popupform" style="height:400px; width: 300px; overflow: auto;">
                    <form action="outcome-resource.php" id="formpopup" method="post" >
                        <h2>Contact Us!</h2>
                        <table>
                        <tr><td>Name:</td></tr>
                        <tr><td><input type="text" name="name" id="name" value="enter your name" onfocus="this.value='';" /></td></tr>
                        <tr><td>Email:</td></tr>
                        <tr><td><input type="text" name="email" id="email" value="enter your email" onfocus="this.value='';" /></td></tr>
                        <tr><td>Phone:</td></tr>
                        <tr><td><input type="text" name="phone" id="phone" value="enter you phone number" onfocus="this.value='';" /></td></tr>
                        <tr><td><input type="submit" name="emailcredy" value="submit" /></td></tr>
                        </table>
                    </form>
                    <p>*Credy Care will recieve your financial information and contact you shortly</p>
                </div>
            </div>
        </div>
    </div>
<div class="expenditures">
    <div id="piechart">
            <div class="rightfloat">
                <?php 
                //chart setup
                $piechart = new FusionCharts("Pie3D","500","275","",true);
                $piechart->setSWFPath($chartloc);
                $piechart->setChartParams("animation=0;baseFontSize=14;pieRadius=130;showPercentageValueisSliced=1;caption=Mouse over the piechart to see more information;xAxisName=Expenditures;showValues=0;yAxisName=Expenditures;numberPrefix=€;decialPrecision=2;formatNumberScale=0;decimalPrecision=0");
                $piechart->addChartData($_SESSION['loanstotal'], "name=Loans;hoverText=Loans");
                $piechart->addChartData($_SESSION['protection'], "name=Protection;hoverText=Protecion");
                $piechart->addChartData($_SESSION['housekeeping'], "name=HouseKeeping;hoverText=Housekeeping");
                $piechart->addChartData($_SESSION['houseing'], "name=Housing;hoverText=Housing");
                $piechart->addChartData($_SESSION['travel'], "name=Travel;hoverText=Travel");
                $piechart->addChartData($_SESSION['goodhabits'], "name=GoodHabits;hoverText=Good Habits");
                $piechart->addChartData($_SESSION['badhabits'], "name=BadHabits;hoverText=Bad Habits");
                $piechart->renderChart();
                unset($piechart);
                ?>
            </div>
            <p id="piechartinfo">
                This is how your lifestyle and expenses is a reflection on your current budget:</p>
            <h2>Total Income &euro;<?php echo number_format($_SESSION['income'],2,'.',','); ?></h2>
            <?php
            if($_SESSION['totalexpenditure'] > $_SESSION['income']){
                echo("<h2 style='color:red'>Total expenditure &euro; " . number_format($_SESSION['totalexpenditure'],2,'.',',') . "</h2>
                    <p style='color:red'>
                    *Your finances are in trouble. Your Spending more than you earn. Speak to a money saving expert today</p>");
            } else {
                echo("<h2>Total expenditure &euro; " . number_format($_SESSION['totalexpenditure'],2,'.',',') . "</h2>");
            }
            ?>
                    <ul class="piechartlist">
                        <li>Housing: &euro;<?php echo number_format($_SESSION['houseing'],2,'.',''); ?></li>
                        <li>Travel: &euro;<?php echo number_format($_SESSION['travel'],2,'.',''); ?></li>
                        <li>House Keeping: &euro;<?php echo number_format($_SESSION['housekeeping'],2,'.',''); ?></li>
                        <li>Protection: &euro;<?php echo number_format($_SESSION['protection'],2,'.',''); ?></li>
                        <li>Good Habits: &euro;<?php echo number_format($_SESSION['goodhabits'],2,'.',''); ?></li>
                        <li>Bad Habits: &euro;<?php echo number_format($_SESSION['badhabits'],2,'.',''); ?></li>
                        <li>Loans / Credit: &euro;<?php echo number_format($_SESSION['loanstotal'],2,'.',''); ?></li>
                    </ul>
            <p>&nbsp;</p>
             <?php
                //calc if the mortgage is above 40% of houseing expenditures
                $count1 = $_SESSION['renttotal'] / $_SESSION['houseing'];
                $count2 = $count1 * 100;
                //calc if the expenditure is near 70% of income
                $count3 = $_SESSION['totalexpenditure'] / $_SESSION['income'];
                $count4 = $count3 * 100;
                if($count4 > 60){
                     echo("<div class='warning'>
                     <h2>Warning!:</h2>
                     <p>Your finances could be in trouble unless you take immediate action -  contact one of our debt and money saving experts today</p>");
                     echo("</div>");
                } else if($count4 >= 50 && $count4 <= 59){
                     echo("<div class='notice'>
                     <h2>Notice:</h2>
                     <p>Your finances look like they could do with a boost -  talk to one of our money saving experts today.</p>");
                      echo("</div>");
                } if($count4 < 50){
                    echo("<div class='important'>
                 <h2>Important:</h2>
                 <p>Your finaces look pretty good, but it may be possible to reduce some costs. Talk to one of our money saving experts for advice.<p>");
                 echo("</div>");
                }
             ?>
            <div class="msgalert">
                 <h2>Message:</h2>
                 <p>Thank you for using the personal budgeting calculator, we hope you found it helpful.
                    Below is a summary of your current financial situation. Please check it for accuracy. If you feel you would benefit from a free, professional analysis,
                    use our <em>'Contact Us Today'</em> option.</p>
              </div>
    <div id="breakdown">
        <div id="expalert" style="width:100%"><p>Below is a full breakdown of each of your expenditures</p></div>
        <div class="rightcol">
           <h1>Travel Expenditures</h1>
            <p>
             <?php
                $travelchart = new FusionCharts("Column3D","370","250","",true);
               $travelchart->setSWFPath($chartloc);
                if($travel != 0){
                    $travelchart->setChartParams("animation=0;xAxisName=Travel Expenditures;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                } else {
                    $travelchart->setChartParams("animation=0;yAxisMinValue=0;yAxisMaxValue=10;xAxisName=Travel Expenditures;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                }
                ////add data
                $travelchart->addChartData($_SESSION['carpaymenttotal'], "name=CP;hoverText=Car Payements");
                $travelchart->addChartData($_SESSION['vehicletaxtotal'], "name=V T;hoverText=Vehicle Tax");
                $travelchart->addChartData($_SESSION['vehiclefueltotal'], "name=V F;hoverText=Vehicle Fuel");
                $travelchart->addChartData($_SESSION['vehicleinsurancetotal'], "name=V I;hoverText=Vehicle Insurance");
                $travelchart->addChartData($_SESSION['commutingtotal'], "name=C;hoverText=Commuting");
                //renderchart
                $travelchart->renderChart();
                unset($travelchart);
            ?>
            </p>
            <h1>Protection Expenditures</h1>
            <p>
             <?php
                $protectionchart = new FusionCharts("Column3D","370","250","",true);
                $protectionchart->setSWFPath($chartloc);
                if($protection != 0){
                    $protectionchart->setChartParams("animation=0;xAxisName=Protection Expenditures;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                } else {
                     $protectionchart->setChartParams("animation=0;yAxisMinValue=0;yAxisMaxValue=10;xAxisName=Protection Expenditures;yAxisName=Amount;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                }
                //add data
                $protectionchart->addChartData($_SESSION['insurancetotal'], "name=H I;hoverText=Home Insurance");
                $protectionchart->addChartData($_SESSION['lifeprotectiontotal'], "name=L P;hoverText=Life Protection");
                $protectionchart->addChartData($_SESSION['healthinsurancetotal'], "name=H I;hoverText=Health Insurance");
                $protectionchart->addChartData($_SESSION['pensiontotal'], "name=P;hoverText=Pension");
                $protectionchart->addChartData($_SESSION['incomeprotectiontotal'], "name=I P;hoverText=Income Protection");
                //renderchart
                $protectionchart->renderChart();
            ?>
            </p>
             <h1>Bad Habits</h1>
            <p>
                <?php
                $badchart = new FusionCharts("Column3D","370","250","",true);
                $badchart->setSWFPath($chartloc);
                if($badhabits != 0){
                    $badchart->setChartParams("animation=0;xAxisName=Bad Habits;yAxisName=Amouont;numberPrefix=€;decimalPrecision=0;formatNumberScale=1");
                } else {
                    $badchart->setChartParams("animation=0;yAxisMinValue=0;yAxisMaxValue=10;xAxisName=Bad Habits;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                }
                //add data
                $badchart->addChartData($_SESSION['smokingtotal'], "name=S;hoverText=Smoking");
                $badchart->addChartData($_SESSION['drinkingtotal'], "name=D;hoverText=Drinking");
                $badchart->addChartData($_SESSION['snacktotal'], "name=Snk;hoverText=Snacks");
                $badchart->addChartData($_SESSION['fastfoodtotal'], "name=F F;hoverText=Fast Food");
                $badchart->addChartData($_SESSION['gamblingtotal'], "name=G;hoverText=Gambling");
                $badchart->addChartData($_SESSION['parkingtickettotal'], "name=P T;hoverText=Parking Tickets");
                $badchart->addChartData($_SESSION['finestotal'], "name=F;hoverText=Fines");
                //renderchart
                $badchart->renderChart();
            ?>
            </p>
         </div>
        <div id="leftcol">
        <h1>Housing Expenditures</h1>
        <p>
            <?php
                $housingchart = new FusionCharts("Column3D","370","250","",true);
                $housingchart->setSWFPath($chartloc);
                $housingchart->setChartParams("animation=0;xAxisName=Housing Expenditures;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                //add data
                $housingchart->addChartData($_SESSION['renttotal'], "name=Mort;hoverText=Mortgage / Rent");
                $housingchart->addChartData($_SESSION['mortgageprotectiontotal'], "name=M P;hoverText=Mortgage Protection");
                $housingchart->addChartData($_SESSION['gastotal'], "name=G;hoverText=Gas");
                $housingchart->addChartData($_SESSION['electrictotal'], "name=E;hoverText=Electricity");
                $housingchart->addChartData($_SESSION['broadbandtotal'], "name=B;hoverText=Broadband");
                $housingchart->addChartData($_SESSION['phonetotal'], "name=P;hoverText=Phone");
                $housingchart->addChartData($_SESSION['wastetotal'], "name=W;hoverText=Waste");
                $housingchart->addChartData($_SESSION['tvtotal'], "name=TV");
                //renderchart
                $housingchart->renderChart();
            ?>
        </p>
        <h1>Food Housekeeping Expenditures</h1>
            <p>
              <?php
                $housekeepingchart = new FusionCharts("Column3D","370","250","",true);
                $housekeepingchart->setSWFPath($chartloc);
                if($housekeeping != 0){
                    $housekeepingchart->setChartParams("animation=0;xAxisName=House Keeping Expenditures;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                } else {
                    $housekeepingchart->setChartParams("animation=0;xAxisName=House Keeping Expenditures;yAxisMinValue=0;yAxisMaxValue=10;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                }
                //add data
                $housekeepingchart->addChartData($_SESSION['groceriestotal'], "name=G;hoverText=Groceries");
                $housekeepingchart->addChartData($_SESSION['lunchtotal'], "name=L;hoverText=Lunch");
                $housekeepingchart->addChartData($_SESSION['kidslunchtotal'], "name=K L;hoverText=Kids Lunch");
                $housekeepingchart->addChartData($_SESSION['personalitemstotal'], "name=P;hoverText=Personal");
                $housekeepingchart->addChartData($_SESSION['literaturetotal'], "name=L;hoverText=Literature");
                //renderchart
                $housekeepingchart->renderChart();
            ?>
            </p>
             <h1>Good Habits</h1>
            <p>
                <?php
                $goodchart = new FusionCharts("Column3D","370","250","",true);
                $goodchart->setSWFPath($chartloc);
                if($goodhabits != 0){
                    $goodchart->setChartParams("animation=0;xAxisName=Good Habits;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                } else {
                    $goodchart->setChartParams("animation=0;yAxisMinValue=0;yAxisMaxValue=10;xAxisName=Good Habits;yAxisName=Amouont;numberPrefix=€;decimalPrecision=2;formatNumberScale=0;decimalPrecision=0");
                }
                //add data
                $goodchart->addChartData($_SESSION['entertainmenttotal'], "name=E;hoverText=Entertainment /  Eating out");
                $goodchart->addChartData($_SESSION['gymtotal'], "name=G;hoverText=Gym / Health");
                $goodchart->addChartData($_SESSION['holidaytotal'], "name=H;hoverText=Holidays");
                $goodchart->addChartData($_SESSION['petexpensestotal'], "name=P E;hoverText=Pet Expenses");
                $goodchart->addChartData($_SESSION['savingstotal'], "name=S;hoverText=Savings");
                //renderchart
                $goodchart->renderChart();
                ?>
            </p>
        </div>
        </div>
    </div>
</div>
</div>
</div><!-- /fullpage -->
	<br class="clear" />
</div><!-- /wrap -->
<?php
include('footer.php');
?>
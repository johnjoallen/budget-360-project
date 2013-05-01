<?php
session_start();
$income = Trim(stripslashes($_POST['income']));
if(!empty($income)){
	$_SESSION['income'] = $income; 
} else {
	header('Location:index.php');
}
include('header.php'); 
?>
<!-- fullpage -->
<div id="fullpage">
<div id="page">
<div class="budgethead">
	<div class="progress">
		<img src="images/progress-expenditures.png" alt="expenditures" height="36px" width="305px" title="Income" />
	</div>
    <p><img src="images/budgetlogo.png" height="59px" width="238px" alt="Budget 360" title="Budget 360 - Credy Care" /></p>
    <h1>Expenditures</h1>
</div>
<div class="expenitures">
    <div id="sidebar">
        <div class="sidebaritem">
            <div id="aboutbox">
                <p>
                    About<br />
                    The Credy Care Budget 360 application is design so the user can input their financial information and get feedback on it none of the information is saved.
                </p>
            </div>
        </div>
    </div>
    <form action="convert.php" method="post" id="budgetform" name="budgetform">
        <div id="expalert"><p>You have the option to input Weekly, Monthly or Annual payments below</p></div>
        <fieldset><legend>Housing</legend>
                <table>
		<!-- Housing Expenditues -->
                <tr>
                    <td>Mortgage /  Rent:</td>
		<td><select name="rentrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="rent" id="rent" title="Enter a Mortgage / Rent Payment" onfocus="clearfield(this);"/></td>
		</tr>
		<tr>
		<td>Mortgage Protection:</td>
		<td><select name="mortprorate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="mortgageprotection" id="mortgageprotection" /></td>
		</tr>
		<tr>
		<td>Gas:</td>
		<td><select name="gasrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="gas" id="gas" /></td>
		</tr>

		<tr>
		<td>Electricity:</td>
		<td><select name="electricrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="electricity" id="electricity"/></td>
		</tr>

                <tr>
		<td>Broadband:</td>
		<td><select name="broadbandrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="broadband" id="broadband"/></td>
		</tr>

                <tr>
		<td>Phone:</td>
		<td><select name="phonerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="phone" title="Don't forget your mobile phone charges" id="phone"/></td>
		</tr
                <tr>
		<td>Waste:</td>
		<td><select name="wasterate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="waste" id="waste" value="" onfocus="clearfield(this);" /></td>
		</tr>

                <tr>
		<td>TV:</td>
		<td><select name="tvrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="tv" id="tv"/></td>
		</tr>
        </table></fieldset>
        <fieldset><legend>Travel</legend>
		<!-- Travel Expenditues -->
                <table>
                <tr>
		<td>Car Payments:</td>
		<td><select name="carrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="car" id="car" /></td>
		</tr>

                <tr>
		<td>Vehicle Tax:</td>
		<td><select name="vtaxrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="vehicletax" id="vehicletax" /></td>
		</tr>

                <tr>
		<td>Vehicle Fuel:</td>
		<td><select name="vfuelrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="vehiclefuel" id="vehiclefuel" /></td>
		</tr>

                <tr>
		<td>Vehicle Insurance:</td>
		<td><select name="vinsurancerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="vehicleinsurance" id="vehicleinsurance"/></td>
		</tr>

                <tr>
		<td>Commuting:</td>
		<td><select name="commutingrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="commuting" id="commuting" /></td>
		</tr>
                </table></fieldset>
        <fieldset><legend>Food &amp; Housekeeping</legend>
		<!-- Food / Housekeeping Expenditues -->
                <table>
                <tr>
		<td>Groceries:</td>
		<td><select name="groceriesrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
		</select></td> 
		<td><input type="text" name="groceries" id="groceries" /></td>
		</tr>
		<tr>
		<td>Lunch:</td>
		<td><select name="lunchrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="lunch" id="lunch" /></td>
		</tr>

                <tr>
		<td>Kids Lunch:</td>
		<td><select name="kidslunchrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="kidslunch" id="kidslunch" /></td>
		</tr>
		<tr>
		<td>Misc. Items:</td>
		<td><select name="personalitemsrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="personalitems" id="personalitems" /></td>
		</tr>
		<tr>
		<td>Newspapers, Magazines, Subscriptions:</td>
		<td><select name="literaturerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td>
		<td><input type="text" name="literature" id="literature" /></td>
		</tr>
                </table></fieldset>
        <fieldset><legend>Protection</legend>
                <!-- Protection Expenditues -->
                <table>
                <tr>
		<td>Home Insurance:</td>
		<td><select name="homeinsurancerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="insurance" id="insurance" /></td>
		</tr>

                <tr>
		<td>Life Assurance:</td>
		<td><select name="lifeprotectionrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="lifeprotection" id="lifeprotection" title="Do you have life assurance?" /></td>
		</tr>

                <tr>
		<td>Health Insurance:</td>
		<td><select name="healthinsurancerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="healthinsurance" id="healthinsurance" /></td>
		</tr>

                <tr>
		<td>Pension:</td>
		<td><select name="pensioninsurancerate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="pension" id="pension" /></td>
		</tr>
		<tr>
		<td>Income Protection:</td>
		<td><select name="incomeprotectionrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="incomeprotection" id="incomeprotection" /></td>
		</tr>
                </table></fieldset>
        <fieldset><legend>Bad Habits</legend>
		<!-- Bad Habits Expenditues -->
		<table>
                <tr>
		<td>Smoking:</td>
		<td><select name="smokingrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="smoking" id="smoking" /></td>
		</tr>
		<tr>
		<td>Drinking:</td>
		<td><select name="drinkingrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="drinking" id="drinking" /></td>
		</tr>
                <tr>
		<td>Snacks:</td>
		<td><select name="snackrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="snacks" id="snacks" /></td>
		</tr>

                <tr>
		<td>Fast Food:</td>
		<td><select name="fastfoodrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="fastfood"  id="fastfood"/></td>
		</tr>
		<tr>
		<td>Gambling:</td>
		<td><select name="gamblingrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="gambling" id="gambling" /></td>
		</tr>
		<tr>
		<td>Parking Tickets:</td>
		<td><select name="parkingticketrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="parkingtickets" id="parkingtickets" /></td>
		</tr>
		<tr>
		<td>Fines:</td>
		<td><select name="finesrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="fines" id="fines"/></td>
		</tr>
                </table></fieldset>
            
                <!-- Good Habits Expenditues -->
                <fieldset><legend>Good Habits</legend>
		<table>
                    <tr>
		<td>Eating Out / Entertainment:</td>
		<td><select name="entertainmentrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="entertainment" id="entertainment"/></td>
		</tr>
		<tr>
		<td>Gym / Health Club:</td>
		<td><select name="gymrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="gym" id="gym" /></td>
		</tr>
		
                <tr>
		<td>Holidays:</td>
		<td><select name="holidayrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="holiday" id="holiday"/></td>
		</tr>
		
                <tr>
                    <td>Pet Expenses:</td>
		<td><select name="petexpensesrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="petexpenses" id="petexpenses" /></td>
		</tr>

                <tr>
		<td>Savings:</td>
		<td><select name="savingsrate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="savings" id="savings" /></td>
		</tr>
                </table></fieldset>
                <!-- Loans -->
                <fieldset id="credit" title="Finally fill in the payment of any Loans / Credit Cards you may have"><legend>Loans &amp; Credit Cards</legend>
                <table>
                <tr>
		<td>Credit Card 1:</td>
		<td><select name="creditcard1rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="creditcard1" id="creditcard1"/></td>
		</tr>

                <tr>
		<td>Credit Card 2:</td>
		<td><select name="creditcard2rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="creditcard2" id="creditcard2"/></td>
		</tr>

                <tr>
		<td>Credit Card 3:</td>
		<td><select name="creditcard3rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="creditcard3" id="creditcard"/></td>
		</tr>

                <!-- Loans -->
		<tr><th>Loans</th></tr>
		<tr>
		<td>Loan 1:</td>
		<td><select name="loan1rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="loan1" id="loan1"/></td>
		</tr>

                <tr>
		<td>Loan 2:</td>
		<td><select name="loan2rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="loan2" id="loan2"/></td>
		</tr>

                <tr>
		<td>Loan 3:</td>
		<td><select name="loan3rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="loan3" id="loan3"/></td>
		</tr>
		<tr>
		<td>Loan 4:</td>
		<td><select name="loan4rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="loan4" id="loan4"/></td>
		</tr>

                <tr>
		<td>Loan 5:</td>
		<td><select name="loan5rate">
			<option value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
			<option value="annual">Annual</option>
		</select></td> 
		<td><input type="text" name="loan5" id="loan5"/></td>
		</tr>
                <tr><td align="center"><br />
                        <br />
                        <input type="image" id="submit" title="Click here to see your Budget Outcome" name="submit" value="Submit" src="images/calc_btn.png" /></td></tr>
                </table></fieldset>
               
            </form>

</div>
</div>
</div><!-- /fullpage --> 
	<br class="clear" />
</div><!-- /wrap -->
	<?php include('footer.php'); ?>
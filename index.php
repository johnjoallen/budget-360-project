<?php
session_start();
$_SESSION['display'] = 0;
include('header.php');
?>
		<!-- fullpage -->
<div id="fullpage">
<div id="page">
<div class="budgethead">
	<div class="progress">
		<img src="images/progress-income.png" height="36px" width="305px" title="Income" />
	</div>
    <p>
		<img src="images/budgetlogo.png" height="59px" width="238px" alt="Budget 360" title="Budget 360 - Credy Care" />     </p>

		<h1>Income</h1>
</div>
<div class="income">
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
    <form action="expenditures.php" method="post" id="incomeform">
			<table>
                            <tr >
                                <td width="40%">Total Monthly Salary:</td><td width='50%' style="color:red"><p><input type="text" name="income" id="income" value="e.g. &euro; 5000" onfocus="clearfield(this);"/><br /></p> </td>
			</tr>
			<tr>
			   <td align="right">&nbsp;</td><td><input type="image" name="submit" value="Submit" src="images/next_btn.png" title="Click here to proceed to Expenditures" id="submit" /></td>
			</tr>
		</table>
	</form>
</div>
</div>
</div><!-- /fullpage --> 
	<br class="clear" />
</div><!-- /wrap -->
	<?php include('footer.php'); ?>
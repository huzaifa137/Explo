<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wizard-v6</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="/assets1/css/opensans-font.css">
	<link rel="stylesheet" type="text/css" href="/assets1/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- datepicker -->
	<link rel="stylesheet" type="text/css" href="/assets1/css/jquery-ui.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="/assets1/css/style.css"/>
</head>
<body>
	<div class="page-content">
		<div class="wizard-heading">Hostel Booking Questionnaire</div>
		<div class="wizard-v6-content">
			<div class="wizard-form">
		        <form class="form-register" id="form-register" action="#" method="post">
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<p class="step-icon"><span>1</span></p>
			            	<span class="step-text">Personal Info</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Personal Info</h3>
			                		<span>1/3</span>
			                	</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="first_name" name="first_name" required>
											<span class="label">First Name</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="last_name" name="last_name" required>
											<span class="label">Last Name</span>
										</label>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="phone" name="phone" required>
											<span class="label">Phone Number</span>
										</label>
									</div>
									<div class="form-holder">
										<label class="form-row-inner">
											<input type="text" name="your_email_1" id="your_email_1" class="form-control"  required>
											<span class="label">E-Mail</span>
										</label>
									</div>
								</div>
								<div class="form-row form-row-date">
									<div class="form-holder form-holder-2">
										<label for="date" class="special-label">Date of Birth:</label>
										<select name="date" id="date" class="form-control">
											<option value="15" selected>15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
										</select>
										<select name="month" id="month" class="form-control">
											<option value="Jan" selected>Jan</option>
											<option value="Feb">Feb</option>
											<option value="Mar">Mar</option>
											<option value="Apr">Apr</option>
											<option value="May">May</option>
										</select>
										<select name="year" id="year" class="form-control">
											<option value="2018" selected>2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label class="form-row-inner">
											<input type="text" class="form-control" id="address" name="address" required>
											<span class="label">Address Location</span>
										</label>
									</div>
								</div>
							</div>
			            </section>
						<!-- SECTION 2 -->
			            <h2>
			            	<p class="step-icon"><span>2</span></p>
			            	<span class="step-text">Booking</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Booking Infomation</h3>
			                		<span>2/3</span>
			                	</div>
		                		<div class="form-images">
		                			<img src="/assets1/images/wizard_v6.jpg" alt="wizard_v6">
		                		</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="room" class="special-label-1">Choose a Room </label>
										<select name="room" id="room" class="form-control">
											<option value="Daily Design Metting - Metting Room No.1" selected>Daily Design Metting - Metting Room No.1</option>
											<option value="Single">Single</option>
											<option value="Double">Double</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder">
										<label for="day" class="special-label-1">Organization Day</label>
										<input type="text" name="day" class="day" id="day" placeholder="15 / 08 / 2018">
									</div>
									<div class="form-holder">
										<label for="time" class="special-label-1">Time Open </label>
										<select name="time" id="time" class="form-control">
											<option value="8:00am - 10.00am" selected>8:00am - 10.00am</option>
											<option value="9:00am - 21:00pm">9:00am - 21:00pm</option>
											<option value="10:00am - 22:00pm">10:00am - 22:00pm</option>
											<option value="12:00am - 24:00pm">12:00am - 24:00pm</option>
										</select>
										<span class="select-btn">
											<i class="zmdi zmdi-chevron-down"></i>
										</span>
									</div>
								</div>
							</div>
			            </section>
			            <!-- SECTION 3 -->
			            <h2>
			            	<p class="step-icon"><span>3</span></p>
			            	<span class="step-text">Confirm</span>
			            </h2>
			            <section>
			                <div class="inner">
			                	<div class="form-heading">
			                		<h3>Comfirm Details</h3>
			                		<span>3/3</span>
			                	</div>
								<div class="table-responsive">
									<table class="table">
										<tbody>
											<tr class="space-row">
												<th>Full Name:</th>
												<td id="fullname-val"></td>
											</tr>
											<tr class="space-row">
												<th>Room:</th>
												<td id="room-val"></td>
											</tr>
											<tr class="space-row">
												<th>Day:</th>
												<td id="day-val"></td>
											</tr>
											<tr class="space-row">
												<th>Time:</th>
												<td id="time-val"></td>
											</tr>
											<tr class="space-row">
												<th>Price:</th>
												<td id="price-val">40.00$</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
			            </section>
		        	</div>
		        </form>
			</div>
		</div>
	</div>
	<script src="/assets1/js/jquery-3.3.1.min.js"></script>
	<script src="/assets1/js/jquery.steps.js"></script>
	<script src="/assets1/js/jquery-ui.min.js"></script>
	<script src="/assets1/js/main.js"></script>
</body>
</html>
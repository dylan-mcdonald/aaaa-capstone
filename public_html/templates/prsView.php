<!DOCTYPE html>
<html>
	<head lang="en">
		<?php require_once("../php/partials/headlib.php"); ?>
		<title>Streamline CNM</title>
	</head>

	<body>
		<div class="container">
			<?php require_once("../php/partials/navbar.php"); ?>

			<section>
				<div class="row">
					<div class="col-sm-12">
						<ul class="nav nav-tabs nav-justified">
							<li role="presentation"><a href="#">Applicants</a></li>
							<li role="presentation"><a href="#">Prospects</a></li>
						</ul>
					</div>
				</div>
			</section>

			<section>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Last</th>
									<th>First</th>
									<th>Email</th>
									<th>Cohort</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								<tr *ngFor="let prospectCohort of prospectCohorts">
									<td>{{ prospectCohort.info[0].prospectFirstName }}</td>
									<td>{{ prospectCohort.info[0].prospectLastName }}</td>
									<td>{{ prospectCohort.info[0].prospectEmail }}</td>
									<td>{{ prospectCohort.info[1].cohortName }}</td>
									<td>{{ prospectCohort.info[0].prospectDateTime | date: 'medium' }}</td>
								</tr>
							</tbody>
						</table>
					</div><!--end of .table-responsive-->
				</div>
			</section>
		</div>
	</body>
</html>
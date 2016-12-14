<section class="container-fluid">
	<div class="row parking-page input-group input-group-sm">
		<div class="col-xs-12">
			<h2>Prospects</h2>
			<table class="table table-bordered table-hover parking-table">
				<thead>
					<tr>
						<th>Last</th>
						<th>First</th>
						<th>Email</th>
						<th>Cohort</th>
					</tr>
				</thead>
				<tbody>
					<tr *ngFor="let prospectCohort of prospectCohorts">
						<td>{{ prospectCohort.info[0].prospectFirstName }}</td>
						<td>{{ prospectCohort.info[0].prospectLastName }}</td>
						<td>{{ prospectCohort.info[0].prospectEmail }}</td>
						<td>{{ prospectCohort.info[1].cohortName }}</td>
					</tr>
				</tbody>
			</table>
		</div><!--end of .table-responsive-->
	</div>
</section>

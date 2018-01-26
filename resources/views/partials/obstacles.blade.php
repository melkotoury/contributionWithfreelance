<h4 style="color: #31363a;">Please check the festival regulations and make sure you choose the right competition</h4><br>
<ol>

	@if(in_array('country',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film country</li>
	@endif	

	@if(in_array('max_duration',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this duration</li>
	@endif	

	@if(in_array('production_date',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film production date</li>
	@endif	

	@if(in_array('themes',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film theme</li>
	@endif

	@if(in_array('genres',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film genre</li>
	@endif

	@if(in_array('themes_genres',$reasons))
			<li class="alert alert-danger"><i class="fa fa-warning"></i> The festival doesn't accept your film genre or theme </li>
	@endif

	@if(in_array('categories',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film category</li>
	@endif	

	@if(in_array('languages',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this film language</li>
	@endif	

	@if(in_array('subtitles',$reasons))
		<li class="alert alert-danger"><i class="fa fa-warning"></i>&nbsp; The festival doesn’t accept this language of subtitle</li>
	@endif	




</ol>


	@if(in_array('date',$reasons))
		<table class="table">
			<tr>
				<th>Submission Will Begin</th>
				<th>Deadline Will End</th>
			</tr>
			<tr>
				<td>{{ date("d-m-Y", strtotime($comp->submission_begins)) }}</td>
				<td>{{ date("d-m-Y", strtotime($comp->deadline)) }}</td>
			</tr>
		</table>
	@endif	
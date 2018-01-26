<div id="teamData{{ $id }}">
<div class="input-group"><div class="input-group-btn">
<button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
<i class="fa fa-angle-down"></i> 
</button>
<ul class="dropdown-menu">

<li>
<a type="button" class="team_edit" data-fname="{{ $first_name }}" data-lname="{{ $last_name }}" data-role="{{ $role }}" data-id="{{ $id }}"><i class="fa fa-edit"></i> Edit</a>
</li>
<li>
<a href="" class="team_delete" data-id="{{ $id }}"><i class="fa fa-remove"></i> Delete </a>
</li>

</ul></div><!-- /btn-group -->
<input type="text" value="{{ $first_name .' '.$last_name .' == '.$role }}" class="form-control" readonly></div><br>
</div>


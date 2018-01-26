<div id="produpdatedData{{ $id }}">
<div class="input-group"><div class="input-group-btn">
<button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
<i class="fa fa-angle-down"></i> 
</button>
<ul class="dropdown-menu">

<li>
<a type="button" class="prod_edit" data-content="{{ $name }}" data-phone="{{ $phone }}" data-email="{{ $email }}" data-id="{{ $id }}"><i class="fa fa-edit"></i> Edit</a>
</li>
<li>
<a href="" class="prod_delete" data-id="{{ $id }}"><i class="fa fa-remove"></i> Delete </a>
</li>

</ul></div><!-- /btn-group -->
<input type="text" value="{{ $name }}" class="form-control" readonly></div><br>
</div>
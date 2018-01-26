<div class="input-group"><div class="input-group-btn">
<button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
<i class="fa fa-angle-down"></i> 
</button>
<ul class="dropdown-menu">

<li>
<a href="" data-id="{{ $dir->id }}"><i class="fa fa-edit"></i> Edit</a>
</li>
<li>
<a href="" data-id="{{ $dir->id }}"><i class="fa fa-remove"></i> Delete </a>
</li>

</ul></div><!-- /btn-group -->
<input type="text" value="{{ $dir->name }}" class="form-control" readonly></div>

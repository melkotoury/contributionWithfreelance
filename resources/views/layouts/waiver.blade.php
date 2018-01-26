<tr class="odd gradeX"><th></th>
								<td>
									<a target="_blanck" href="{{ url(userFromFestival($festival_id)->username) }}">				
									{{ userFromFestival($festival_id)->fullname }}
									</a>
								</td>
								<td>
									<button data-id="{{ $festival_id }}" class="btn btn-info add_waiver">Add Weaver</button> 
								</td>
								<td>
									<button data-id="{{ $festival_id }}" class="btn btn-info">Show Weavers</button> 
								</td></tr>
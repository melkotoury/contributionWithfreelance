                             <tr id="compRender{{ $id }}">
                                <td>{{ $comp_name }}</td>
                                <td>{{ $student_only == 0 ? 'Yes' : 'No' }}</td>
                                <td>{{ implode(json_decode($film_categories),', ') }}</td>
                                <td>{{ implode(json_decode($film_themes),', ') }}</td>
                                <td>{{ implode(json_decode($film_genres),', ') }}</td>
                                <td>{{ implode(json_decode($countries),', ') }}</td>
                                <td>{{  date("d-m-Y", strtotime($deadline)) }}</td>
                                <td>{{ date("d-m-Y", strtotime($submission_begins)) }}</td>
                                <td>{{ $fees }} $</td>
                                <td>
                                <a href="{{ url('festival/edit_comp').'/'.$id }}"  data-id="{{ $id }}" class="edit_comp"><i class="fa fa-edit"></i></a>
                                <a data-id="{{ $id }}" class="delete_comp"><i class="fa fa-trash"></i></a>
                              </tr>

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            <tr>
                                <td>{{ $user->fullname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ \App\FilmMaker::where('user_id',$user->id)->first()->phone }}</td>
                            </tr>
                        </table>

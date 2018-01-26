        <tr>
            <th>Programmer Name</th>
            <th>Feedback</th>
        </tr>
      @foreach($votes as $vote)

         <tr>                            
            <td>{{ \App\User::find($vote->programmer_id)->fullname }}</td>
            <td>{!! nl2br($vote->content) !!}</td> 
         </tr>   
      @endforeach
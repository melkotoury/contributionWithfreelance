      @foreach($users as $user)
      <div class="profilewrapper"><a href="{{ url('/').'/'.\App\User::where('id',$user->user_id)->first()->username }}">
         <div class="profile">
              <div class="pic">
                  <div class="img">
                @if(file_exists('images/filmmakers/'.$user->photo ))
                <img alt="" src="images/filmmakers/{{$user->photo }}" alt="festival" class="profile_img">
                @else
                <img alt="" src="http://placehold.it/100x100?text=no image">
                @endif
                  </div>
                  <i class="icon-plus"></i>
                  <i class="icon-ok"></i>
              </div>
              <h4>{{ $user->fullname }}</h4>
              <p>{{  implode(json_decode($user->Profession),',')  }}</p>
          </div></a>
       </div>
       @endforeach
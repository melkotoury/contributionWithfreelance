        <ul>
            <li>
                <span><i class="fa fa-folder-open"></i> {{ $folder->en_name }}
                </span> <a class="badge">
                {{ count(\App\Copy::where('folder_id',$folder->id)->get()) + 
                   count(\App\Move::where('folder_id',$folder->id)->get()) }}
                </a>
                <?php $sub = \App\Folder::where('parent',$folder->id)->get() ?>
                @if(count($sub) >0)
                 <ul id="sub{{ $folder->id }}">
                    @foreach($sub as $su)
                    <li>
                        <span><i class="fa fa-minus"></i> {{ $su->en_name }}</span> <a class="badge">{{ count(\App\Copy::where('folder_id',$su->id)->get()) + 
                          count(\App\Move::where('folder_id',$su->id)->get()) }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
        </ul>

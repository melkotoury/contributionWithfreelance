         <a href="#" data-toggle="modal" data-target="#modd"><i class="fa fa-folder-open"></i> Create folder</a>

                @foreach($folders as $folder)
                    <ul>
                        <li>
                        <span><i class="fa fa-folder-open"></i> {{ $folder->en_name }} </span>
                        <a class="badge filter_folder" data-id="{{ $folder->id }}" >

                    {{ count(\App\Copy::where('folder_id',$folder->id)->get()) +
                       count(\App\Move::where('folder_id',$folder->id)->get()) }} films
                </a>
                <a href="javascript:;" data-id="{{ $folder->id }}" class="pull-right delete-product"><i class="fa fa-trash"></i></a>

                <?php $sub = \App\Folder::where('parent',$folder->id)->get() ?>
                <ul id="sub{{ $folder->id }}">
                    @if(count($sub) >0)

                        @foreach($sub as $su)
                            <li>
                                <span><i class="fa fa-minus"></i> {{ $su->en_name }}</span>
                            <a class="badge filter_folder" data-id="{{ $su->id }}">
                                    {{ count(\App\Copy::where('folder_id',$su->id)->get()) +
                                      count(\App\Move::where('folder_id',$su->id)->get()) }} films                        
                            </a>
                            <a href="javascript:;" data-id="{{ $su->id }}" class="pull-right delete-product"><i class="fa fa-trash"></i></a>
                            </li>
                        @endforeach

                    @endif

                </ul>

            </li>
        </ul>
           @endforeach

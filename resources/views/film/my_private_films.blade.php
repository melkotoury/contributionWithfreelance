@extends('partials.partialsapp')



@section('header.scripts')
    <link rel="stylesheet" href="{{ asset('site') }}/css/my_films.css" media="screen" title="no title">

@stop


@section('content')
<!-- Edit ,Delete ,Add Films -->
<div class="container my_films">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <div class="row">
              <div class="col-xs-7 col-md-10">
                <h5><span class="glyphicon glyphicon-film"></span> My Films</h5>
              </div>
              <div class="col-xs-5 col-md-2">
                <button onclick="window.open('{{ url('create_film').'/pr' }}','_self')" type="button" class="btn btn-default">
                  <span class="glyphicon glyphicon-plus"></span> Add Film
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-body">
        

        @if(count($films) > 0)
        @foreach($films as $film)

          <div class="row" id="film{{ $film->id }}">
            <div class="col-xs-2">
                   <!-- check if file exists -->
                    @if(file_exists('images/processedfilms/'.$film->film_poster))
                    <img alt="" src="{{ url('/') }}/images/processedfilms/{{$film->film_poster}}" class="img-responsive" alt="">
                    @else
                    <img alt="" src="http://placehold.it/159x319?text=no image">
                    @endif
                    <!-- end check file -->
            </div>
            <div class="col-xs-6">
              <h4 class="film-name"><strong><span class="primary">
              <a href="{{ url($film->film_url) }}">{{ $film->english_title }}</a><br>
              <a href="{{ url($film->film_url) }}">{{ $film->original_title }}</a>
              </span></strong></h4><h4><small>{{ $film->short_synopsis_english }}
</small></h4>
<h4><small><span class="primary">Director:</span>

@if(count($film->directors) > 0)
{{ $film->directors->implode('name',' , ') }}
@else
complete your film details from <a href="{{ url('edit_film').'/'.$film->id }}">here</a>

@endif
</small>
</h4>
<h4><small><span class="primary">Writer:</span>
 
@if(count($film->producers) > 0)
<?php ?>
{{ $film->producers->implode('name',' , ') }}
@else
complete your film details from <a href="{{ url('edit_film').'/'.$film->id }}">here</a>

@endif

 </small></h4>

 

<h4><small><span class="primary">Genres:</span>
@if(count($film->genres) > 0)
<?php ?>
{{ $film->genres->implode('name',' | ') }}
@else
complete your film details from <a href="{{ url('edit_film').'/'.$film->id }}">here</a>

@endif

 </small></h4>
<h4><small><span class="primary">Country:</span> 
<?php $countries = json_decode($film->production_country); ?>
@if(count($countries) > 0)
{{ implode($countries,' | ') }}
@else
complete your film details from <a href="{{ url('edit_film').'/'.$film->id }}">here</a>

@endif

 </small></h4>
<h4><small><span class="primary">Language:</span> 
<?php $film_languages = json_decode($film->film_languages); ?>
@if(count($film_languages) > 0)
{{ implode($film_languages,' | ') }}
@else
complete your film details from <a href="{{ url('edit_film').'/'.$film->id }}">here</a>
@endif

 </small></h4>
            </div>
            <div class="col-xs-2">

            </div>

              <div class="col-xs-2">
                <a href="{{ url('edit_film').'/'.$film->id }}" type="button" class="btn btn-link btn-xs">
                  <span class="glyphicon glyphicon-pencil"> </span>
                </a>
                <button type="button" data-id="{{ $film->id }}" class="btn btn-link btn-xs delete-product">
                  <span class="glyphicon glyphicon-trash"> </span>
                </button>
              </div>
            </div>

            @if($film->completed == 0)
            <div class="pull-right">
              {{--<a href="{{ url('checkout_for_film').'/'.$film->id }}" class="btn btn-danger">Confirm Payment</a>--}}
              <a href="{{ url('server_under_construction') }}" class="btn btn-danger">Confirm Payment</a>
            </div>
            <br><br>
            @endif

          <hr class="horizontal">
     @endforeach
     @else
     <h3 class="text-center">Please Add A Film</h3>       
         @endif


 
          <!-- <div class="row">
            <div class="text-center">
              <div class="col-xs-9">
                <h6 class="text-right">Added items?</h6>
              </div>
              <div class="col-xs-3">
                <button type="button" class="btn btn-default btn-sm btn-block">
                  Update cart
                </button>
              </div>
            </div>
          </div> -->
          </div>
          </div>
        </div><!-- end col-xs-12 -->
        </div><!-- end row -->
        </div> <!-- end panel-body -->
        <div class="panel-footer">

        </div>
      </div>
    </div>
  </div>
</div>



    <!-- start DELETE modal -->
    <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Delete
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                         <h5>Are You Sure You Wanna Delete This ??</h5>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">
                      {{ csrf_field() }}
                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                         <button class="btn btn-danger" id="submit_delete"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE modal -->

@stop


@section('footer.scripts')

      <script type="text/javascript">
        

      /*
      *
      * show delete modal  
      *
      */
      $('body').on('click','.delete-product',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3495').modal('show');


      });

    /*
         *
         *  end showing delete modal
         *
    */




      /* start Deleting form */
        
        $('body').on('click','#submit_delete',function(){
              /* csrf protection on ajax 
         * 
         * see meta tag in solycrud.blade.php blade template
        */
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        var product_id_delete    = $('#product_id_delete').val();
        var url = '{{ url('/') }}';
        console.log(url);
        $.post(url+'/delete_film/'+product_id_delete,function(data){

                $("#film" + product_id_delete).remove();                                             
               $('#modal-container-3495').modal('hide');

        });
                        return false;

      });
      /* End Deleting Form */



      </script>
@stop
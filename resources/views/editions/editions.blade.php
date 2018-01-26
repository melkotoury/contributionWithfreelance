@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/film-details.css">
    <link rel="stylesheet" href="{{ url('site') }}/css/festival_edition.css">

@stop


@section('content')


<!--Content-->

<div class="container film-details">

    <!-- Edit ,Delete ,Add Films -->
    <div class="container my_films">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-xs-7 col-md-10">
                                    <h5><span class="glyphicon glyphicon-film"></span> My Editions</h5>
                                </div>
                                <div class="col-xs-5 col-md-2">
                                    <button onclick="window.open('{{ url('festival/add_edition') }}','_self')" type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-plus"></span> Add Edition
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if(count($editions) > 0)
                        @foreach($editions as $edition)
                        <div id="edition{{ $edition->id }}">
                        <div class="row">

                            <div class="col-xs-2">
                                <a href="{{ url('festival/edition_details'.'/'.$edition->id) }}">

                            @if(file_exists('images/editions/teaserview/'.$edition->path))
                                <img alt="" src="{{ url('/').'/images/editions/teaserview/'.$edition->path }}" style="height: 121px; width: 81px;" alt="" class="img-responsive">
                            @else
                            <img alt="" src="http://placehold.it/81x121?text=no image">
                            @endif
                                

                                </a>
                            </div>
                            <div class="col-xs-6">
                                <h4 class="film-name"><strong><a href="{{ url('festival/edition_details'.'/'.$edition->id) }}"><span class="primary">Edition {{ $edition->number }}</span></a></strong></h4>
                                <h4><small>
                                   {{ $edition->awards }} .
                            </small></h4>

                            </div>
                            <div class="col-xs-2">

                            </div>

                            <div class="col-xs-2">
                                <a href="{{ url('festival/edit_edition').'/'.$edition->id }}" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-pencil"> </span>
                                </a>
                                <button data-id="{{ $edition->id }}" type="button" class="btn btn-link btn-xs delete-product">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>

                        <hr class="horizontal"></div>
                        @endforeach
                        @else
                        <p class="text-center">you may add an edition</p>
                        @endif
                    </div>
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

<!--End Content-->

@stop


@section('footer.scripts')
<script>
    

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
        var url = '{{ url('/festival') }}';
        console.log(url);
        $.post(url+'/delete_edtion/'+product_id_delete,function(data){

                $("#edition" + product_id_delete).remove();                                             
               $('#modal-container-3495').modal('hide');

        });
                        return false;

      });
      /* End Deleting Form */


</script>
@stop
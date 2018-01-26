@extends('admin.layouts.app')

@section('header.scripts')

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->


@endsection

@section('content')

			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{ url('admin/home') }}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ url('admin/elite') }}">Elite</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Transactions <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Elite Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">
										<div class="btn-group">
											<a type="button" href="{{ url('admin/addelite') }}" id="sample_editable_1_new" class="btn green">
											Add New Elite <i class="fa fa-plus"></i>
											</a>
										</div>

									 @if (count($errors) > 0)
					                        <div class="note note-danger">
					                            <ul>
					                                @foreach ($errors->all() as $error)
					                                    <li>{{ $error }}</li>
					                                @endforeach
					                            </ul>
					                        </div>
					                    @endif

				                       @if (Session::has('updated'))
				                                    <div class="note note-success">            
				                                      <h4>Updated Successfully</h4>
				                                    </div>
				                         @endif
				                       @if (Session::has('deleted'))
				                                    <div class="note note-success">            
				                                      <h4>Deleted Successfully</h4>
				                                    </div>
				                         @endif
				                       @if (Session::has('added'))
				                                    <div class="note note-success">            
				                                      <h4>Added Successfully</h4>
				                                    </div>
				                         @endif

									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr><th> # </th>
								<th>
									 Name
								</th>
								<th>
									 Username
								</th>
								<th>
									 Type
								</th>
								<th>
									  Private Film Fees
								</th>
								<th class="text-center">
									 Action
								</th>
							</tr>
							</thead>
							<tbody>
							<!-- start foreach -->
							@if(count($elite) > 0)
							@foreach($elite as $el)
							<tr class="odd gradeX" id="product{{$el->id}}"><th></th>
								<td>
								{{ \App\User::find($el->user_id)->fullname }} 
								</td>
								<td>
								{{ $el->username }} 
								</td>
								<td class="center">
								Film Maker
								</td>
								<td class="text-center">
								{{ $el->film_fees }}$
								</td>
								<td class="text-center">

						<a href="{{ url('admin/editelite').'/'.$el->id }}" class="btn btn-sm yellow"> Edit <i class="fa fa-edit"></i></a>
									
						<button type="button" value="{{ $el->id }}"  class="btn btn-sm red delete-product"> Delete 
                            <i class="fa fa-trash"></i></button>
								
								</td>
							</tr>
							@endforeach
							@else
							      <p>No Elite Added</p>
							@endif
							<!-- end foreach -->
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>






    <!-- start DELETE modal -->
    <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Delete
              <button  type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                         <h3>Are You Sure You Wanna Delete This ??</h3>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">
                      
                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                         <button class="btn btn-danger" id="submit_delete"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>

                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 

                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE modal -->

      <script type="text/javascript">
     


      jQuery(document).ready(function() {       

  

      /*
      *
      * show delete modal  
      *
      */
      $('body').on('click','.delete-product',function(){

        var product = $(this).val();

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

         $.ajax({

                        url:'/admin/deleteelite/'+product_id_delete,
                        type:'post',
                        beforeSend:function(){
                          $('#submit_delete').html("deleting...");

                        },
                        success:function(q) {


			                $("#product" + product_id_delete).remove();                                             
			               $('#modal-container-3495').modal('hide');
                            
                        }
                    });
               return false;

      });
      /* End Deleting Form */

   
});


      </script>




@endsection


@section('footer.scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/table-managed.js"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/ui-confirmations.js"></script>

<script>
jQuery(document).ready(function() {       

   TableManaged.init();
   UIConfirmations.init(); // init page demo

});
</script>


@endsection


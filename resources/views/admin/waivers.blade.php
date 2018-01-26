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
						<a href="{{ url('admin/users') }}">Waivers</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Waivers <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Waivers Table
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
											<a type="button" href="javascript:;" id="sample_editable_1_new" class="btn green delete-product">
											Add New Festival Waivers List <i class="fa fa-plus"></i>
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
									 Festival ID
								</th>
								<th>
									 Add Waiver
								</th>
                <th>
                   Show Waiver
                </th>
                <th>
                   Copy All Waivers
                </th>
							</tr>
							</thead>
							<tbody class="append">
							<!-- start foreach -->
							@foreach($waivers as $order)
							<tr class="odd gradeX"><th></th>
								<td>
									<a target="_blanck" href="{{ url(userFromFestival($order->id)->username) }}">				
									{{ userFromFestival($order->id)->fullname }}
									</a>
								</td>
								<td>
									<button data-id="{{ $order->id }}" class="btn btn-info add_waiver">Add Weaver</button> 
								</td>
                <td>
                  <a href="{{ url('admin/festival_waivers').'/'.$order->id }}" class="btn btn-info">Show Weavers</a> 
                </td>
                <td>
                  <input type="text" style="width: 10px;" value ="{{ \App\Waiver::where(['festival_id'=>$order->id,'active'=>0])->pluck('waiver') }}" id="copyTarget{{ $order->id }}">
                  <button  data-id="{{ $order->id }}" class="btn btn-info copy">Copy</button> 
                </td>
								
							</tr>
							@endforeach
							<!-- end foreach -->
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>






    <!-- start add festivals modal -->
    <div class="modal fade" id="modal-container-3495" 
       role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Add Festival
              <button  type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                     <form>
                     <label>Festival Profile ID</label>    
                     <input type="text" name="profile_id" id="profile_id" class="form-control" placeholder="Festival Profile ID" required><br>                     
                     <div id="addFestError">
                     	
                     </div>
                      </div>
                           <div class="modal-footer">
                                 <div class="form-group">
                      
                             </div>
                      <div class="form-group">

                         <button type="submit" class="btn btn-primary" id="submit_delete"> Add Festival <i class="fa fa-plus" aria-hidden="true"></i> </button>

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
      <!-- end add festivals modal -->







    <!-- start add waiver modal -->
    <div class="modal fade" id="modal-container-3496" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Add Weaver
              <button  type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->


				<label for="num_waiver"># of Waivers
                     <input type="number" id="num_waiver" name="num_waiver" value="1" class="form-control">
				</label><br>
				<label for="value_waiver">Waiver value (Discount) $
                     <input type="number" id="value_waiver" name="value_waiver" value="0" class="form-control">
				</label><br>
                     <div id="addWaiverError">
                     	
                     </div>

                      </div>

                           <div class="modal-footer">
                                 <div class="form-group">
                      
                             </div>
                      <div class="form-group">
                       <input type="hidden" id="festival_id" name="product_id" value="0">

                         <button class="btn btn-primary post_waiver" id="submit_waiver"> Add Weaver <i class="fa fa-add" aria-hidden="true"></i> </button>

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
      <!-- end add waivers modal -->






      <script type="text/javascript">
     


      jQuery(document).ready(function() {       

  

      /*
      *
      * show delete modal  
      *
      */
      $('body').on('click','.delete-product',function(){

          $('#modal-container-3495').modal('show');

      });

      $('body').on('click','.add_waiver',function(){

        var product = $(this).data('id');

          $('#festival_id').val(product);
          $('#modal-container-3496').modal('show');


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

        var product_id_delete    = $('#profile_id').val();

         $.ajax({

                        url:'/admin/add_festival_waiver/'+product_id_delete,
                        type:'post',
                        beforeSend:function(){
                          $('#submit_delete').html("waiting...");

                        },
                        success:function(q) {

                           $('#submit_delete').html("Add Festival");
                           
                           if (q.success == 'null') {

                           		$("#addFestError").html('<div class="alert alert-warning">Please Insert Festival ID </div>');
                           }
                           if (q.success == 'not_festival') {

                           		$("#addFestError").html('<div class="alert alert-warning">this ID is not associated with any festival </div>');
                           }

//                           if (q.success == 'exist') {
//
//                           		$("#addFestError").html('<div class="alert alert-warning">this festival already has waiver code </div>');
//
//                           }

                           if (q.success == 'done') {

                           $('.append').prepend(q.html);	
			               $('#modal-container-3495').modal('hide');

                           }

                            
                        }
                    });

               return false;

      });
      /* End Deleting Form */






      /* start Deleting form */
        
        $('body').on('click','.post_waiver',function(){
              /* csrf protection on ajax 
         * 
         * see meta tag in solycrud.blade.php blade template
        */
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        var festival_id   = $('#festival_id').val();
        var num_waiver    = $('#num_waiver').val();
        var value_waiver    = $('#value_waiver').val();

         $.ajax({

                        url:'/admin/add_waiver',
                        type:'post',
                        data:{festival_id:festival_id,num_waiver:num_waiver,value_waiver:value_waiver},
                        beforeSend:function(){

                          $('#submit_waiver').html("waiting...");

                        },
                        success:function(q) {

                          	if (q.success == 'true') {
                              $('#submit_waiver').html("Add Waivers");
                              $('#addWaiverError').html('<div class="alert alert-success">waiver codes added successfully</div>');

                              window.location.reload();

                          	}

                            
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>

<script>
jQuery(document).ready(function() {

   TableManaged.init();
   UIConfirmations.init(); // init page demo



$('body').on('click','.copy',function () {
  var id = $(this).data('id');

copyToClipboard(document.getElementById("copyTarget"+id));
});


function copyToClipboard(elem) {
    // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
        succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
});
</script>



@endsection


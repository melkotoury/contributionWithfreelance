var maxLength = 250;
$('.short-text-area').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength - length;
    $('#chars').text(length);
});

var maxLength1 = 250;
$('.short-text-area1').keyup(function() {
    var length = $(this).val().length;
    var length = maxLength1 - length;
    $('#chars1').text(length);
});

var minLength_a = 0;
$('.long-text-area-a').keyup(function() {
    var length = $(this).val().length;
    var length = minLength_a + length;
    $('#chars_a').text(length);
});
var minLength_b = 0;
$('.long-text-area-b').keyup(function() {
    var length = $(this).val().length;
    var length = minLength_b + length;
    $('#chars_b').text(length);
});




//end file
var ComponentsDateTimePickers = function() {
    var t = function() {
            jQuery().datepicker && $(".date-picker").datepicker({
                rtl: App.isRTL(),
                orientation: "left",
                autoclose: !0
            }), $(document).scroll(function() {
                $("#form_modal2 .date-picker").datepicker("place")
            })
        },
        e = function() {
            jQuery().timepicker && ($(".timepicker-default").timepicker({
                autoclose: !0,
                showSeconds: !0,
                minuteStep: 1
            }), $(".timepicker-no-seconds").timepicker({
                autoclose: !0,
                minuteStep: 5
            }), $(".timepicker-24").timepicker({
                autoclose: !0,
                minuteStep: 5,
                showSeconds: !1,
                showMeridian: !1
            }), $(".timepicker").parent(".input-group").on("click", ".input-group-btn", function(t) {
                t.preventDefault(), $(this).parent(".input-group").find(".timepicker").timepicker("showWidget")
            }), $(document).scroll(function() {
                $("#form_modal4 .timepicker-default, #form_modal4 .timepicker-no-seconds, #form_modal4 .timepicker-24").timepicker("place")
            }))
        },
        o = function() {
            jQuery().daterangepicker && ($("#defaultrange").daterangepicker({
                opens: App.isRTL() ? "left" : "right",
                format: "MM/DD/YYYY",
                separator: " to ",
                startDate: moment().subtract("days", 29),
                endDate: moment(),
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                    "Last 7 Days": [moment().subtract("days", 6), moment()],
                    "Last 30 Days": [moment().subtract("days", 29), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
                },
                minDate: "01/01/2012",
                maxDate: "12/31/2018"
            }, function(t, e) {
                $("#defaultrange input").val(t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY"))
            }), $("#defaultrange_modal").daterangepicker({
                opens: App.isRTL() ? "left" : "right",
                format: "MM/DD/YYYY",
                separator: " to ",
                startDate: moment().subtract("days", 29),
                endDate: moment(),
                minDate: "01/01/2012",
                maxDate: "12/31/2018"
            }, function(t, e) {
                $("#defaultrange_modal input").val(t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY"))
            }), $("#defaultrange_modal").on("click", function() {
                $("#daterangepicker_modal").is(":visible") && 0 == $("body").hasClass("modal-open") && $("body").addClass("modal-open")
            }), $("#reportrange").daterangepicker({
                opens: App.isRTL() ? "left" : "right",
                startDate: moment().subtract("days", 29),
                endDate: moment(),
                dateLimit: {
                    days: 60
                },
                showDropdowns: !0,
                showWeekNumbers: !0,
                timePicker: !1,
                timePickerIncrement: 1,
                timePicker12Hour: !0,
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                    "Last 7 Days": [moment().subtract("days", 6), moment()],
                    "Last 30 Days": [moment().subtract("days", 29), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract("month", 1).startOf("month"), moment().subtract("month", 1).endOf("month")]
                },
                buttonClasses: ["btn"],
                applyClass: "green",
                cancelClass: "default",
                format: "MM/DD/YYYY",
                separator: " to ",
                locale: {
                    applyLabel: "Apply",
                    fromLabel: "From",
                    toLabel: "To",
                    customRangeLabel: "Custom Range",
                    daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                    monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    firstDay: 1
                }
            }, function(t, e) {
                $("#reportrange span").html(t.format("MMMM D, YYYY") + " - " + e.format("MMMM D, YYYY"))
            }), $("#reportrange span").html(moment().subtract("days", 29).format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")))
        },
        a = function() {
            jQuery().datetimepicker && ($(".form_datetime").datetimepicker({
                autoclose: !0,
                isRTL: App.isRTL(),
                format: "dd MM yyyy - hh:ii",
                pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left"
            }), $(".form_advance_datetime").datetimepicker({
                isRTL: App.isRTL(),
                format: "dd MM yyyy - hh:ii",
                autoclose: !0,
                todayBtn: !0,
                startDate: "2013-02-14 10:00",
                pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left",
                minuteStep: 10
            }), $(".form_meridian_datetime").datetimepicker({
                isRTL: App.isRTL(),
                format: "dd MM yyyy - HH:ii P",
                showMeridian: !0,
                autoclose: !0,
                pickerPosition: App.isRTL() ? "bottom-right" : "bottom-left",
                todayBtn: !0
            }), $("body").removeClass("modal-open"), $(document).scroll(function() {
                $("#form_modal1 .form_datetime, #form_modal1 .form_advance_datetime, #form_modal1 .form_meridian_datetime").datetimepicker("place")
            }))
        },
        m = function() {
            jQuery().clockface && ($(".clockface_1").clockface(), $("#clockface_2").clockface({
                format: "HH:mm",
                trigger: "manual"
            }), $("#clockface_2_toggle").click(function(t) {
                t.stopPropagation(), $("#clockface_2").clockface("toggle")
            }), $("#clockface_2_modal").clockface({
                format: "HH:mm",
                trigger: "manual"
            }), $("#clockface_2_modal_toggle").click(function(t) {
                t.stopPropagation(), $("#clockface_2_modal").clockface("toggle")
            }), $(".clockface_3").clockface({
                format: "H:mm"
            }).clockface("show", "14:30"), $(document).scroll(function() {
                $("#form_modal5 .clockface_1, #form_modal5 #clockface_2_modal").clockface("place")
            }))
        };
    return {
        init: function() {
            t(), e(), a(), o(), m()
        }
    }
}();
App.isAngularJsApp() === !1 && jQuery(document).ready(function() {
    ComponentsDateTimePickers.init()
});



/*


start adding by soly

*/


$(document).ready(function() {


    $("#next_one").hide();
    $("#next_three").hide();


    /* add director form 3 */
    $('#adddirform').ajaxForm({

        beforeSubmit: function() {

            $('#adddirsubmit').html(' waiting...');

        },
        success: function(data) {

            $('#adddir').modal('hide');
            $('#adddirsubmit').html('Add Director');
            $('#appendDir').append(data);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#dirErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#adddirsubmit').html('Add Director');


        },

    });
    /* end add director form */


    /* show edit director modal */
    $('body').on('click', '.dir_edit', function(e) {

        e.preventDefault();
        var email = $(this).data('email');
        var content = $(this).data('content');
        var phone = $(this).data('phone');
        var id = $(this).data('id');

        $('#edit_dir_input').val(content);
        $('#edit_dir_email').val(email);
        $('#edit_dir_phone').val(phone);
        $('#dir_id').val(id);

        $('#edit_dir').modal('show');


    });
    /* end show edit director modal */


    /* edit director form */
    $('#editdirform').ajaxForm({

        beforeSubmit: function() {

            $('#editdirsubmit').html(' waiting...');

        },
        success: function(response) {

            var id = response.id;
            var content = response.data

            $('#edit_dir').modal('hide');
            $('#editdirsubmit').html('Edit Director');
            $('#updatedData' + id).replaceWith(content);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#dirEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editdirsubmit').html('Edit Director');


        },

    });
    /* end edit director form */




    /* start Deleting director form */

    $('body').on('click', '.dir_delete', function() {


        var id = $(this).data('id');

        $.post(url + '/deletedir/' + id, function(data) {

            $("#updatedData" + id).remove();

        });
        return false;

    });
    /* End Deleting director form */








/* PRODUCER */


    /* add Producer form 3 */
    $('#addprodform').ajaxForm({

        beforeSubmit: function() {

            $('#addprodsubmit').html(' waiting...');

        },
        success: function(data) {

            $('#addprod').modal('hide');
            $('#addprodsubmit').html('Add Producer');
            $('#appendProd').append(data);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#prodErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#addprodsubmit').html('Add Producer');


        },

    });
    /* end add Producer form */


    /* show edit Producer modal */
    $('body').on('click', '.prod_edit', function(e) {

        e.preventDefault();
        var email = $(this).data('email');
        var content = $(this).data('content');
        var phone = $(this).data('phone');
        var id = $(this).data('id');

        $('#edit_prod_input').val(content);
        $('#edit_prod_email').val(email);
        $('#edit_prod_phone').val(phone);
        $('#prod_id').val(id);

        $('#edit_prod').modal('show');


    });
    /* end show edit Producer modal */

    
    /* edit Producer form */
    $('#editprodform').ajaxForm({

        beforeSubmit: function() {

            $('#editprodsubmit').html(' waiting...');

        },
        success: function(response) {

            var id = response.id;
            var content = response.data

            $('#edit_prod').modal('hide');
            $('#editprodsubmit').html('Edit Producer');
            $('#produpdatedData' + id).replaceWith(content);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#prodEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editprodsubmit').html('Edit Producer');


        },

    });
    /* end edit Producer form */




    /* start Deleting Producer form */

    $('body').on('click', '.prod_delete', function() {


        var id = $(this).data('id');

        $.post(url + '/deleteprod/' + id, function(data) {

            $("#produpdatedData" + id).remove();

        });


        return false;

    });
    /* End Deleting Producer form */

/* END PRODUCER */










/* PRODUCTION COMPANY */


    /* add Production Company form 3 */
    $('#addproductform').ajaxForm({

        beforeSubmit: function() {

            $('#addproductsubmit').html(' waiting...');

        },
        success: function(data) {
console.log(data);
            $('#addproduct').modal('hide');
            $('#addproductsubmit').html('Add Production Company');
            $('#appendProduct').append(data);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#productErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#addproductsubmit').html('Add Production Company');


        },

    });
    /* end add Production Company form */


    /* show edit Production Company modal */
    $('body').on('click', '.product_edit', function(e) {

        e.preventDefault();
        var email = $(this).data('email');
        var content = $(this).data('content');
        var phone = $(this).data('phone');
        var id = $(this).data('id');

        $('#edit_product_input').val(content);
        $('#edit_product_email').val(email);
        $('#edit_product_phone').val(phone);
        $('#product_id').val(id);

        $('#edit_product').modal('show');


    });
    /* end show edit Production Company modal */

    
    /* edit Production Company form */
    $('#editproductform').ajaxForm({

        beforeSubmit: function() {

            $('#editproductsubmit').html(' waiting...');

        },
        success: function(response) {

            var id = response.id;
            var content = response.data

            $('#edit_product').modal('hide');
            $('#editproductsubmit').html('Edit Production Company');
            $('#productupdatedData' + id).replaceWith(content);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#productEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editproductsubmit').html('Edit Production Company');


        },

    });
    /* end edit Production Company form */




    /* start Deleting Production Company form */

    $('body').on('click', '.product_delete', function() {


        var id = $(this).data('id');

        $.post(url + '/deleteproduct/' + id, function(data) {

            $("#productupdatedData" + id).remove();

        });


        return false;

    });
    /* End Deleting Production Company form */

/* END PRODUCTION COMPANY */



/* DISTRIBUTION COMPANY */


    /* add Distribution Company form 3 */
    $('#adddistform').ajaxForm({

        beforeSubmit: function() {

            $('#adddistsubmit').html(' waiting...');

        },
        success: function(data) {

            $('#adddist').modal('hide');
            $('#adddistsubmit').html('Add Distribution Company');
            $('#appendDist').append(data);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#distErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#adddistsubmit').html('Add Distribution Company');


        },

    });
    /* end add Distribution Company form */


    /* show edit Distribution Company modal */
    $('body').on('click', '.dist_edit', function(e) {

        e.preventDefault();
        var email = $(this).data('email');
        var content = $(this).data('content');
        var phone = $(this).data('phone');
        var id = $(this).data('id');

        $('#edit_dist_input').val(content);
        $('#edit_dist_email').val(email);
        $('#edit_dist_phone').val(phone);
        $('#dist_id').val(id);

        $('#edit_dist').modal('show');


    });
    /* end show edit Distribution Company modal */

    
    /* edit Distribution Company form */
    $('#editdistform').ajaxForm({

        beforeSubmit: function() {

            $('#editdistsubmit').html(' waiting...');

        },
        success: function(response) {

            var id = response.id;
            var content = response.data

            $('#edit_dist').modal('hide');
            $('#editdistsubmit').html('Edit Distribution Company');
            $('#distupdatedData' + id).replaceWith(content);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#distEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editdistsubmit').html('Edit Distribution Company');


        },

    });
    /* end edit Distribution Company form */




    /* start Deleting Distribution Company form */

    $('body').on('click', '.dist_delete', function() {


        var id = $(this).data('id');

        $.post(url + '/deletedist/' + id, function(data) {

            $("#distupdatedData" + id).remove();

        });


        return false;

    });
    /* End Deleting Distribution Company form */

/* END DISTRIBUTION COMPANY */






/* Technichal Team */


    /* add Technichal Team */
    $('#addTeam').ajaxForm({

        beforeSubmit: function() {

            $('#addteamsubmit').html(' waiting...');

        },
        success: function(data) {

            $('#addteamsubmit').html('Add Member');
            $('#appendTeam').append(data);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#distTeamErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#addteamsubmit').html('Add Member');


        },

    });
    /* end add Technichal Team form */

    /* show edit Team modal */
    $('body').on('click', '.team_edit', function(e) {

        e.preventDefault();
        var fname = $(this).data('fname');
        var lname = $(this).data('lname');
        var role = $(this).data('role');
        var id = $(this).data('id');

        $('#edit_team_input').val(fname);
        $('#edit_team_email').val(lname);
        $('#edit_team_phone').val(role);
        $('#team_id').val(id);

        $('#edit_team').modal('show');


    });
    /* end show edit Team modal */


    /* edit Member form */
    $('#editteamform').ajaxForm({

        beforeSubmit: function() {

            $('#editteamsubmit').html(' waiting...');

        },
        success: function(response) {

            var id = response.id;
            var content = response.data

            $('#edit_team').modal('hide');
            $('#editteamsubmit').html('Edit Member');
            $('#teamData' + id).replaceWith(content);

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#teamEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#editteamsubmit').html('Edit Member');


        },

    });
    /* end edit Member form */




    /* start Deleting Team form */

    $('body').on('click', '.team_delete', function() {


        var id = $(this).data('id');

        $.post(url + '/deleteteam/' + id, function(data) {

            $("#teamData" + id).remove();

        });


        return false;

    });
    /* End Deleting Team form */




/* start add film poster website */

    $('#filmPoster').ajaxForm({

        beforeSubmit: function() {

            $('#submitPoster').html('uploading...');

        },
        success: function(response) {

            $('#submitPoster').html('Upload Poster');
            $('#posterMessage').html("<div class='alert alert-success'>Uploaded Successfully </div>");

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#posterMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#submitPoster').html('Upload Poster');


        },

    });


/* end add film poster */




/* start add film poster website */

    $('#filmStill').ajaxForm({

        beforeSubmit: function() {

            $('#submitStill').html('uploading...');

        },
        success: function(response) {

            $('#submitStill').html('<i class="fa fa-upload" aria-hidden="true"></i> Upload Film Still');
            $('#stillMessage').html("<div class='alert alert-success'>Uploaded Successfully </div>");

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#stillMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#submitStill').html('<i class="fa fa-upload" aria-hidden="true"></i> Upload Film Still');


        },

    });


/* end add film poster */



/* start add film poster website */

    $('#filmDirPhoto').ajaxForm({

        beforeSubmit: function() {

            $('#submitDirPhoto').html('uploading...');

        },
        success: function(response) {

            $('#submitDirPhoto').html('<i class="fa fa-upload" aria-hidden="true"></i> Upload Film Still');
            $('#dirPhotoMessage').html("<div class='alert alert-success'>Uploaded Successfully </div>");

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#dirPhotoMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#submitDirPhoto').html('<i class="fa fa-upload" aria-hidden="true"></i> Upload Film Still');


        },

    });


/* end add film poster */




/* start add links website */

    $('#filmLink').ajaxForm({

        beforeSubmit: function() {

            $('#linkSubmit').html(' waiting...');

        },
        success: function(response) {
 
            $("#next_three").show();

            $('#linkSubmit').hide();
            $('#linkMessage').html("<div class='alert alert-success'>Added Successfully </div>");

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#linkMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#linkSubmit').html('Save & Continue');


        },

    });


/* end add links website */



/* start add links website */

    $('#filmAwards').ajaxForm({

        beforeSubmit: function() {

            $('#awardSubmit').html(' waiting...');

        },
        success: function(data) {

            if (data.success == 'completed') {

            $('#awardMessage').html("<div class='alert alert-warning'> please complete your film material section </div>");
            $('#awardSubmit').html('Finish');


            } else {

                    if (data.type == 'pr') {

                    // window.location.href = url+'/checkout_for_film/'+data.id;
                    window.location.href = url+'/server_under_construction';

                    } else {

                    $('#awardSubmit').hide();
                    $('#awardMessage').html("<div class='alert alert-success'>Added Successfully </div><div><a href='"+ url +"/myfilms' class='btn btn-success'>Go To My Films</a></div>");

                    }
             }       

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#awardMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#awardSubmit').html('Finish');


        },

    });


/* end add links website */



/* Create Film First Form */

    $('#create_film_first').ajaxForm({

        beforeSubmit: function() {

            $('#Create_film_one').html(' loading...');

        },
        success: function(response) {

            if (response.done == 'unique') {

            $('#message_one').html("<div class='alert alert-danger'>this film url has been already taken </div>");
            $('#Create_film_one').html('Save & Continue');

            } else {

            $("#next_one").show();
            $('#Create_film_one').hide();
            $('#message_one').html("<div class='alert alert-success'>Added Successfully </div>");

            }


        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#message_one').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#Create_film_one').html('Save & Continue');


        },

    });


/* end Create Film First Form */


});
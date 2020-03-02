
    $(document).ready(function() {
	var base_url = window.location.origin+"/paper/paperadmin";
	    <!-- alert(3);    -->
	// route form validation 
	$("input[name='tch3_22']").TouchSpin({
            initval: 0,
		 });
	// add product form 
	$('.price_type').change(function(e){
		var price_type = $(this).val();
		if(price_type=="daily")
		{
		  $('#daily_price').show();
		  $('#monthly_price').hide();
		  $('#fix_price').hide();
		}
		if(price_type=="monthly")
		{
		  $('#monthly_price').show();
		  $('#daily_price').hide();
		  $('#fix_price').hide();
		}
		if(price_type=="fix")
		{
		  $('#fix_price').show();
		   $('#daily_price').hide();
		  $('#monthly_price').hide();
		}
		
	});
	
	// submit product  form 
	$('.product_form').click(function(e) {
	   var product_name=$('#product_name').val();
	   var product_code=$('#product_code').val();
	    var price_type = $("input[name='price_type']:checked").val();
		
	   if(product_name=='')
	   {
			$("#product_name").addClass("danger");
			$('#product_name').focus();
			$('.prdouct_name_error').show();
			return false; 
	   }
	   else
	   {
	      $("#product_name").removeClass("danger");
			$('.prdouct_name_error').hide();
			
	   }
	   if(product_code=='')
	   {
			$("#product_code").addClass("danger");
			$('#product_code').focus();
			$('.prdouct_code_error').show();
			return false; 
	   }
	   else
	   {
	      $("#product_code").removeClass("danger");
		  $('.prdouct_code_error').hide();
			
	   }
	    if($("input:radio[name='price_type']").is(":checked")) {
	      
	      $('.price_error').hide();
		  <!-- return false; -->
	   }
	   else
	   {
	      $('.price_error').show();
		  return false;
	   }
	   if(price_type=="daily")
	   {
	       if($('.sun').val()=='')
			{
			  $(".sun").addClass("danger2");
			    return false
			}
			else
			{
			   $(".sun").removeClass("danger2");
			}
			if($('.mon').val()=='')
			{
			  $(".mon").addClass("danger2");
			    return false
			}
			else
			{
			   $(".mon").removeClass("danger2");
			}
			if($('.tue').val()=='')
			{
			  $(".tue").addClass("danger2");
			    return false
			}
			else
			{
			   $(".wed").removeClass("danger2");
			}
			if($('.wed').val()=='')
			{
			  $(".wed").addClass("danger2");
			    return false
			}
			else
			{
			   $(".wed").removeClass("danger2");
			}
			if($('.thu').val()=='')
			{
			  $(".thu").addClass("danger2");
			    return false
			}
			else
			{
			   $(".thu").removeClass("danger2");
			}
			if($('.fri').val()=='')
			{
			  $(".fri").addClass("danger2");
			    return false
			}
			else
			{
			   $(".fri").removeClass("danger2");
			}
			if($('.sat').val()=='')
			{
			  $(".sat").addClass("danger2");
			    return false
			}
			else
			{
			   $(".sat").removeClass("danger2");
			}
			
	   }
	   if(price_type=="monthly")
	   {
	       if($('.jan').val()=='')
			{
			  $(".jan").addClass("danger2");
			    return false
			}
			else
			{
			   $(".jan").removeClass("danger2");
			}
			if($('.feb').val()=='')
			{
			  $(".feb").addClass("danger2");
			    return false
			}
			else
			{
			   $(".feb").removeClass("danger2");
			}
			if($('.march').val()=='')
			{
			  $(".march").addClass("danger2");
			    return false
			}
			else
			{
			   $(".march").removeClass("danger2");
			}
			if($('.april').val()=='')
			{
			  $(".april").addClass("danger2");
			    return false
			}
			else
			{
			   $(".april").removeClass("danger2");
			}
			if($('.may').val()=='')
			{
			  $(".may").addClass("danger2");
			    return false
			}
			else
			{
			   $(".may").removeClass("danger2");
			}
			if($('.june').val()=='')
			{
			  $(".june").addClass("danger2");
			    return false
			}
			else
			{
			   $(".june").removeClass("danger2");
			}
			if($('.july').val()=='')
			{
			  $(".july").addClass("danger2");
			    return false
			}
			else
			{
			   $(".july").removeClass("danger2");
			}
			if($('.aug').val()=='')
			{
			  $(".aug").addClass("danger2");
			    return false
			}
			else
			{
			   $(".aug").removeClass("danger2");
			}
			if($('.sept').val()=='')
			{
			  $(".sept").addClass("danger2");
			    return false
			}
			else
			{
			   $(".sept").removeClass("danger2");
			}
			if($('.oct').val()=='')
			{
			  $(".oct").addClass("danger2");
			    return false
			}
			else
			{
			   $(".oct").removeClass("danger2");
			}
			if($('.nov').val()=='')
			{
			  $(".nov").addClass("danger2");
			    return false
			}
			else
			{
			   $(".nov").removeClass("danger2");
			}
			if($('.dec').val()=='')
			{
			  $(".dec").addClass("danger2");
			    return false
			}
			else
			{
			   $(".dec").removeClass("danger2");
			}
	   }
	    if(price_type=="fix")
		{
	       if($('.fix_price').val()=='')
			{
			  $(".fix_price").addClass("danger2");
			    return false
			}
			else
			{
			   $(".fix_price").removeClass("danger2");
			}
		}
	  
	   <!-- return false; -->
	});
	$('.route_form').click(function(e) {
	    var route_name=$('.route_name').val();
		var route_code=$('.route_code').val();
	   if(route_name=='')
	   {
			$(".route_name").addClass("danger");
			$('.route_name').focus();
			$('.route_name_error').show();
			return false; 
	   }
	   else
	   {
	      $(".route_name").removeClass("danger");
			$('.route_name_error').hide();
			
	   }
	   if(route_code=='')
	   {
			$(".route_code").addClass("danger");
			$('.route_code').focus();
			$('.route_code_error').show();
			return false; 
	   }
	   else
	   {
	      $(".route_code").removeClass("danger");
			$('.route_code_error').hide();
			
	   }
	});
	$('.edit_route_form').click(function(e) {
	    var edit_route_name=$('.edit_route_name').val();
		var edit_route_code=$('.edit_route_code').val();
	   if(edit_route_name=='')
	   {
			$(".edit_route_name").addClass("danger");
			$('.edit_route_name').focus();
			$('.edit_route_name_error').show();
			return false; 
	   }
	   else
	   {
			$(".edit_route_name").removeClass("danger");
			$('.edit_route_name_error').hide();
			
	   }
	   if(edit_route_code=='')
	   {
			$(".edit_route_code").addClass("danger");
			$('.edit_route_code').focus();
			$('.edit_route_code_error').show();
			return false; 
	   }
	   else
	   {
	      $(".edit_route_code").removeClass("danger");
			$('.edit_route_code_error').hide();
			
	   }
	});
	$('.route_edit').click(function(e) {
	   r_data = {};
	   var route_id = $(this).attr('route_id');
	   r_data['route_id']=route_id;
			$.ajax({
                     url: base_url+"/setting/viewroute",
                    type: "post",
                    // dataType:"json",
                    data: r_data,
                    success: function (data) {
					     var jsonData = JSON.parse(data);
						 var status=jsonData.status;
						
						 if(status==true)
						 {
							var data=jsonData.data;
							$('#edit_route_id').val(data.id);
							$('.edit_route_name').val(data.route_name);
							$('.edit_route_code').val(data.route_code);
							$('.edit_delivery_charges').val(data.delivery_charge);
						    $('#editrouteModel').modal('show'); 
						 }
						 else
						 {
						    alert(jsonData.msg);
							return false;
						 }
						 
					 },
                    error: function () {
						//alert('fail');
                        loading = false;
                    }
                });
	});
	// area form 
	$('.area_form').click(function(e) {
	    var area_name=$('.area_name').val();
		var area_code=$('.area_code').val();
		var e = document.getElementById("route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		// alert(strUser);
	   if(area_name=='')
	   {
			$(".area_name").addClass("danger");
			$('.area_name').focus();
			$('.area_name_error').show();
			return false; 
	   }
	   else
	   {
	      $(".area_name").removeClass("danger");
			$('.area_name_error').hide();
			
	   }
	   if(area_code=='')
	   {
			$(".area_code").addClass("danger");
			$('.area_code').focus();
			$('.area_code_error').show();
			return false; 
	   }
	   else
	   {
	      $(".area_code").removeClass("danger");
			$('.area_code_error').hide();
			
	   }
	   // alert(selected_route_id);
	   if(selected_route_id==-1)
	   {
			$(".route_id").addClass("danger");
			$('.area_route_error').show();
			return false;   
	   }
	   else
	   {
		   $(".route_id").removeClass("danger");
		$('.area_route_error').hide(); 
	   }
	});
	$('.area_edit').click(function(e) {
	   r_data = {};
	   var area_id = $(this).attr('area_id');
	   r_data['area_id']=area_id;
			$.ajax({
                     url: base_url+"/setting/viewarea",
                    type: "post",
                    // dataType:"json",
                    data: r_data,
                    success: function (data) {
					     var jsonData = JSON.parse(data);
						 var status=jsonData.status;
						
						 if(status==true)
						 {
							var data=jsonData.data;
							// var route=jsonData.data;
							$('#edit_area_id').val(data.id);
							$('.edit_area_name').val(data.area_name);
							$('.edit_area_code').val(data.area_code);
							$('#edit_route_id').val(data.route.id);
						    $('#editareaModel').modal('show'); 
						 }
						 else
						 {
						    alert(jsonData.msg);
							return false;
						 }
						 
					 },
                    error: function () {
						//alert('fail');
                        loading = false;
                    }
                });
	});
	// edit area form 
	$('.edit_area_form').click(function(e) {
	    var edit_area_name=$('.edit_area_name').val();
		var edit_area_code=$('.edit_area_code').val();
		var e = document.getElementById("edit_route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		// alert(strUser);
	   if(edit_area_name=='')
	   {
			$(".edit_area_name").addClass("danger");
			$('.edit_area_name').focus();
			$('.edit_area_name_error').show();
			return false; 
	   }
	   else
	   {
	      $(".edit_area_name").removeClass("danger");
			$('.edit_area_name_error').hide();
			
	   }
	   if(edit_area_code=='')
	   {
			$(".edit_area_code").addClass("danger");
			$('.edit_area_code').focus();
			$('.edit_area_code_error').show();
			return false; 
	   }
	   else
	   {
	      $(".edit_area_code").removeClass("danger");
			$('.edit_area_code_error').hide();
			
	   }
	   // alert(selected_route_id);
	   if(selected_route_id==-1)
	   {
			$(".edit_route_id").addClass("danger");
			$('.edit_area_route_error').show();
			return false;   
	   }
	   else
	   {
		   $(".edit_route_id").removeClass("danger");
		$('.edit_area_route_error').hide(); 
	   }
	});
	// hoker add form 
	$('.hoker_form').click(function(e) {
	    var hoker_name=$('#hoker_name').val();
		var e = document.getElementById("route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		var area_ids = [];
		var area_count=0;
		$.each($("input[name='selected_area[]']:checked"), function(){ 
				area_count=area_count+1;
				area_ids.push($(this).val());
		});
		// alert(area_ids);
		// alert(area_count);
	   if(hoker_name=='')
	   {
			$("#hoker_name").addClass("danger");
			$('#hoker_name').focus();
			$('.hoker_name_error').show();
			return false; 
	   }
	   else
	   {
	      $("#hoker_name").removeClass("danger");
			$('.hoker_name_error').hide();
			
	   }
	    if(selected_route_id==-1)
	   {
			$("#route_id").addClass("danger");
			$('#route_id').focus();
			$('.hoker_route_error').show();
			return false; 
	   }
	   else
	   {
	      $(".route_id").removeClass("danger");
			$('.hoker_route_error').hide();
			
	   }
	   if(area_count==0)
	   {
		   $('.hoker_area_error').show();
		   return false;
	   }
	   else
	   {
		   $('.hoker_area_error').hide();   
	   }
	});
	// create user route plan form
	$('.route_plan').click(function(e) {
		var e = document.getElementById("route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		// alert(selected_route_id);
		if(selected_route_id==-1)
		{
			$("#route_id").addClass("danger");
			$("#route_id").focus();
			$('.route_id_error').show();
			return false; 
		}
		else
		{
			
			$.ajax({
			type: "POST",
			url: base_url+"/user/routeplan",
			data:'route_id='+selected_route_id,
			// return false;
			success: function(data){
				 $('#responsive-modal').modal('show'); 
				$(".route_plan_body").html(data);
				
			}
			});
		}
	});
	// product increase plan
	$("input[name=tch3_22]").change(function(){
		// alert($(this).val()); 
		counter_value=$(this).val();
		var product_id = $(this).attr('product_id');
		// alert(product_id);
		var product_value=product_id+"_"+counter_value;
		// alert(product_value);
		var set_id="product_"+product_id;
		document.getElementById(set_id).value =product_value;
	});
	// save route form 
	$('.save_route_form').click(function(e) {
		
		// alert(4;
		var selected_user_id = $("input[name='select_route_user']:checked").val();
		$('#selected_route_user_id').val(selected_user_id);
		  $('#responsive-modal').modal('hide'); 
	});
	// print plan form 
	// $('.print_plan').click(function(e) {
		$(document).on('click', ".print_plan" , function () {
		// alert(3);
		var e = document.getElementById("route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		var e2 = document.getElementById("select_area");
		var selected_area_id = e2.options[e2.selectedIndex].value;
		 r_data = {};
		// alert(selected_route_id);
		
		if(selected_route_id==-1)
		{
			$("#route_id").addClass("danger");
			$("#route_id").focus();
			$('.route_id_error').show();
			return false; 
		}
		else
		{
			if(selected_area_id==-1)
			{
				
			}
			else
			{
				r_data['area_id']=selected_area_id;
			}
			r_data['route_id']=selected_route_id;
			$.ajax({
			type: "POST",
			url: base_url+"/user/printplan",
			data:r_data,
			// return false;
			success: function(data){
				 $('#responsive-print-model').modal('show'); 
				$(".print_plan_body").html(data);
				
			}
			});
		}
	});
	// save print plan id 
	// $('.save_print_form').click(function(e) {
		$(document).on('click', ".save_print_form" , function () {
		
		// alert(4);
		var selected_user_id = $("input[name='select_print_user']:checked").val();
		$('#selected_print_user_id').val(selected_user_id);
		  $('#responsive-print-model').modal('hide'); 
	});
	// working days form 
		$('.working_type').change(function(e){
		var working_type = $(this).val();
		if(working_type=="fix")
		{
		  $('#fix_working_days').show();
		  $('#select_working_days').hide();
		 
		}
		if(working_type=="select")
		{
		  $('#select_working_days').show();
		  $('#fix_working_days').hide();
		 
		}
		
		
	});
	// create user form 
	$('.user_form').click(function(e) {
		 // alert(3);
		 // return false;
		 var user_name=$('#name').val();
		 if(user_name=='')
	   {
			$("#name").addClass("danger");
			$('#name').focus();
			$('.user_name_error').show();
			return false; 
	   }
	   else
	   {
	      $("#name").removeClass("danger");
			$('.user_name_error').hide();
			
	   }
	   var e = document.getElementById("route_id");
		var selected_route_id = e.options[e.selectedIndex].value;
		// select area
		 var e2 = document.getElementById("route_id");
		var selected_area_id = e2.options[e2.selectedIndex].value;
		// alert(selected_route_id);
		if(selected_route_id==-1)
		{
			$("#route_id").addClass("danger");
			$("#route_id").focus();
			$('.route_id_error').show();
			return false; 
		}
		else
		{
			$("#route_id").removeClass("danger");
			$('.route_id_error').hide();
		}
		if(selected_area_id==-1)
		{
			$("#select_area").addClass("danger");
			$("#select_area").focus();
			$('.area_id_error').show();
			return false; 
		}
		else
		{
			$("#select_area").removeClass("danger");
			$('.area_id_error').hide();
		}
	});
		$('#myTable').DataTable();
	        // For select 2
        $(".select2").select2();
			$('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	// hoker form 
	$('.hoker_edit').click(function(e) {
	   r_data = {};
	   var user_id = $(this).attr('user_id');
	   r_data['user_id']=user_id;
			$.ajax({
                     url: base_url+"/user/viewhoker",
                    type: "post",
                    // dataType:"json",
                    data: r_data,
                    success: function (data) {
					     var jsonData = JSON.parse(data);
						 var status=jsonData.status;
						
						 if(status==true)
						 {
							 
							var data=jsonData.data;
							// alert(data.route_id);
							// var area_html
							$('#edit_user_id').val(data.id);
							$('.edit_hoker_name').val(data.name);
							$('.edit_hoker_email').val(data.email);
							$('.edit_hoker_mobile').val(data.mobile);
							$('.edt_hoker_password').val(data.user_password);
							$('.edit_hoker_join_date').val(data.join_date);
							$('#edit_route_id').val(data.route_id);
						    $('#Hokermodal').modal('show'); 
						 }
						 else
						 {
						    alert(jsonData.msg);
							return false;
						 }
						 
					 },
                    error: function () {
						//alert('fail');
                        loading = false;
                    }
                });
	});
	
		$('#example24').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
	    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
	 });

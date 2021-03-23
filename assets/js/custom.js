$(document).ready(function(){
	
	$("#add-item").click(function(){
		$.post( "invoice.php", {
		  		name:$("#item").val(),
		  		quantity:$("#quantity").val(),
		  		price:$("#price").val(),
		  		tax:$("#tax").val(),
		  		add_item:true})
		  .done(function( data ) {
		    window.location.reload();
		});
	});

	$("#clear-cart").click(function(){
		$.post( "invoice.php", {clear_cart:true})
		  .done(function( data ) {
		    window.location.reload();
		});
	});

	$("#price,#tax,#quantity").on('input',function(){
		if($("#price").val() != '' && $("#quantity").val() != ''){
			line_total = parseFloat($("#price").val())*parseFloat($("#quantity").val());
			tax = line_total * parseFloat($("#tax").val())/100;
			$("#line-total").val(line_total+tax);
			$("#add-item").prop('disabled',false);

		}else{
			$("#line-total").val("");
			$("#add-item").prop('disabled',true);
		}
	});

	$("#discount").on('keyup',function(){
		if($("#discount").val() != ''){
			discount = parseFloat($("#discount").val());
		}else{
			discount = 0;
		}
		total_amount = parseFloat($("#sub-total-tax").val()) - discount;
		//$("#total-amount").val(total_amount);
		$("#total-amount-span").text('$'+ parseFloat(total_amount).toFixed(2));
		if(discount > 0)
		$("#total-amount-tr").show();
		else
			$("#total-amount-tr").hide();

	});

	$("#generate-inv").click(function(){
		window.print();
	});
});
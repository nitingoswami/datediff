 var ele = null;
    function showSuggestion(element,suggestionsFor){
		ele = element;
	    $('[class^="s-"]').hide();
		var offset = $(element).offset();
		
		switch (suggestionsFor) {
		  case 'm':
		      $('.s-month').css({ 'top' : offset.top + 36, 'left' : offset.left });
		      $('.s-month').show();
		      break; 
		  case 'd':
		      $('.s-day').css({ 'top' : offset.top + 36, 'left' : offset.left });
		      $('.s-day').show();
			  break; 
		  case 'y':
		      $('.s-year').css({ 'top' : offset.top + 36, 'left' : offset.left });
		      $('.s-year').show();
			  break;
		  default: 
			  return false;
		}
	}
	
	function selectYear(year){
		if(ele){
			$(ele).val(year);
			$('[class^="s-"]').hide();
		}
	}
	
	function selectMonth(month){
		if(ele){
			$(ele).val(( month < 9 ? '0'+month : month));
			$('[class^="s-"]').hide();
		}
	}
	
	function selectDay(day){
		if(ele){
			$(ele).val(( day < 9 ? '0'+day : day));
			$('[class^="s-"]').hide();
		}
	}
	
	$(document).on('click','.cal-duration',function(){
		$('.cal-duration-result-wrap').hide();
		var reqPass = true;
		$('input.required').each(function(){
			if($(this).val() ==''){
				reqPass = false;
				$(this).addClass('error-red');
			}
		});
		
		if(reqPass){
			var startDate = $('input[name=start_year]').val()+'-'+$('input[name=start_month]').val()+'-'+$('input[name=start_day]').val();
			
			var endDate = $('input[name=end_year]').val()+'-'+$('input[name=end_month]').val()+'-'+$('input[name=end_day]').val();
			
			console.log(startDate+' - '+ endDate);
			
			$.post('/',{ '_csrfToken' : $('meta[name=_token]').attr('content'), startDate : startDate, endDate : endDate },function(res){
				res = $.parseJSON(res);
				if(typeof res.status !='undefined' && res.status == 'success'){
					$('.cal-duration-result').html(res.msg);
					$('.cal-duration-result-wrap').show();
				}else{
					alert(res.msg);
				}
			});
			
		}
	});
	
	$('.start-date-cal,.end-date-cal').datepicker({
		format: 'yyyy-mm-dd',
		startDate: '-3d',
		autoclose: true
	}).on('changeDate',function(e){
		
		if(e.target.classList.contains('start-date-cal')){
			$('input[name=start_year]').val(e.format().split('-')[0]);
			$('input[name=start_month]').val(e.format().split('-')[1]);
			$('input[name=start_day]').val(e.format().split('-')[2]);
		}else{
			$('input[name=end_year]').val(e.format().split('-')[0]);
			$('input[name=end_month]').val(e.format().split('-')[1]);
			$('input[name=end_day]').val(e.format().split('-')[2]);
		}
		
	});
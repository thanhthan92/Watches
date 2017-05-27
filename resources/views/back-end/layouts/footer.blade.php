	<script src="{!!url('/back-end/js/bootstrap.min.js')!!}"></script>
	<script src="{!!url('/back-end/js/chart.min.js')!!}"></script>
	<script src="{!!url('/back-end/js/chart-data.js')!!}"></script>
	<script src="{!!url('/back-end/js/easypiechart.js')!!}"></script>
	<script src="{!!url('/back-end/js/easypiechart-data.js')!!}"></script>
	<script src="{!!url('/back-end/js/bootstrap-datepicker.js')!!}"></script>
	<script type='text/javascript' src='{!!url('/js/script.js')!!}'></script> 
	<script>
		if ($('#calendar')!= null && $('#calendar') != undefined && $('#calendar').length != 0) {
			$('#calendar').datepicker({});
		}

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function() {          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
			if ($(window).width() > 768)
		  		$('#sidebar-collapse').collapse('show');
		  	else
		  		$('#sidebar-collapse').collapse('hide');
		})

		function message(text) {
			var html = '';
			html += '<style scope>';
			html += '.modal-dialog {position:absolute;top:50%;left:50%;transform:translate(-50%, -50%)!important}';
			html += '@media(max-width: 768px) {';
			html += '.modal-dialog {width:90%;margin:0 auto}';
			html += '}';
			html += '</style>';

    		html += '<div class="modal-dialog">';
    		html += '<div class="modal-content" style="padding: 25px 0; text-align: center">';
    		html += '<h4 style="color:#000">' + text + '</h4>';
    		html += '</div>';
    		html += '</div>';

			var el = document.createElement("div");
			el.setAttribute('class', "modal fade");
			el.innerHTML = html;

			$(el).modal();
		}
	</script>	
</body>

</html>

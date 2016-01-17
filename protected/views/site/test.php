<input id="test">
<script type="text/javascript">
<!--
$("#test").autocomplete({
		'source': function(req,resp){
			$.getJSON('http://85.234.60.23:8090',{'patern':$('#test').val()},function(data,status,r){
					alert(status);
					resp( $.map( data, function( item ) {
			              return {
			                label: item,
			                value: item
			              }
			            }));
				});
		}
});

//-->
</script>

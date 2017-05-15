$(function(){
	$('#select_ub_tecnico').change(function(){
		searchInput($("#tabla-tecnicos tbody tr"), $(this).val(),$(this).data("name"));
	});

	$('#select_ub_ser_ter').change(function(){
		searchInput($("#tabla_ser_ter tbody tr"), $(this).val(),$(this).data("name"));
	});

	$('#select_ub_ub').change(function(){
		searchInput($("#tabla_ubs tbody tr"), $(this).val(),$(this).data("name"));
	});

	$('#select_ub_calendario').change(function(){
		searchInput($("#tabla_calendarios tbody tr"), $(this).val(),$(this).data("name"));
	});
});




function searchInput(rows,txt,filtro) {
	var text_cell = "";
	rows.each(function (index,e) {
	$(this).children('td').each(function(i,e){
		if ($(this).data("name") == filtro){
			text_cell = $(this).text();
			if(text_cell.toUpperCase().indexOf(txt.toUpperCase()) > -1 || txt.toUpperCase() == "TODOS"){
				$(this).parent().css('display','table-row');
			} else {
				$(this).parent().css('display','none');	
			}
		}
    	});
	});
}
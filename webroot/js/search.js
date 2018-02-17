/*$(document).ready(function(){
	$('#buscar').autocomplete({
		minlenght: 2,
		select: function(event,ui){
            $('#buscar').val(ui.item.label);
		},
		source: function(request,response){
			alert(request.term);
			$.ajax({
				type: "POST",
             url: '.../Ciclo_Barva/cliente/buscar',
             data: {
             	term: request.term,
             	accion: "buscar"
             },
             dataType: 'json',
             error: function () {
              alert("no entro")
            },
             success: function(data){
             	alert("si entro");
             	response($.map(data, function(el,index){
             		return{
             			value: el.Cliente.nombre,
             			nombre: el.Cliente.nombre,
             			telefono: el.Cliente.telefono
             		};
             	}));
             }
			});
		}
	}).data("ui-autocomplete")._renderItem = function(ul,item){
		alet("entro aqui")
		return $("<li></li>")
		.data("item.autocomplete", item)
		.append("<a>" + item.nombre + item.telefono + "</a>")
		.appendto(ul)
	};

*/


function llenarAutoCompleteCliente(data) {
	data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
	                return element.telefono.toString();
                  },

        list: {
            match: {
                enabled: true
            }
        },
        template: {
            type: "description",
            fields: {
                description: function(element) {
	                return element.nombre + " - " + element.alias;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#buscar").easyAutocomplete(opcions);
}




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

function llenarAutoCompleteUsuario(data) {
	data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
	                return element.cedula.toString();
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
	                return element.nombre + " - " + element.primer_ape;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#buscar").easyAutocomplete(opcions);
    $("#usuario_id").easyAutocomplete(opcions);
}

function llenarAutoCompleteClienteBici(data) {
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
    $("#cliente_id").easyAutocomplete(opcions);
}

function llenarAutoCompleteMarca(data) {
	data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
	                return element.nombre;
                  },

        list: {
            match: {
                enabled: true
            }
         },
        theme: "dark-light"
//gris oscuro
    };
    $("#marca_id").easyAutocomplete(opcions);
}

function comfirmar(nombre, cliente_id, usuario_id){
	if(confirm("Estas seguro que quiere crear una boleta de reparacion al cliente " + nombre)){
		return location.href = '/Ciclo_Barva/boleta/add/' + cliente_id + '/' + usuario_id ;
	}
	else{
		return false;
	}
}

function llenarAutoCompleteBici(data) {

  data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
                  return element.id.toString();
                  },

        all: {
            match: {
                enabled: true
            }
         },
        template: {
            type: "description",
            fields: {
                description: function(element) {
                  return element.marca.nombre + " - " + element.color + " - " + element.tamano;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#bicicleta_id").easyAutocomplete(opcions);
}

function llenarAutoCompleteBoleta(data) {

  data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
                  return element.id.toString();
                  },

        all: {
            match: {
                enabled: true
            }
         },
        template: {
            type: "description",
            fields: {
                description: function(element) {
                  return element.cliente.nombre + " - " + element.clente.telefono;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#boleta_id").easyAutocomplete(opcions);
}

function nuevo_mantenimiento(boleta_id, cliente_id){
  return location.href = '/Ciclo_Barva/mantenimiento/add/' + boleta_id + '/' + cliente_id;
}

function llenarAutoCompleteRepuesto(data) {
  data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
                  return element.id.toString();
                  },

        all: {
            match: {
                enabled: true
            }
         },
        template: {
            type: "description",
            fields: {
                description: function(element) {
                  return element.descripcion+ " - " + element.categoria+ " - " +element.marca_id;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#repuesto_id").easyAutocomplete(opcions);
}
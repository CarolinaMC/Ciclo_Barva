


function llenarAutoCompleteCliente(data) {
	data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
	                return element.telefono.toString() + "  " + element.nombre;
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
	                return element.primer_ape + " - " + element.alias;
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
	                return element.cedula.toString()+ " " + element.nombre;
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
	                return element.primer_ape;
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
	                return element.telefono.toString() + "  " + element.nombre;
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
	                return element.primer_ape + " - " + element.alias;
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
		return location.href = 'boleta/add/' + nombre + '/' + cliente_id + '/' + usuario_id ;
	}
	else{
		return false;
	}
}
   function buscarCategoria(mantenimiento = null){
  return location.href = 'mantrepuesto/add/' + mantenimiento + '/' + $('#categoria').val();
}

function llenarAutoCompleteBici(data) {
  if(data.length>3){

  data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
                  return element.id.toString() + " " +element.marca_nombre;
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
                  return element.color + " - " + element.tamano;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#bicicleta_id").easyAutocomplete(opcions);
  }
  else
    alert("El cliente no tiene bicicletas");
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
                  return element.cliente.nombre + " - " + element.cliente.telefono;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#boleta_id").easyAutocomplete(opcions);
}

function llenarAutoCompleteBiciCliente(data) {
  data = JSON.parse(data);
    var opcions = {
        data ,
        getValue: function(element) {
                  return element.id.toString() + " " + element.marca_nombre ;
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
                  return element.color + " - " + element.tamano + " - " + element.cliente.nombre;
                  }
            }
        },
        theme: "dark-light"
//gris oscuro
    };
    $("#buscar").easyAutocomplete(opcions);
}

function nuevo_mantenimiento(cliente_nombre, boleta_id, cliente_id){
  return location.href = 'mantenimiento/add/' + cliente_nombre + '/' + boleta_id + '/' + cliente_id;
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

    function f1(){

 
        var lista = document.getElementById("equipo");
        var idseleccionado = lista.options[lista.selectedIndex].id;
       
        $.post("eso.php",{ideso:idseleccionado}).done(
            function(data){

                var campos = data.split("_");
                var codigo = campos[0].split(":")[1];
                var referencia = campos[1].split(":")[1];

                document.getElementById('codigoo').value = codigo;
                document.getElementById('referenciaa').value = referencia;

                console.log(codigo);
                console.log(referencia);

                                
            });
      }

   $(document).ready(function() {


      
    $('#contact_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            equipo: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Por favor selecciona el nombre del equipo'
                    }
                }
            },
             
            activo: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Por favor ingrese el numero de activo fijo'
                    }
                }
            },

            idsar: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Por favor ingrese el ID SAR'
                    }
                }
                }, 

            ciudad: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Por favor selecciona tu ciudad'
                    }
                }
            },

            remision: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Por favor ingresa el numero de remision'
                    }
                }
            },

             numero: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Por favor ingresa el numero de serie del equipo'
                    }
                }
            },
            incidente: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Por favor ingresa el numero del incidente'
                    }
                }
            },
             fabricante: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Por favor selecciona el nombre del equipo'
                    }
                }
            },

            proveedor: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Por favor nombre del proveedor'
                    }
                }
             },   

            observaciones: {
                validators: {
                      stringLength: {
                        min: 2,
                       
                    },
                    notEmpty: {
                        message: 'Por favor ingresa la falla'
                    }
                    }
                }
            }
        })
       
});
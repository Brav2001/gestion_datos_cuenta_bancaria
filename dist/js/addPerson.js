function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    if (tecla==48) return true;
    if (tecla==49) return true;
    if (tecla==50) return true;
    if (tecla==51) return true;
    if (tecla==52) return true;
    if (tecla==53) return true;
    if (tecla==54) return true;
    if (tecla==55) return true;
    if (tecla==56) return true;
    if (tecla==57) return true;
    patron = /1/; 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
function add()
{
  var boton=document.getElementById("svAsociados");
  boton.disabled=true;
  var nombre=document.getElementById("names").value;
  if(nombre=="")
  {
    M.toast({html: 'El campo NOMBRE est&aacute VAC&IacuteO '});
    boton.disabled=false;
  }
  else
  {
    var apellido=document.getElementById("surnames").value;
    if(apellido=="")
    {
      M.toast({html: 'El campo APELLIDO est&aacute VAC&IacuteO '});
      boton.disabled=false;
    }
    else
    {
      var documento=document.getElementById("document").value;
      if(documento.length<8 || documento.length>10)
      {
        M.toast({html: 'El campo DOCUMENTO NO es V&AacuteLIDO '});
        boton.disabled=false;
      }
      else
      {
        var celular=document.getElementById("phone").value;
        if(!(celular.length==10))
        {
          M.toast({html: 'El campo CELULAR NO es V&AacuteLIDO '});
          boton.disabled=false;
        }
        else
        {
          var cargo=document.getElementById("cargo").value;
          if(cargo=="")
          {
            M.toast({html: 'Elija un CARGO'});
            boton.disabled=false;
          }
          else
          {
            Swal.fire({
              title: '¿Está seguro?',
              text: "No podrá revertir este cambio una vez realizado",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#1976d2',
              cancelButtonColor: '#d32f2f',
              confirmButtonText: 'Registrar asociado',
              cancelButtonText: 'Cancelar'
            }).then((result) => {
              if (result.isConfirmed) {
                var cadena = new FormData(document.querySelector('#aggAsociados'));
                fetch('person_CO/addPerson', {
                  method: 'POST',
                  body: cadena
                })
                .then(res => res.json())
                .then(res=>{
                  if(res.estado=="EXITO")
                  {
                    Swal.fire({
                      icon:'success',
                      title: 'Asociado registrado',
                      text:'El asociado se ha registrado con exito',
                      showConfirmButton:false,
                      timer: 2000
                    })
                    document.getElementById("names").value="";
                    document.getElementById("surnames").value="";
                    document.getElementById("document").value="";
                    document.getElementById("phone").value="";
                    document.getElementById("cargo").value="";
                    boton.disabled=false;
                    
                  }
                  else if(res.estado=="ERROR")
                  {
                    M.toast({html: res.mensaje});
                    boton.disabled=false;
                  }
                    
                })
              }
            })
          }
        }
      }
    }
  }
}
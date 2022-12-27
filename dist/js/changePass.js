function newPass()
{
    var pass1=document.getElementById("passn1");
    var pass2=document.getElementById("passn2");
    if(pass1.value.length<8)
    {
        if(pass1.classList.contains("valid"))
        {
            pass1.classList.remove("valid");
            pass1.classList.add("invalid");
        }
        else if(pass1.classList.contains("invalid")){}
        else
        {
            pass1.classList.add("invalid");
        }
    }
    if(pass2.value.length<8)
    {
        if(pass2.classList.contains("valid"))
        {
            pass2.classList.remove("valid");
            pass2.classList.add("invalid");
        }
        else if(pass2.classList.contains("invalid")){}
        else
        {
            pass2.classList.add("invalid");
        }
    }
    if(pass1.value==pass2.value)
    {
        if(pass1.classList.contains("invalid"))
        {
            pass1.classList.remove("invalid");
            pass1.classList.add("valid");
        }
        else if(pass1.classList.contains("valid")){}
        else
        {
            pass1.classList.add("valid");
        }
        if(pass2.classList.contains("invalid"))
        {
            pass2.classList.remove("invalid");
            pass2.classList.add("valid");
        }
        else if(pass2.classList.contains("valid"))
        {
            
        }
        else
        {
            pass1.classList.add("valid");
        }
    }
    else
    {
        if(pass1.classList.contains("valid"))
        {
            pass1.classList.remove("valid");
            pass1.classList.add("invalid");
        }
        else if(pass1.classList.contains("invalid"))
        {}
        else
        {
            pass1.classList.add("invalid");
        }
        if(pass2.classList.contains("valid"))
        {
            pass2.classList.remove("valid");
            pass2.classList.add("invalid");
        }
        else if(pass2.classList.contains("invalid"))
        {}
        else
        {
            pass2.classList.add("invalid");
        }
    }
}


function fcc()
{
    var boton=document.getElementById("btncc");
    boton.disabled=true;
    var cv=document.getElementById("passv").value
    var c1=document.getElementById("passn1").value
    var c2=document.getElementById("passn2").value;
    if(cv=="")
    {
        M.toast({html: 'El campo CONTRASE&NtildeA ANTIGUA est&aacute VAC&IacuteO '});
        boton.disabled=false;
    }
    else if(cv.length<8)
    {
        M.toast({html: 'El campo CONTRASE&NtildeA ANTIGUA NO es V&AacuteLIDO '});
        boton.disabled=false;
    }
    else if(c1=="")
    {
        M.toast({html: 'El campo NUEVA CONTRASE&NtildeA  est&aacute VAC&IacuteO '});
        boton.disabled=false;
    }
    else if(c1.length<8)
    {
        M.toast({html: 'El campo NUEVA CONTRASE&NtildeA NO es V&AacuteLIDO '});
        boton.disabled=false;
    }
    else if(c2=="")
    {
        M.toast({html: 'El campo CONFIRMAR CONTRASE&NtildeA  est&aacute VAC&IacuteO '});
        boton.disabled=false;
    }
    else if(c2.length<8)
    {
        M.toast({html: 'El campo CONFIRMAR CONTRASE&NtildeA NO es V&AacuteLIDO '});
        boton.disabled=false;
    }
    else if(c2==c1)
    {
        var cadena = new FormData(document.querySelector('#cpform'))
            fetch('user_CO/valitePass', {
              method: 'POST',
              body: cadena
              })
              .then(res => res.json())
              .then(res=> {
                  if(res.estado=='EXITO')
                  {
                    Swal.fire({
                        title: '¿Está seguro?',
                        text: "No podrá revertir este cambio una vez realizado",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#1976d2',
                        cancelButtonColor: '#d32f2f',
                        confirmButtonText: 'Si, cambiar contrase&ntildea',
                        cancelButtonText: 'Cancelar'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('user_CO/changePass',{
                                method:'POST',
                                body: cadena
                            })
                            .then(res => res.json())
                            .then(res=>{
                                if(res.estado=="EXITO")
                                {
                                    Swal.fire(
                                        'Contrase&ntildea actualizada',
                                        'La contrase&ntildea ha sido cambiada con exito',
                                        'success'
                                    )
                                    document.getElementById("passv").value="";
                                    document.getElementById("passn1").value="";
                                    document.getElementById("passn2").value="";
                                    document.getElementById("passv").classList.remove("valid");
                                    document.getElementById("passn1").classList.remove("valid");
                                    document.getElementById("passn2").classList.remove("valid");
                                    boton.disabled=false;
                                }
                                else if(res.estado=="ERROR")
                                {
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'error'
                                    )
                                    boton.disabled=false;
                                }
                            })
                        }
                        else
                        {
                            boton.disabled=false;
                        }
                      })
                    
                  }
                  else if(res.estado=='ERROR')
                  {
                    M.toast({html: res.mensaje});
                    boton.disabled=false;
                  }
                    
              });
    }
    else
    {
        M.toast({html: 'Las CONTRASE&NtildeAS NO COINCIDEN'});
        boton.disabled=false;
    }
}
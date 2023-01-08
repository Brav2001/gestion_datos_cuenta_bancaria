

$(document).ready(function(){
    $('#mes').formSelect();
    $('#ano').formSelect();
  });
function pagoAporte(pers_id)
{
    var boton=document.getElementById("btnPagoAporte");
    var botona=document.getElementById("btnPagoAporteCancel");
    var botonb=document.getElementById("btnpagoAporte_trigger");
    boton.disabled=true;
    botona.disabled=true;
    botonb.disabled=true;
    var valor=document.getElementById("valor").value;
    if(valor<100 || valor>15000)
    {
        M.toast({html: 'El campo VALOR NO es V&AacuteLIDO '});
        boton.disabled=false;
        botona.disabled=false;
        botonb.disabled=false;
    }
    else
    {
        var descripcion=document.getElementById("descripcion").value;
        if(descripcion.length<5 || descripcion.length>100)
        {
        M.toast({html: 'El campo DESCRIPCI&OacuteN NO es V&AacuteLIDO '});
        boton.disabled=false;
        botona.disabled=false;
        botonb.disabled=false;
        }
        else
        {
        var mes=document.getElementById("mes").value;
        if(mes=='1' || mes=='2' || mes=='3' || mes=='4' || mes=='5' || mes=='6' || mes=='7' || mes=='8' || mes=='9' || mes=='10' || mes=='11' || mes=='12' )
        {
            var ano=document.getElementById("ano").value;
            if( ano=='2022' || ano=='2023' || ano=='2024' || ano=='2025' ||ano=='2026')
            {
            Swal.fire({
                title: '¿Está seguro?',
                text: "No podrá revertir este cambio una vez realizado",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1976d2',
                cancelButtonColor: '#d32f2f',
                confirmButtonText: 'Registrar aporte',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                var data = new FormData(document.getElementById('formpagoabono'));
                data.append('asociado', pers_id);
                data.append('month', mes);
                data.append('year', ano);
                fetch('saving_CO/addSaving', {
                    method: 'POST',
                    body: data
                })
                .then(res => res.json())
                .then(res=>{
                    if(res.estado=="EXITO")
                    {
                    Swal.fire({
                        icon:'success',
                        title: 'Aporte registrado',
                        text:'El aporte se ha registrado con exito',
                        showConfirmButton:false,
                        timer:2000,
                        
                    })
                        
                    boton.disabled=false;
                    botona.disabled=false;
                    botonb.disabled=false;
                    boton.disabled=false;
                    $.post("admin_VI/infSavingPerson",{pers_id:pers_id},function(respuesta){
                        $('#content').html(respuesta);
                    })
                    }
                    else if(res.estado=="ERROR")
                    {
                    Swal.fire({
                        icon:'error',
                        title:'MES DUPLICADO',
                        text:res.mensaje,
                        showConfirmButton:false,
                        timer:3000,


                    }
                    )
                    
                    botona.disabled=false;
                    botonb.disabled=false;
                    boton.disabled=false;
                    }
                    
                })
                }
            })
            }
            else
            {
            M.toast({html: 'El campo A&Ntilde;O NO es V&AacuteLIDO '});
            boton.disabled=false;
            botona.disabled=false;
            botonb.disabled=false;
            }
        }
        else
        {
            M.toast({html: 'El campo MES NO es V&AacuteLIDO '});
            boton.disabled=false;
            botona.disabled=false;
            botonb.disabled=false;
        }
        
        }
    }
}
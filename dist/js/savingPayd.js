function savingPayd(id)
{
    let boton=document.getElementById("btnPago");
    let botona=document.getElementById("btnPagoCancel");
    let botonb=document.getElementById("btnpago_trigger");
    let capital=document.getElementById('capital').value;
    let interes=document.getElementById('interes').value;
    let mora=document.getElementById('mora').value;
    let aumentar=document.getElementById('aumentar').value;
    let excedente=document.getElementById('excedente').value;


    boton.disabled=true;
    botona.disabled=true;
    botonb.disabled=true;

    document.getElementById('interes').disabled=false;
    document.getElementById('mora').disabled=false;

    if( capital>=0 && interes>0 && mora >=0 && aumentar>=0 && excedente>=0 ){
        Swal.fire({
            title: '¿Está seguro?',
            text: "No podrá revertir este cambio una vez realizado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1976d2',
            cancelButtonColor: '#d32f2f',
            confirmButtonText: 'Registrar pago',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
            let data = new FormData(document.getElementById('formpago'));
            data.append('credit_id',id);
            fetch('payment_CO/savingPay', {
                method: 'POST',
                body: data
            })
            .then(res => res.json())
            .then(res=>{
                if(res.estado=="EXITO")
                {
                Swal.fire({
                    icon:'success',
                    title: 'Pago registrado',
                    text:'El Pago se ha registrado con exito',
                    showConfirmButton:false,
                    timer:2000,
                    
                })
                    
                boton.disabled=false;
                botona.disabled=false;
                botonb.disabled=false;
                $.post("admin_VI/infCreditActive",{credit_id:id},function(respuesta){
                    $('#content').html(respuesta);
                })
                }
                else if(res.estado=="ERROR")
                {
                Swal.fire({
                    icon:'error',
                    title:'NO SE COMPLETO EL PROCESO',
                    text:res.mensaje,
                    showConfirmButton:false,
                    timer:3000,


                }
                )
                
                botona.disabled=false;
                botonb.disabled=false;
                boton.disabled=false;
                }
                else if(res.estado=='COMPLETADO')
                {
                    Swal.fire({
                        icon:'success',
                        title:'CRÉDITO PAGADO',
                        showConfirmButton:true,
    
    
                    }
                    ).then((result) =>{
                        if(result.isConfirmed)
                        {
                            pages("admin_VI/creditActiveList");
                        }
                        else if(result.dismiss === Swal.DismissReason.backdrop)
                        {
                            pages("admin_VI/creditActiveList");
                        }
                    })
                    
                    botona.disabled=false;
                    botonb.disabled=false;
                    boton.disabled=false;
                }
                
            })
            }
            boton.disabled=false;  
            botona.disabled=false;
            botonb.disabled=false;
            document.getElementById('interes').disabled=true;
            document.getElementById('mora').disabled=true;
        })
    }
    else{
        Swal.fire({
            icon:'error',
            title:'CAMPOS INCORRECTOS',
            text:'revise los campos',
            showConfirmButton:false,
            timer:3000,
        })
        document.getElementById('formpago').reset();
        boton.disabled=true;
        botona.disabled=true;
        botonb.disabled=true;
        document.getElementById('interes').disabled=true;
        document.getElementById('mora').disabled=true;
    }
}
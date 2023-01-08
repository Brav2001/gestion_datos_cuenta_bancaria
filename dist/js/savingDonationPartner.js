function donationPartner() {
    nombre=document.getElementById('names').value;
    valor=document.getElementById('valor').value;
    concepto=document.getElementById('conceptoIngreso').value;

    boton=document.getElementById("btnPagoDonacion");
    boton.disabled=true;
    if(!nombre || !valor || !concepto || valor<100)
    {
        Swal.fire({
            icon: 'error',
            title: 'Datos incompletos',
            confirmButtonColor: '#1976d2',
            confirmButtonText: 'Aceptar',
        })
        return;
    }
    id=buscarId();
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
        let data = new FormData(document.getElementById('aggIngresoDonacion'));
        data.append('id',id);
        fetch('donation_CO/savingDonationForPartner', {
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
                $.post("admin_VI/donations",function(respuesta){
                    $('#content').html(respuesta);
                })
            }
            else if(res.estado=="ERROR")
            {
            Swal.fire({
                icon:'error',
                title:'NO SE COMPLETO EL PROCESO',
                showConfirmButton:false,
                timer:3000,


            }
            )
            
            botona.disabled=false;
            }
            
            
        })
    }
    })

}
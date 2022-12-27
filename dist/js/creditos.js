function revisado(id)
{
    document.getElementById(`btnrevisado${id}`).disabled=true;
    Swal.fire({
        title: '¿Cuál es la respuesta de la junta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1976d2',
        cancelButtonColor: '#d32f2f',
        confirmButtonText: 'Aprobar',
        cancelButtonText: 'Denegar'
      }).then((result) =>{
          if(result.isConfirmed)
          {
              var data=new FormData(document.getElementById(`solicitud${id}`));
              data.append("socr_id",id);
              fetch('credit_CO/approveApply',
              {
                  method:'POST',
                  body:data
              }).then(res=>res.json())
              .then(res=>{
                if(res.estado=="EXITO")
                {
                  Swal.fire({
                      icon:'success',
                      title: 'Estado cambiado',
                      text:'El estado de la solicitud ha sido cambiado a (PRE-APROBADO)',
                      showConfirmButton:true,
                      confirmButtonColor: '#1976d2',
                    })
                  .then((result) =>{
                      if(result.isConfirmed)
                      {
                          pages("admin_VI/creditApplication");
                      }
                      else if(result.dismiss === Swal.DismissReason.backdrop)
                      {
                          pages("admin_VI/creditApplication");
                      }
                  })
                }
                else if(res.estado=="ERROR")
                {
                  Swal.fire({
                      icon:'success',
                      title: 'Ha ocurrido un error',
                      text:'Reintente enviando nuevamente',
                      showConfirmButton:true,
                      confirmButtonColor: '#1976d2',
                    })
                  .then((result) =>{
                      if(result.isConfirmed)
                      {
                          pages("admin_VI/creditApplication");
                      }
                      else if(result.dismiss === Swal.DismissReason.backdrop)
                      {
                          pages("admin_VI/creditApplication");
                      }
                  })
                }
              })
          }
          else if(result.dismiss === Swal.DismissReason.cancel)
          {
              var data = new FormData();
              data.append("socr_id",id);
              fetch('credit_CO/denyApply',
              {
                  method:'POST',
                  body:data
              }).then(res=>res.json())
              .then(res=>{
                  if(res.estado=="EXITO")
                  {
                    Swal.fire({
                        icon:'success',
                        title: 'Estado cambiado',
                        text:'El estado de la solicitud ha sido cambiado a (DENEGADO)',
                        showConfirmButton:true,
                        confirmButtonColor: '#1976d2',
                      })
                    .then((result) =>{
                        if(result.isConfirmed)
                        {
                            pages("admin_VI/creditApplication");
                        }
                        else if(result.dismiss === Swal.DismissReason.backdrop)
                        {
                            pages("admin_VI/creditApplication");
                        }
                    })
                  }
                  else if(res.estado=="ERROR")
                  {
                    Swal.fire({
                        icon:'success',
                        title: 'Ha ocurrido un error',
                        text:'Reintente enviando nuevamente',
                        showConfirmButton:true,
                        confirmButtonColor: '#1976d2',
                      })
                    .then((result) =>{
                        if(result.isConfirmed)
                        {
                            pages("admin_VI/creditApplication");
                        }
                        else if(result.dismiss === Swal.DismissReason.backdrop)
                        {
                            pages("admin_VI/creditApplication");
                        }
                    })
                  }
              })
          }
          else if(result.dismiss === Swal.DismissReason.backdrop)
          {
            document.getElementById(`btnrevisado${id}`).disabled=false;
          }
        })
}
function continuar(id)
{
  document.getElementById(`btncontinuar${id}`).disabled=true;
  Swal.fire({
    title: 'Escoja una acción',
    icon: 'info',
    showCancelButton: true,
    confirmButtonColor: '#1976d2',
    cancelButtonColor: '#d32f2f',
    confirmButtonText: 'Activar',
    cancelButtonText: 'Cancelar'
  }).then((result) =>{
      if(result.isConfirmed)
      {
        data=new FormData(document.getElementById(`solicitud${id}`));
        data.append("socr_id",id);
        fetch("credit_CO/activeCredit",{
          method:'POST',
          body: data
        }).then(res=>res.json())
        .then(res=>{
          if(res.estado=="EXITO")
          {
            alert(res.credit_id)
            Swal.fire({
              icon:'success',
              title: 'Crédito activado',
              text:'El crédito ha sido cambiado a (ACTIVADO)',
              showConfirmButton:true,
              confirmButtonColor: '#1976d2',
            })
          .then((result) =>{
              if(result.isConfirmed)
              {
                  
                  pages("admin_VI/creditApprove");
              }
              else if(result.dismiss === Swal.DismissReason.backdrop)
              {
                  
                  pages("admin_VI/creditApprove");
              }
          })
          }
          else if(res.estado=="ERROR")
          {
            Swal.fire({
              icon:'success',
              title: 'Ha ocurrido un error',
              text:'Reintente enviando nuevamente',
              showConfirmButton:true,
              confirmButtonColor: '#1976d2',
            })
          .then((result) =>{
              if(result.isConfirmed)
              {
                  pages("admin_VI/creditApprove");
              }
              else if(result.dismiss === Swal.DismissReason.backdrop)
              {
                  pages("admin_VI/creditApprove");
              }
          })
          }
        })
        
      }
      else if(result.dismiss === Swal.DismissReason.cancel)
      {
        data=new FormData();
        data.append("socr_id",id);
        fetch("credit_CO/cancelCredit",{
          method:'POST',
          body: data
        }).then(res=>res.json())
        .then(res=>{
          if(res.estado=="EXITO")
          {
            Swal.fire({
              icon:'success',
              title: 'Crédito cancelado',
              text:'El crédito ha sido cambiado a (CANCELADO)',
              showConfirmButton:true,
              confirmButtonColor: '#1976d2',
            })
          .then((result) =>{
              if(result.isConfirmed)
              {
                  pages("admin_VI/creditApprove");
              }
              else if(result.dismiss === Swal.DismissReason.backdrop)
              {
                  pages("admin_VI/creditApprove");
              }
          })
          }
          else if(res.estado=="ERROR")
          {
            Swal.fire({
              icon:'success',
              title: 'Ha ocurrido un error',
              text:'Reintente enviando nuevamente',
              showConfirmButton:true,
              confirmButtonColor: '#1976d2',
            })
          .then((result) =>{
              if(result.isConfirmed)
              {
                  pages("admin_VI/creditApprove");
              }
              else if(result.dismiss === Swal.DismissReason.backdrop)
              {
                  pages("admin_VI/creditApprove");
              }
          })
          }
        })
      }
      else if(result.dismiss === Swal.DismissReason.backdrop)
      {
        document.getElementById(`btncontinuar${id}`).disabled=false;
      }
  })
}
function activedCreditReport(id)
{
  data=new FormData(document.getElementById(`solicitud${id}`));
  data.append("socr_id",id);
  fetch("credit_CO/activeCreditReport",{
    method:'POST',
    body: data
  }).then(res=>res.json())
  .then(res=>{
    if(res.estado=="EXITO"){
      window.open("report/activated_credit_report.php");
    }
    else{
      Swal.fire({
        icon: 'error',
        title: 'Ha ocurrido un error',
        text: 'Intente nuevamente'
      })
    }
  })
}
$(document).ready(function(){
    $('select').formSelect();
  });
var fecha=new Date();
// if(fecha.getDate()>=20)
// {
//     if((fecha.getMonth()+1)==11)
//     {
//         document.getElementById("primer").innerHTML=`
//         <select id="primermes" name="primermes"class="validate" onchange="primerPago();" required disabled>
//             <option value="" selected disabled>Escoja un valor</option>
//             <option value="${fecha.getMonth()+2}">${ pmonth(fecha.getMonth()+2)} ${fecha.getFullYear()}</option>
//             <option value="1">${ pmonth(1)} ${fecha.getFullYear()+1}</option>
//         </select>
//         <label for="primermes">Primer mes de cobro:</label>`;
//     }
//     else if((fecha.getMonth()+1)==12)
//     {
//         document.getElementById("primer").innerHTML=`
//         <select id="primermes"  name="primermes"  class="validate" onchange="primerPago();" required disabled>
//             <option value="" selected disabled>Escoja un valor</option>
//             <option value="1">${ pmonth(1)} ${fecha.getFullYear()+1}</option>
//             <option value="2">${ pmonth(2)} ${fecha.getFullYear()+1}</option>
//         </select>
//         <label for="primermes">Primer mes de cobro:</label>`;
//     }
//     else
//     {
//     document.getElementById("primer").innerHTML=`
//     <select id="primermes"  name="primermes" class="validate" onchange="primerPago();" required disabled>
//         <option value="" selected disabled>Escoja un valor</option>
//         <option value="${fecha.getMonth()+2}">${ pmonth(fecha.getMonth()+2)} ${fecha.getFullYear()}</option>
//         <option value="${fecha.getMonth()+3}">${ pmonth(fecha.getMonth()+3)} ${fecha.getFullYear()}</option>
//     </select>
//     <label for="primermes">Primer mes de cobro:</label>`;
//     }
// }
function pmonth(m)
{
    switch (m) {
        case 1:
            m="Enero";
            break;
        case 2:
            m="Febrero";
            break;
        case 3:
            m="Marzo";
            break;
        case 4:
            m="Abril";
            break;
        case 5:
            m="mayo"
            break;
        case 6:
            m="Junio";
            break;
        case 7:
            m="Julio";
            break;
        case 8:
            m="Agosto";
            break;
        case 9:
            m="Septiembre";
            break;
        case 10:
            m="Octubre";
            break;
        case 11:
            m="Noviembre";
            break;
        case 12:
            m="Diciembre";
            break;
        default:
            break;
    }
    return m;
}
function validarNum(e) {
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
function month()
{
    var monto=document.getElementById("monto").value;
    if(monto>=100000 && monto<=500000){
        var months=document.getElementById("meses");
        var selctHtml=`
        <option value="" disabled selected>Elija la cantidad de meses</option>
        <option value="1">1 mes</option>
        <option value="2">2 meses</option>
        <option value="3">3 meses</option>
        <option value="4">4 meses</option>
        <option value="5">5 meses</option>
        <option value="6">6 meses</option>
        <option value="7">7 meses</option>
        <option value="8">8 meses</option>
        <option value="9">9 meses</option>
        <option value="10">10 meses</option>
        <option value="11">11 meses</option>
        <option value="12">12 meses</option>`;
        months.innerHTML=selctHtml;
        $(document).ready(function(){
            $('select').formSelect();
          });
        months.disabled=false;
    }
    // if(monto>=100000 && monto<200000)
    // {
    //     var months=document.getElementById("meses");
    //     var selctHtml=`
    //     <option value="" disabled selected>Elija la cantidad de meses</option>
    //     <option value="1">1 mes</option>`;
    //     months.innerHTML=selctHtml;
    //     $(document).ready(function(){
    //         $('select').formSelect();
    //       });
    //     months.disabled=false;
    // }
    // else if(monto>=200000 && monto<300000)
    // {
    //     var months=document.getElementById("meses");
    //     var selctHtml=`
    //     <option value="" disabled selected>Elija la cantidad de meses</option>
    //     <option value="1">1 mes</option>
    //     <option value="2">2 meses</option>`;
    //     months.innerHTML=selctHtml;
    //     $(document).ready(function(){
    //         $('select').formSelect();
    //       });
    //     months.disabled=false;
    // }
    // else if(monto>=300000 && monto<400000)
    // {
    //     var months=document.getElementById("meses");
    //     var selctHtml=`
    //     <option value="" disabled selected>Elija la cantidad de meses</option>
    //     <option value="1">1 mes</option>
    //     <option value="2">2 meses</option>
    //     <option value="3">3 meses</option>`;
    //     months.innerHTML=selctHtml;
    //     $(document).ready(function(){
    //         $('select').formSelect();
    //       });
    //     months.disabled=false;
    // }
    // else if(monto>=400000 && monto<=500000)
    // {
    //     var months=document.getElementById("meses");
    //     var selctHtml=`
    //     <option value="" disabled selected>Elija la cantidad de meses</option>
    //     <option value="1">1 mes</option>
    //     <option value="2">2 meses</option>
    //     <option value="3">3 meses</option>
    //     <option value="4">4 meses</option>
    //     <option value="5">5 meses</option>
    //     <option value="6">6 meses</option>`;
    //     months.innerHTML=selctHtml;
    //     $(document).ready(function(){
    //         $('select').formSelect();
    //       });
    //     months.disabled=false;
    // }
    else if(monto>500000)
    {
        var months=document.getElementById("meses");
        var selctHtml=`
        <option value="" disabled selected>Escriba un monto v&aacute;lido(100000-500000)</option>`;
        months.innerHTML=selctHtml;
        $(document).ready(function(){
            $('select').formSelect();
          });
        months.disabled=true;
        M.toast({html: 'El valor m&aacute;ximo del monto es $500000'});
        monto2=document.getElementById("monto");
        monto2.value="";
        var btn=document.getElementById("btnsolicitar");
        btn.disabled=true;
    }
    else
    {
        var months=document.getElementById("meses");
        var selctHtml=`
        <option value="" disabled selected>Escriba un monto v&aacute;lido(100000-500000)</option>`;
        months.innerHTML=selctHtml;
        $(document).ready(function(){
            $('select').formSelect();
          });
        months.disabled=true;
        M.toast({html: 'El valor m&iacute;nimo del monto es $100000'});
        monto2=document.getElementById("monto");
        monto2.value="";
        var btn=document.getElementById("btnsolicitar");
        btn.disabled=true;
    }
}
function valmonth()
{
    var monthselected=document.getElementById("meses").value;
    if(monthselected>=1 && monthselected<=12)
    {
        var dcCo=document.getElementById("dcCodeudor");
        dcCo.disabled=false;
    }
}
function nameCodeudor()
{
    document.getElementById("btnsolicitar").disabled=true;
    var dcCo=document.getElementById("dcCodeudor").value;
    var IdcCo=document.getElementById("dcCodeudor");
    var namelabel=document.getElementById("labelName");
    document.getElementById("Codeudor").value="";
    document.getElementById("uso").disabled=true;
    document.getElementById("uso").value="";
    document.getElementById("mensaje").innerHTML='';
    $(document).ready(function(){
        $('select').formSelect();
        });
    // if(fecha.getDate()>=20)
    // {
    //     document.getElementById("primermes").disabled=true;
    //     document.getElementById("primermes").value="";
    //     $(document).ready(function(){
    //         $('select').formSelect();
    //         });
    // }
    if(namelabel.classList.contains("active"))
    {
        namelabel.classList.remove("active");
    }
    if(IdcCo.classList.contains("validate"))
    {
        IdcCo.classList.remove("validate");
    }
    if(IdcCo.classList.contains("invalid"))
    {
        IdcCo.classList.remove("invalid");
    }
    if(IdcCo.classList.contains("valid"))
    {
        IdcCo.classList.remove("valid");
    }
    if(dcCo.length<8 || dcCo.length>10)
    {
        M.toast({html: 'El documento del Codeudor no es v&aacute;lido'});
        
        
        IdcCo.classList.add("validate");
        IdcCo.classList.add("invalid");
    }
    else
    {
        var docCo=new FormData();
        docCo.append("asociado",dcCo);
        fetch("person_CO/codebtor",
        {
            method: 'POST',
            body: docCo
        })
        .then(res => res.json())
        .then(res=>{
                if(res.estado=="EXITO")
                {
                    IdcCo.classList.add("validate");
                    IdcCo.classList.add("valid");
                    namelabel.classList.add("active");
                    document.getElementById("Codeudor").value=res.nombre;
                    
                    // if(fecha.getDate()>=20)
                    // {
                    //     document.getElementById("primermes").disabled=false;
                    //     $(document).ready(function(){
                    //         $('select').formSelect();
                    //       });
                    // }
                    // else 
                    // {
                        document.getElementById("uso").disabled=false;
                        $(document).ready(function(){
                            $('select').formSelect();
                          });
                    // }
                }
                else if(res.estado=="ERROR")
                {
                    M.toast({html: 'El documento del Codeudor no es v&aacute;lido'});
                    IdcCo.classList.add("validate");
                    IdcCo.classList.add("invalid");
                    
                }
                else if(res.estado=="DUPLICADO")
                {
                    M.toast({html: 'El Codeudor debe ser distinto de usted'});
                    IdcCo.classList.add("validate");
                    IdcCo.classList.add("invalid");
                }
                else if(res.estado=="ATRASADO")
                {
                    M.toast({html: '¡ERROR! El Codeudor no puede estar atrasado en los aportes'});
                    IdcCo.classList.add("validate");
                    IdcCo.classList.add("invalid");
                }
            })
    }
}
// function primerPago()
// {
//     if(fecha.getDate()>=20)
//     {
//         var val=document.getElementById("primermes").value;
//         if((val==1)||(val==2)||(val==3)||(val==4)||(val==5)||(val==6)||(val==7)||(val==8)||(val==9)||(val==10)||(val==11)||(val==12))
//         {
//             document.getElementById("uso").disabled=false;
//             $(document).ready(function(){
//                 $('select').formSelect();
//                 });
//         }
//         else
//         {
//         M.toast({html:"Debe elegir el primer mes de pago"});
//         }
//     }
//     else
//     {
//         document.getElementById("primer").innerHTML="";
//     }
    
// }
function usoDinero()
{
    var uso=document.getElementById("uso").value;
    if(uso=="")
    {
        document.getElementById("btnsolicitar").disabled=true;
        var caso=``;
        document.getElementById("mensaje").innerHTML=caso;
    }
    else if(uso=="libre")
    {
        document.getElementById("btnsolicitar").disabled=false;
        var caso=``;
        document.getElementById("mensaje").innerHTML=caso;
    }
    else if(uso=="urgencia")
    {
        document.getElementById("btnsolicitar").disabled=true;
        Swal.fire({
            icon:'info',
            title: 'Crédito de urgencia',
            text:'El crédito de urgencia se puede solicitar para CASOS DE URGENCIA en salud, trabajo o educación, será tratado en tiempo menor al de libre inversión; sin embargo, el interés se mantiene igual. A continuación deberá explicar su caso en el cuadro de texto.',
            showConfirmButton:true,
            confirmButtonColor: '#1976d2',
            confirmButtonText: 'Aceptar',
            backdrop:'false',
            allowOutsideClick: false
          }).then((result)=>{
              if(result.isConfirmed)
              {
                var caso=`
        
                <textarea  id="mensajecaso" name="mensajecaso" class="materialize-textarea validate" placeholder="Explique aqu&iacute; su caso" data-length="250" minlength="5" maxlength="250" onchange="mensaje()" required></textarea>
                <label for="mensajecaso" class="active">Mensaje:</label>
              `
              document.getElementById("mensaje").innerHTML=caso;
              $(document).ready(function() {
                  $('textarea#mensajecaso').characterCounter();
                });
              }
              document.getElementById("mensajecaso").focus();
          })
        
    }
}
function mensaje()
{
    if(document.getElementById("uso").value=="urgencia")
    {
        var men=document.getElementById("mensajecaso").value;
        if(men.length>=5 && men.length<=250)
        {
            document.getElementById("btnsolicitar").disabled=false;
        }
        else
        {
            document.getElementById("btnsolicitar").disabled=true;
            M.toast({html:"El mensaje no es v&aacute;lido"});
        }
    }
    else
    {
        document.getElementById("mensaje").innerHTML="";
    }
}
function solicitar()
{
    document.getElementById("btnsolicitar").disabled=true;
    var monto=document.getElementById("monto").value;
    if(monto>=100000 && monto<=500000)
    {
        var meses=document.getElementById("meses").value;
        if(meses>=1 && meses<=12)
        {
            var documento=document.getElementById("dcCodeudor").value;
            if(documento!="" && (document.getElementById("dcCodeudor").classList.contains("validate")) && (document.getElementById("dcCodeudor").classList.contains("valid")) )
            {
                if(document.getElementById("Codeudor").value!="")
                {
                    if(document.getElementById("uso").value=="libre")
                    {
                        // if(fecha.getDate()>=20)
                        // {
                        //     var val=document.getElementById("primermes").value;
    
                        //     if((val==1)||(val==2)||(val==3)||(val==4)||(val==5)||(val==6)||(val==7)||(val==8)||(val==9)||(val==10)||(val==11)||(val==12))
                        //     {
                        //         Swal.fire({
                        //             title: '¿Está seguro?',
                        //             text: "Revise todos los campos antes de enviar la solicitud, recuerde que una vez enviado no podrá corregir ningún valor",
                        //             icon: 'warning',
                        //             showCancelButton: true,
                        //             confirmButtonColor: '#1976d2',
                        //             cancelButtonColor: '#d32f2f',
                        //             confirmButtonText: 'Enviar solicitud',
                        //             cancelButtonText: 'Cancelar'
                        //           }).then((result) =>{
                        //               if(result.isConfirmed)
                        //               {
                        //                   var data=new FormData(document.getElementById("formSolicitar"));
                        //                   fetch("credit_CO/apply",
                        //                   {
                        //                       method:'POST',
                        //                       body: data
                        //                   })
                        //                   .then(res => res.json())
                        //                   .then(res=>
                        //                     {
                        //                         if(res.estado=="EXITO")
                        //                         {
                        //                             Swal.fire({
                        //                                 icon:'success',
                        //                                 title: 'Solicitud enviada',
                        //                                 text:'La solicitud de crédito ha sido enviada con éxito, espere una respuesta de la junta en los próximos días',
                        //                                 showConfirmButton:true,
                        //                                 confirmButtonColor: '#1976d2',
                        //                               })
                        //                             .then((result) =>{
                        //                                 if(result.isConfirmed)
                        //                                 {
                        //                                     pages("account_VI/creditApply");
                        //                                 }
                        //                                 else if(result.dismiss === Swal.DismissReason.backdrop)
                        //                                 {
                        //                                     pages("account_VI/creditApply");
                        //                                 }
                        //                             })
                        //                         }
                        //                         else if(res.estado=="ERROR")
                        //                         {
                        //                             Swal.fire({
                        //                                 icon:'error',
                        //                                 title: 'Ha ocurrido un error',
                        //                                 text:'Revise los datos de la solicitud y vuelva a intentar, si el problema persiste contacte con la administración',
                        //                                 showConfirmButton:true,
                        //                               })
                        //                             document.getElementById("btnsolicitar").disabled=false;
                        //                         }
                        //                     })
                        //               }
                        //               else if (result.dismiss === Swal.DismissReason.cancel) 
                        //               {
                        //                 document.getElementById("btnsolicitar").disabled=false;
                        //               }
                        //               else if(result.dismiss === Swal.DismissReason.backdrop)
                        //               {
                        //                 document.getElementById("btnsolicitar").disabled=false;
                        //               }
                        //           })
                                
                        //     }
                        //     else
                        //     {
                        //         M.toast({html:"Debe elegir el primer mes de pago"});
                        //         document.getElementById("btnsolicitar").disabled=true;
                        //     }
                        // }
                        // else
                        // {
                            Swal.fire({
                                title: '¿Está seguro?',
                                text: "Revise todos los campos antes de enviar la solicitud, recuerde que una vez enviado no podrá corregir ningún valor",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#1976d2',
                                cancelButtonColor: '#d32f2f',
                                confirmButtonText: 'Enviar solicitud',
                                cancelButtonText: 'Cancelar'
                              }).then((result) =>{
                                  if(result.isConfirmed)
                                  {
                                      var data=new FormData(document.getElementById("formSolicitar"));
                                      fetch("credit_CO/apply",
                                      {
                                          method:'POST',
                                          body: data
                                      })
                                      .then(res => res.json())
                                      .then(res=>
                                        {
                                            if(res.estado=="EXITO")
                                            {
                                                Swal.fire({
                                                    icon:'success',
                                                    title: 'Solicitud enviada',
                                                    text:'La solicitud de crédito ha sido enviada con éxito, espere una respuesta de la junta en los próximos días',
                                                    showConfirmButton:true,
                                                  })
                                                .then((result) =>{
                                                    if(result.isConfirmed)
                                                    {
                                                        pages("account_VI/creditApply");
                                                    }
                                                    else if(result.dismiss === Swal.DismissReason.backdrop)
                                                    {
                                                        pages("account_VI/creditApply");
                                                    }
                                                })
                                            }
                                            else if(res.estado=="ERROR")
                                            {
                                                Swal.fire({
                                                    icon:'error',
                                                    title: 'Ha ocurrido un error',
                                                    text:'Revise los datos de la solicitud y vuelva a intentar, si el problema persiste contacte con la administración',
                                                    showConfirmButton:true,
                                                  })
                                                document.getElementById("btnsolicitar").disabled=false;
                                            }
                                        })
                                  }
                                  else if (result.dismiss === Swal.DismissReason.cancel) 
                                  {
                                    document.getElementById("btnsolicitar").disabled=false;
                                  }
                                  else if(result.dismiss === Swal.DismissReason.backdrop)
                                  {
                                    document.getElementById("btnsolicitar").disabled=false;
                                  }
                              })
                        // }
                    }
                    else if(document.getElementById("uso").value=="urgencia")
                    {
                        var men=document.getElementById("mensajecaso").value;
                        if(men.length>=5 && men.length<=250)
                        {
                            // if(fecha.getDate()>=20)
                            // {
                            //     var val=document.getElementById("primermes").value;
        
                            //     if((val==1)||(val==2)||(val==3)||(val==4)||(val==5)||(val==6)||(val==7)||(val==8)||(val==9)||(val==10)||(val==11)||(val==12))
                            //     {
                            //         Swal.fire({
                            //             title: '¿Está seguro?',
                            //             text: "Revise todos los campos antes de enviar la solicitud, recuerde que una vez enviado no podrá corregir ningún valor",
                            //             icon: 'warning',
                            //             showCancelButton: true,
                            //             confirmButtonColor: '#1976d2',
                            //             cancelButtonColor: '#d32f2f',
                            //             confirmButtonText: 'Enviar solicitud',
                            //             cancelButtonText: 'Cancelar'
                            //         }).then((result) =>{
                            //             if(result.isConfirmed)
                            //             {
                            //                 var data=new FormData(document.getElementById("formSolicitar"));
                            //                 fetch("credit_CO/apply",
                            //                 {
                            //                     method:'POST',
                            //                     body: data
                            //                 })
                            //                 .then(res => res.json())
                            //                 .then(res=>
                            //                     {
                            //                         if(res.estado=="EXITO")
                            //                         {
                            //                             Swal.fire({
                            //                                 icon:'success',
                            //                                 title: 'Solicitud enviada',
                            //                                 text:'La solicitud de crédito ha sido enviada con éxito, espere una respuesta de la junta en los próximos días',
                            //                                 showConfirmButton:true,
                            //                                 confirmButtonColor: '#1976d2',
                            //                             })
                            //                             .then((result) =>{
                            //                                 if(result.isConfirmed)
                            //                                 {
                            //                                     pages("account_VI/creditApply");
                            //                                 }
                            //                                 else if(result.dismiss === Swal.DismissReason.backdrop)
                            //                                 {
                            //                                     pages("account_VI/creditApply");
                            //                                 }
                            //                             })
                            //                         }
                            //                         else if(res.estado=="ERROR")
                            //                         {
                            //                             Swal.fire({
                            //                                 icon:'error',
                            //                                 title: 'Ha ocurrido un error',
                            //                                 text:'Revise los datos de la solicitud y vuelva a intentar, si el problema persiste contacte con la administración',
                            //                                 showConfirmButton:true,
                            //                             })
                            //                             document.getElementById("btnsolicitar").disabled=false;
                            //                         }
                            //                     })
                            //             }
                            //             else if (result.dismiss === Swal.DismissReason.cancel) 
                            //             {
                            //                 document.getElementById("btnsolicitar").disabled=false;
                            //             }
                            //             else if(result.dismiss === Swal.DismissReason.backdrop)
                            //             {
                            //                 document.getElementById("btnsolicitar").disabled=false;
                            //             }
                            //         })
                                    
                            //     }
                            //     else
                            //     {
                            //         M.toast({html:"Debe elegir el primer mes de pago"});
                            //         document.getElementById("btnsolicitar").disabled=true;
                            //     }
                            // }
                            // else
                            // {
                                Swal.fire({
                                    title: '¿Está seguro?',
                                    text: "Revise todos los campos antes de enviar la solicitud, recuerde que una vez enviado no podrá corregir ningún valor",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#1976d2',
                                    cancelButtonColor: '#d32f2f',
                                    confirmButtonText: 'Enviar solicitud',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) =>{
                                    if(result.isConfirmed)
                                    {
                                        var data=new FormData(document.getElementById("formSolicitar"));
                                        fetch("credit_CO/apply",
                                        {
                                            method:'POST',
                                            body: data
                                        })
                                        .then(res => res.json())
                                        .then(res=>
                                            {
                                                if(res.estado=="EXITO")
                                                {
                                                    Swal.fire({
                                                        icon:'success',
                                                        title: 'Solicitud enviada',
                                                        text:'La solicitud de crédito ha sido enviada con éxito, espere una respuesta de la junta en los próximos días',
                                                        showConfirmButton:true,
                                                    })
                                                    .then((result) =>{
                                                        if(result.isConfirmed)
                                                        {
                                                            pages("account_VI/creditApply");
                                                        }
                                                        else if(result.dismiss === Swal.DismissReason.backdrop)
                                                        {
                                                            pages("account_VI/creditApply");
                                                        }
                                                    })
                                                }
                                                else if(res.estado=="ERROR")
                                                {
                                                    Swal.fire({
                                                        icon:'error',
                                                        title: 'Ha ocurrido un error',
                                                        text:'Revise los datos de la solicitud y vuelva a intentar, si el problema persiste contacte con la administración',
                                                        showConfirmButton:true,
                                                    })
                                                    document.getElementById("btnsolicitar").disabled=false;
                                                }
                                            })
                                    }
                                    else if (result.dismiss === Swal.DismissReason.cancel) 
                                    {
                                        document.getElementById("btnsolicitar").disabled=false;
                                    }
                                    else if(result.dismiss === Swal.DismissReason.backdrop)
                                    {
                                        document.getElementById("btnsolicitar").disabled=false;
                                    }
                                })
                            // }
                        }
                        else
                        {
                            document.getElementById("btnsolicitar").disabled=true;
                            M.toast({html:"El mensaje no es v&aacute;lido"});
                        }
                    }
                    else
                    {
                        M.toast({html:'Elija el uso del cr&eacute;dito'});
                        document.getElementById("btnsolicitar").disabled=true;
                        document.getElementById("mensaje").innerHTML="";
                    }
                   
                }
                else
                {
                    M.toast({html: 'El documento del Codeudor no es v&aacute;lido'});
                    document.getElementById("btnsolicitar").disabled=true;
                }
            }
            else
            {
                M.toast({html: 'El documento del Codeudor no es v&aacute;lido'});
                document.getElementById("btnsolicitar").disabled=true;
            }
        }
        else
        {
            M.toast({html: 'Elija la cantidad de meses'});
            document.getElementById("btnsolicitar").disabled=true;
        }
    }
    else if(monto<100000)
    {
        M.toast({html: 'El valor m&iacute;nimo del monto es $100000'});
        pages('account_VI/creditApply');
    }
    else
    {
        M.toast({html: 'El valor m&aacute;ximo del monto es $500000'});
        pages('account_VI/creditApply');
    }
}

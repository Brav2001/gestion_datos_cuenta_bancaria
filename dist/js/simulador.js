$(document).ready(function(){
    $('select').formSelect();
  });

function validarMonto(e) {
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
        var btn=document.getElementById("btnsimular");
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
        var btn=document.getElementById("btnsimular");
        btn.disabled=true;
    }
}
function valmonth()
{
    var monthselected=document.getElementById("meses").value;
    if(monthselected>=1 && monthselected<=12)
    {
        var btn1=document.getElementById("btnsimular");
        btn1.disabled=false;
    }
}
function simular() 
{
    var monto=document.getElementById("monto").value;
    var meses=document.getElementById("meses").value;
    if(monto<100000)
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
        var btn=document.getElementById("btnsimular");
        btn.disabled=true;
    }
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
        var btn=document.getElementById("btnsimular");
        btn.disabled=true;
    }
    else if(meses<1 || meses>12)
    {
        M.toast({html: 'Elija la cantidad de meses'});
        var btn=document.getElementById("btnsimular");
        btn.disabled=true;
    }
    else
    {
        var tabla=document.getElementById("card-table");
        var ti=0;
        var tc=0;
        var int=0.02
        var cuota1=Math.round((int*monto)/(1-Math.pow((1+int),(-(meses)))));
        var tablatext=`
        
        <div class=" card-panel brtc1">
            <div class="row">
            <div id="resultados"></div>
            <div class="col s12">
                <table class="responsive-table">
                    <thead >
                        <tr>
                            <th>#Pago</th>
                            <th>Deuda inicial</th>
                            <th>interes</th>
                            <th>Pago capital</th>
                            <th>Cuota</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>

                    <tbody>
        `;
        for(var i=0;i<meses;i++)
        {
            var cuota=Math.round((int*monto)/(1-Math.pow((1+int),(-(meses-i)))));
            //if((i+1)<meses)
            //{
                
                //while((cuota % 1000) != 0)
                //{
                   // cuota=cuota+1;
                //}
            //}
            var periodo=i+1;
            var interes=Math.round(monto*int);
            var deuda=monto;
            var capital=cuota-interes;
            var monto=monto-capital;
            ti=ti+interes;
            tc=tc+capital;
            tablatext=tablatext+`<tr>
                <td>${periodo}</td>
                <td>$ ${deuda}</td>
                <td>$ ${interes}</td>
                <td>$ ${capital}</td>
                <td>$ ${cuota}</td>
                <td>$ ${monto}</td>
                </tr>`

        }
        tablatext=tablatext+`</tbody>
        </table>
        </div>
        </div>
        </div>`
        tabla.innerHTML=tablatext;
        var resultados=document.getElementById("resultados");
        resultados.innerHTML=`<div class="col s6 m6">
            <label for="capitalPagado">Interes total:</label>
            <h4 id="capitalPagado" class="dataCredit">$ ${ti}</h4>
        </div>
        <div class="col s6 m6">
            <label for="capitalPagado">Capital total:</label>
            <h4 id="capitalPagado" class="dataCredit">$${tc}</h4>
        </div>
        <div class="col s6 m6">
            <label for="capitalPagado">Deuda total:</label>
            <h4 id="capitalPagado" class="dataCredit">$${tc+ti}</h4>
        </div>
        <div class="col s6 m6">
            <label for="capitalPagado">Cuota: </label>
            <h4 id="capitalPagado" class="dataCredit">$${cuota1}</h4>
        </div>
        
        `;
        
    }
}
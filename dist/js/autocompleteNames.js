 names = [];
 nombres='{';
 id = [];

function init() {
    fetch('person_CO/consultNames')
    .then(response => response.json())
    .then(data => {
            names = data;
            //console.log(names);
            // "Apple": null,
            // "Microsoft": null,
            // "Google": 'https://placehold.it/250x250'
            names.forEach(element =>{
                nombres=nombres+`"${element}":${null},`;
            });
            nombres=nombres.substr(0, nombres.length - 1)+'}';
            //console.log(nombres);
            nombres=JSON.parse(nombres);
            //console.log(nombres);
            let options = {
                data:nombres,
            };
            
             elems = document.querySelectorAll('.autocomplete');
            ;
            //console.log(options);
            instances = M.Autocomplete.init(elems, options);
    });
    fetch('person_CO/consultId')
    .then(response => response.json())
    .then(data => {
        id = data;
        //console.log(id);
        //alert('DOM fully loaded and parsed');
        
    });   
}

function buscarId(){
    input=document.getElementById('names').value;
    input=input.replace('á', '&aacute;');
    input=input.replace('é', '&eacute;');
    input=input.replace('í', '&iacute;');
    input=input.replace('ó', '&oacute;');
    input=input.replace('ú', '&nacute;');
    input=input.replace('ñ', '&ntilde;');
    indice = names.indexOf(input);
    return id[indice];
}


init();
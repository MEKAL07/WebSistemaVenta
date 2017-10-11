

 function soloLetras(e) { 
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; 
    patron =/[A-Za-zñÑ\s]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}

/*solo solonumeros*/
function solonumeros(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; 
    patron =/[\d]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}


/*validacion de nombreProducto */
function nombreProducto(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron =/[\w]/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
}
/*validadciond e email*/



function validar_email( email ) 
{
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function buscarCliente()
{
    var tableReg = document.getElementById('datosCliente');
    var searchText = document.getElementById('txtCLiente').value.toLowerCase();
    var cellsOfRow="";
    var found=false;
    var compareWith="";
 
    // Recorremos todas las filas con contenido de la tabla
    for (var i = 1; i < tableReg.rows.length; i++)
    {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
            {
                found = true;
            }
        }
        if(found)
        {
            tableReg.rows[i].style.display = '';
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = 'none';
        }
    }
}



/*busqueda de prodcutos*/
function buscarProducto()
{
    var tableReg1 = document.getElementById('datosProducto');
    var searchText = document.getElementById('txtProducto').value.toLowerCase();
    var cellsOfRow="";
    var found=false;
    var compareWith="";
 
    // Recorremos todas las filas con contenido de la tabla
    for (var i = 1; i < tableReg1.rows.length; i++)
    {
        cellsOfRow = tableReg1.rows[i].getElementsByTagName('td');
        found = false;
        // Recorremos todas las celdas
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            // Buscamos el texto en el contenido de la celda
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
            {
                found = true;
            }
        }
        if(found)
        {
            tableReg1.rows[i].style.display = '';
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg1.rows[i].style.display = 'none';
        }
    }
}

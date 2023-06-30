//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
    $('#obras_form').on('submit', (e)=>{
        guardayeditarObras(e);
    })
  }
  
  $().ready(() => {
  cargaTablaObras();
  });
  var cargaTablaObras = () => {
  var html = "";
  $.post(
    "../../controllers/obras.controller.php?op=todos",{},
    (listaobras) => {
      listaobras = JSON.parse(listaobras);
      $.each(listaobras, (index, obras) => {
        html +=
          `<tr>` +
          `<td>${index + 1}</td>` +
          `<td>${obras.Nombres}</td>` +
          `<td>` +
          `<button class='btn btn-success'>Editar</button>` +
          `<button class='btn btn-danger'>Eliminar</button>` +
          `</td>` +
          `</tr>`;
      });
      $("#TablaObras").html(html);
    }
  );
  };
  var cargaSelectRoles = () => {
    var html = ' <option value="0">Seleccione una Opcion</option>';
    $.post("../../controllers/roles.controller.php?op=todos", (listaroles) => {
      listaroles = JSON.parse(listaroles);
      $.each(listaroles, (index, rol) => {
        html += `<option value="${rol.idRoles}">${rol.Detalle}</option>`;
      });
      $("#idRoles").html(html);
    });
    };
  var guardayeditarObras = (e) => {
    e.preventDefault();
  var url = "";
  var form_Data = new FormData($("#obras_form")[0]);
  var idUsaurio = document.getElementById("ID_Obra").value;
  if (ID_Obra === undefined || ID_Obra === "") {
    url = "../../controllers/obras.controller.php?op=insertar";
  } else {
    url = "../../controllers/obras.controller.php?op=actualizar";
  }
  for (var pair of form_Data.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
  }
  
  $.ajax({
    url: url,
    type: "POST",
    data: form_Data,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
       console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        alert("Se guardo con exito");
        limpiar();
        cargaTablaObras();
      } else {
        alert("Ocurrio un error al guardar. " + respuesta);
      }
    },
  });
  };
  var limpiar = () => {
  
    document.getElementById('ID_Obra').value = '';
  
    document.getElementById('Nombres').value = '';
    $('#ID_Artista').val('0');
  
    $('#modalObras').modal('hide');
    
  };
  
  
  
  
  
  init();
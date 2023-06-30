//TODO: Archivo de javascript para agregar la funcionalidad a la apgina usuarios.html
function init(){
  $('#usuarios_form').on('submit', (e)=>{
      guardayeditarUsuarios(e);
  })
}

$().ready(() => {
cargaTablaUsuarios();
});
var cargaTablaUsuarios = () => {
var html = "";
$.post(
  "../../controllers/usuario.controller.php?op=todos",{},
  (listausuarios) => {
    listausuarios = JSON.parse(listausuarios);
    $.each(listausuarios, (index, usuario) => {
      html +=
        `<tr>` +
        `<td>${index + 1}</td>` +
        `<td>${usuario.Nombres}</td>` +
        `<td>${usuario.Apellidos}</td>` +
        `<td>${usuario.correo}</td>` +
        `<td>${usuario.Detalle}</td>` +
        `<td>` +
        `<button class='btn btn-success'>Editar</button>` +
        `<button class='btn btn-danger'>Eliminar</button>` +
        `</td>` +
        `</tr>`;
    });
    $("#TablaUsuarios").html(html);
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

var guardayeditarUsuarios = (e) => {
  e.preventDefault();
  var url = "";
  var form_Data = new FormData($("#Usuarios_form")[0]);
  var idUsaurio= document.getElementById("idUsaurio").value;
  if (idUsaurio === undefined || idUsaurio === "") {
  url = "../../controllers/usuario.controller.php?op=insertar";
  } else {
  url = "../../controllers/usuario.controller.php?op=actualizar";
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
    respuesta = JSON.parse(respuesta);
    console.log(respuesta);
    if (respuesta == "ok") {
      Swal.fire('Categoria de Usuarios', 'Se guardo con exito','success');
      limpiar();
      cargaTablaUsuarios();
    } else {
      Swal.fire('Categoria de Usuarios', 'Ocurrio un error','danger');
    }
  },
  });
  };
  var uno = (idUsaurio) => {
    $.post('../../controllers/empleados.controller.php?op=uno', {
      idUsaurio : idUsaurio 
    }, (res) => {
        res = JSON.parse(res);
        $('#em_id').val(res.idUsaurio );
        $('#em_nombre').val(res.Nombres);
        $('#em_apellido').val(res.Apellidos);
        $('#em_correo').val(res.correo);
        $('#em_contrasena').val(res.contrasenia);
        $('#rol_id').val(res.idRoles);
    })
    document.getElementById('TituloModalUsuario').innerHTML = "Editar Usuario";
    $('#modalUsuarios').modal('show');
    };
    

var limpiar = () => {

  document.getElementById('idUsaurio').value = '';

  document.getElementById('Nombres').value = '';
  $('#Apellidos').val('');
  $('#correo').val('');
  $('#contrasenia').val('');
  $('#idRoles').val('0');

  $('#modalUsuarios').modal('hide');
  
};





init();
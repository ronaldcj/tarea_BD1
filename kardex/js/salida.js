 var cont=0;
 var datos = [];
 var con=0;
 var aux = ""; 
 //agregar las filas del boton agregar
  function agregar(){
    cont++;
    var id_item = document.getElementById("id_item").value;
    var cod = document.getElementById("codigo").value;
    var des = document.getElementById("descripcion").value;
    var cant = document.getElementById("cantidad").value;
    var vu = document.getElementById("vu_pp").value;
    var unidad = document.getElementById("unidad").value;
    var importe = vu * cant;

    var fila = '<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="id_item[]" readonly value="'+id_item+'"><input type="text" name="codigo[]" readonly value="'+cod+'"></td><td><input type="text" name="descripcion[]" readonly value="'+des+'"></td><td><input type="text" name="unidad[]" readonly value="'+unidad+'"></td><td><input type="text" name="cantidad[]" readonly value="'+cant+'"></td><td><input type="text" name="importe[]" readonly value="'+importe+'"><input type="hidden" name="vu[]" readonly value="'+vu+'"></td><td><a href="#" onclick="funcionElimnarFila('+cont+')" class="eliminar"><i class="fas fa-trash fa-2x" style="color: red;"></a></td></tr>';
    $('#table1 tbody').append(fila);
  }

function funcionElimnarFila(num){
   
    $('#fila'+num).remove();
  }
 $(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'php/cargar_items.php'
  })
  .done(function(listas_rep){
    $('#sel_item').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar las listas_rep')
  })
  
////////////////////////////////////////////////////////////
//eventos de textbox cuando cuambia el selector 
  $('#sel_item').on('change', function(){
    var id = $('#sel_item').val()
    var soli = $('#nom_solicitante').val()
    $('#solicitante').val(soli)

   $.ajax({
      type: 'POST',
      url: 'php/cargar_info_item.php',
      data: {'id': id},
      dataType: 'json'
    })
    .done(function(listas_rep){
      //traer los datos del item anteriormete seleccionado 
      $('#id_item').val(listas_rep[0])
      $('#codigo').val(listas_rep[1])
      $('#descripcion').val(listas_rep[2])
      $('#unidad').val(listas_rep[3])
      $('#cantidad').val(null)
      $('#vu_pp').val(listas_rep[4])

      
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })
  })
//al pretar el boton agregar
  $('#bt_add').click(function(){
    var cantidad = $("#cantidad").val();
    var codigo = $("#codigo").val();
    var solicitante = $("#nom_solicitante").val();
    var e_valor_unitario = $("#e_valor_unitario").val();

    if (codigo == "") {
      alert("Selecciona un Item del la caja de seleccion...")
      return false;
    }else{
      if (cantidad == "") {
        alert("ingresa La CANTIDAD del item en numeros...")
        return false;
      }else{
        if (e_valor_unitario == "") {
          alert("ingresa el VALOR UNITARIO del item en numeros...")
          return false;
        }else{
          if (solicitante == "") {
          alert("ingresa el nombre del SOLICITANTE...")
          return false;
          }
        }
      }      
    }

      agregar();

    });

  

})

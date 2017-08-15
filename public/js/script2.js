$(document).ready(function(){
	Carga();
});

	function Carga(){
		var tablaDatos = $("#datos");
		var route = "/generos";
		var edit1 = '<button data-toggle="modal" data-target="#myModal"﻿ value="';
		var edit2 = '" OnClick="Mostrar(this)" class="btn btn-primary">Editar</button> ';
		var eli1 = '<button value="';
		var eli2 = '" OnClick="Eliminar(this)" class="btn btn-danger">Eliminar</button>';
		
		$("#datos").empty();
		$.get(route, function(res){
			$(res).each(function(key,value){
				tablaDatos.append("<tr><td>"+value.genre+"</td><td>"+edit1+value.id+edit2+eli1+value.id+eli2+"</td></tr>");
			});
		});
	}

	function Mostrar(btn){
		var route = "/genero/"+btn.value+"/edit";

		$.get(route,function(res){
			$("#genre").val(res.genre);
			$("#id").val(res.id);
		});
	}

	function Eliminar(btn){
		if (confirm('Está seguro de eliminar el registro? ')) {
			var route = "/genero/"+btn.value;
			var token = $("#token").val();
			$.ajax({
				url: route,
				headers: {'X-CSRF-TOKEN': token},
				type: 'DELETE',
				dataType: 'json',
				success: function(){
					Carga();
					$("#msj-success").fadeIn();
					
				}
			});
		}
	}

	$("#actualizar").click(function(){
		var value = $("#id").val();
		var dato = $("#genre").val();
		var route = "/genero/"+value;
		var token = $("#token").val();

		$.ajax({
			url: route,
			headers: {'X-CSRF-TOKEN': token},
			type: 'PUT',
			dataType: 'json',
			data: {genre: dato},
			success: function(){
				$("#myModal").modal('hide');
				$("#msj-success").fadeIn();
				Carga();
			}
		});
	});

	

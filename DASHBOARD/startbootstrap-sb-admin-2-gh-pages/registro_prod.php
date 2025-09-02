<?php 
session_start();
require "conexionDB.php";

    if ($_REQUEST["dato"] == 'insertar') {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $password = "";
        for($i=0;$i<5;$i++) {
        $password .= substr($str,rand(0,64),1);
        }
        $ref = $password;

        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $query = "INSERT INTO productos (titulo,ref,precio,img)
        VALUES ('$titulo', '$ref', '$precio', '$ref')";
        $result = mysqli_query($conexion,$query);


        if ( $_FILES["file"]["name"][0] == ''){   
          // fallo
        }else{
        //subimos imagen A
        $_FILES["file"]["name"][0] =  $_FILES["file"]["name"][0];
            # definimos la carpeta destino
            $carpetaDestino="articulos/";
            # si hay algun file que subir
            if($_FILES["file"]["name"][0])
            {
                # recorremos todos los arhivos que se han subido
                for($i=0;$i<count($_FILES["file"]["name"]);$i++)
                {
                    # si es un formato de imagen
        if($_FILES["file"]["type"][$i]=="image/jpeg" || $_FILES["file"]["type"][$i]=="image/pjpeg" || $_FILES["file"]["type"][$i]=="image/gif" || $_FILES["file"]["type"][$i]=="image/png")
                    {
                        # si exsite la carpeta o se ha creado
                        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                        {
                            $origen=$_FILES["file"]["tmp_name"][$i];
                            $destino=$carpetaDestino.$_FILES["file"]["name"][$i];
                            # movemos el file
                            if(@move_uploaded_file($origen, $destino))
                            {
                                echo "<p>El file ".$_FILES["file"]["name"][$i]." Se ha enviado correctamente</p>";
                            $img = $_FILES["file"]["name"][$i];
                            }else{
                                echo "<p>No se ha podido mover el file: ".$_FILES["file"]["name"][$i]."</p>";
                            }
                        }else{
                            echo "<p>No se ha podido crear la carpeta: up/".$user."</p>";
                        }
                    }else{
                        echo "<br>".$_FILES["file"]["name"][$i]." - NO es imagen jpg";
                    }
                }
            }else{
                echo "<p>No se ha subido ninguna imagen</p>";
            }
                                    //acortamos el nombre
                                    // function random_password()  
                                    // {  
                                    // $longitud = 8; // longitud del password  
                                    // $pass = substr(md5(rand()),0,$longitud);  
                                    // return($pass); // devuelve el password   
                                    // }  
                                  // rename("articulos/".$img."" , "articulos/".random_password().".jpg");
                                rename("articulos/".$img."" , "articulos/".$ref.".jpg");
                                header("Location: productos.php"); 
        } 
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<!-- ESTILO CURSOS DE PROGRAMACION -->
<link rel="stylesheet" href="../css/style_cp.css">


<title>Insertar Datos</title>
</head>
<body>


<!-- NAVBAR -->
<!-- END NAVBAR -->

<div class="container" style="justify-content: center; margin: 0 auto; position: relative; ">

<div class="card mi_card" >

<div class="mb-4">
  <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Insertar producto</p>
</div>

<form class="row g-3 needs-validation" action="insertar.php" method="POST" novalidate enctype="multipart/form-data">
<input type="hidden" name="dato" value="insertar" >
  <div class="col-md-12">
    <label for="validationCustom01" class="form-label">Título</label>
    <input type="text" class="form-control" id="validationCustom01" name="titulo"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su nombre.
      </div>
  </div>


  <div class="col-md-12">
    <label for="validationCustom03" class="form-label">Descripción</label>
    <textarea  class="form-control" name="descripcion"  cols="10" rows="5"></textarea>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su localidad.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom04" class="form-label">Precio</label>
    <input type="text" class="form-control"  name="precio"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su teléfono.
      </div>
  </div>





<!-- imagen -->
<div class="col-12 ">
        <style>
                .file-upload {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: center;
                -webkit-justify-content: center;
                -ms-flex-pack: center;
                justify-content: center;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                position: relative;
                cursor: pointer;
                overflow: hidden;
                width: 100%;
                max-width: 100%;
                height: 100%;
                padding: 5px 10px;
                font-size: 1rem;
                text-align: center;
                color: #ccc;
                }
            
          
                .file-upload-wrapper .card.card-body .file-upload-message p.file-upload-error {
                color: #f34141;
                font-weight: 700;
                display: none;
                }
                .file-upload .mask.rgba-stylish-slight {
                opacity: 0;
                -webkit-transition: all .15s linear;
                -o-transition: all .15s linear;
                transition: all .15s linear;
                }
                .view .mask {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                overflow: hidden;
                width: 100%;
                height: 100%;
                background-attachment: fixed;
                }
                .rgba-stylish-slight {
                background-color: rgba(62,69,81,.1);
                }
                .file-upload-wrapper .card.card-body .file-upload-errors-container {
                position: absolute;
                left: 0;
                top: 0;
                right: 0;
                bottom: 0;
                z-index: 3;
                background: rgba(243, 65, 65, .8);
                text-align: left;
                visibility: hidden;
                opacity: 0;
                -webkit-transition: visibility 0s linear .15s, opacity .15s linear;
                -o-transition: visibility 0s linear .15s, opacity .15s linear;
                transition: visibility 0s linear .15s, opacity .15s linear;
                }
                .file-upload-wrapper .card.card-body input {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                height: 100%;
                width: 100%;
                opacity: 0;
                cursor: pointer;
                z-index: 5;
                }
  
                .file-upload i {
                font-size: 3rem;
                }
        </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<div class="file-upload-wrapper">
    <div class="card card-body view file-upload mb-3"  style="border: #bababa 1px solid; width:1030px; padding: 15px; ">
        <div class="card-text file-upload-message"> 
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Arrastre y suelte un archivo aquí o haga click aquí (Tamaño recomendado 1024x150px)</p>
        </div>
        <input type="file"  id="file" name="file[]"   class="file_upload">
        <output id="result" class="col-12 p-4 row text-center " >
        <div class="file-upload-preview">
            <span class="file-upload-render"></span>
            <div class="file-upload-infos">

            </div>
        </div>
    </div>
</div>


        <script>
                function handleFileSelect() {
                //Check File API support
                if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = document.getElementById("result");
                for (var i = 0; i < files.length; i++) {
                var file = files[i];
                //Only pics
                if (!file.type.match('image')) continue;
                var picReader = new FileReader();
                picReader.addEventListener("load", function (event) { 
                var picFile = event.target;
                var div = document.createElement("div");
                div.innerHTML = "<img  class='card-img-top'  src='" + picFile.result + "'" + "title='" + picFile.name + "'/>";
                output.insertBefore(div, null);
                });
                //Read the image
                picReader.readAsDataURL(file);
                }
                } else {
                console.log("Your browser does not support File API");
                }
                }
                document.getElementById('file').addEventListener('change', handleFileSelect, false);
        </script>
<!-- end imagen -->

  

  <div class="col-12">
    <button class="btn btn-primary" type="submit">Insertar</button>
  </div>


</form>
</div>

</div>










<script>
(function () {
  'use strict'
  
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>





<script type="text/javascript">
function JSalert(dato){
	swal("ACEPTADO", dato, "success");
}
</script>

<script type="text/javascript">
function JSalert_Error(dato){
  swal("ERROR", dato, "error");   
  }
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>









<?php 
  if(!empty($_REQUEST))
  {
if ($_REQUEST["insert"] == 'ok'){
  echo '
  <script>
    JSalert("Insertado correctamente");
  </script>
  ';
}
  }
?>
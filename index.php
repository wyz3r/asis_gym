<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asis_gym";
//conexion a base de datos
$conexion = new mysqli($servername, $username, $password, $dbname);
//checar conexion
if ($conexion->connect_error)
{
  die("Connection failed: " . $conexion->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  //INGRESAR USUARIO
  if (($_POST['formulario']=='altausuario'))
  {

    $stmt =$conexion->prepare("INSERT INTO usuarios(name, apellido_paterno, apellido_materno, cve_ulsa, cve_sexo, fecha_nac, cve_tipo, cve_carrera, cve_campus) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssss",$nombre,$apellidoPaterno,$apellidoMaterno,$clave,$sexo,$fnac,$tipo,$carrera,$campus);
    $nombre=$_POST['nombre'];
    $apellidoPaterno=$_POST['apellido-paterno'];
    $apellidoMaterno=$_POST['apellido-materno'];
    $clave=$_POST['clave-ulsa'];
    $sexo=$_POST['optradio'];
    $fnac=$_POST['fecha'];
    $tipo=$_POST['tipo'];
    $carrera=$_POST['carrera'];
    $campus=$_POST['campus'];
    echo $nombre." ".$campus." ".$carrera." ".$tipo;
    $stmt->execute();
  }
  //ELIMINAR USUARIO
  /*if (($_POST['formulario']=='eliminarusuario'))
  {
    $stmt = $conexion->prepare("Delete from Persona where cve_ulsa=?");
    $stmt -> bind_param("s", $clave);
    $clave=$_POST['usuarioaeliminar'];
    $stmt->execute();
  }
  if (($_POST['formulario']=='modificarusuario'))
  {
    $stmt = $conexion->prepare("Delete from Persona where cve_ulsa=?");
    $stmt -> bind_param("s", $clave);
    $clave=$_POST['usuarioaeliminar'];
    $stmt->execute();
  }*/
}
?>

  <html>

  <head>
    <script src="Jquery/jquery-2.1.4.min.js"></script>
    <link href="bootstrap-3.3.5-dist/css/bootstrapjurney.min.css" rel="stylesheet">
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <link href="css/css.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/menu.css">



    <meta charset="UTF-8">
  </head>

  <body>
    <div class="" style="align:center">
      <IMG SRC="imagenes/descargas-1v2_IMAGOTIPO_MEX_LASALLE_OFICIAL_mcolor.png" WIDTH=378 HEIGHT=150>

    </div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" onclick=hint(0) href="#">Inscripción</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li><a onclick=hint(1) href="#">Asistencia</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a onclick=hint(2) href="#">Consulta usuarios</a></li>
                <li><a onclick=hint(3) href="#">Eliminar usuario</a></li>
                <li><a onclick=hint(4) href="#">Modificar usuario</a></li>
                <li class=""></li>
                <li><a href="#">Separated link</a></li>
                <li class=""></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container">

      <div style="align-content: center;" class="div-inscripcion view">
        <form class="form-inscripcion form-horizontal" action="index.php" method="post">
          <input type="hidden" name="formulario" value="altausuario">
          <legend>
            <h2>Inscripción</h2>
          </legend>
          <div class="form-group">
            <label class="col-md-4 control-label">Nombre</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="nombre" id="" placeholder="Nombre">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Apellido Paterno</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="apellido-paterno" id="" placeholder="Apellido Paterno">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-4 control-label">Apellido Materno</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="apellido-materno" id="" placeholder="Apellido Materno">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-4 control-label">Clave Ulsa</label>
            <div class="col-lg-4">
              <input type="number" class="form-control" name="clave-ulsa" placeholder="Clave Usuario">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-4 control-label">Sexo</label>
            <div class="col-lg-2">
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked=""> Masculino
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="optionsRadios" id="optionsRadios2" value="2"> Femenino
                </label>
              </div>
            </div>
            <div class="col-md-2">
              <label>fecha Nacimiento</label>
              <input type="date" name="fecha" value="">
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-2 col-md-offset-2">
              <select class="form-control" name="tipo">
                <option value="">Tipo</option>
                <?php
						$sql = "SELECT cve_tipo,name FROM `Tipo` WHERE 1";

									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<option value= \"". $row['cve_tipo']."\">".$row['name']."</option>";
										}//echo "<option value=\"".$row['cve_carrera']."\">".$row['name']."</option>"
										} else {
											echo "0 results";
										}
						 ?>
              </select>
            </div>
            <div class="col-lg-2">
              <select class="form-control" id="carrera" name="carrera">
                <option value=" ">Carrera</option>
                <?php
						$sql = "SELECT `cve_carrera`, `name` FROM `Carrera` WHERE 1";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<option value= \"". $row['cve_carrera']."\">".utf8_encode ($row['name'])."</option>";
										}//echo "<option value=\"".$row['cve_carrera']."\">".$row['name']."</option>"
										} else {
											echo "0 results";
										}
						 ?>
              </select>
            </div>
            <div class="col-lg-2">
              <select class="form-control" id="campus" name="campus">
                <option>campus</option>
                <?php
						$sql = "SELECT `cve_campus`, `nombre` FROM `campus` WHERE 1";
									$result = $conexion->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<option value= \"". $row['cve_campus']."\">".utf8_encode ($row['nombre'])."</option>";
										}//echo "<option value=\"".$row['cve_carrera']."\">".$row['name']."</option>"
										} else {
											echo "0 results";
										}
						 ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
          </fieldset>
        </form>
      </div>

      <div class="view div-asistencia" style="display:none">
        <h2>Asistencia</h2>
        <div class="form-group">
          <label class="col-lg-4 control-label">Clave Ulsa</label>
          <div class="col-lg-2">
            <input type="number" class="form-control" name="clave-ulsa" placeholder="Clave Usuario">
          </div>
        </div>
        <!-- Trigger the modal with a button -->
        <button id="static" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tomar Pic</button>

        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="myModal3" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Picture</h4>
              </div>
              <div class="modal-body">
                <table>
                  <tr>
                    <td valign=top>
                      <h1>Tomate la foto</h1>
                      <h3>Despues de tomarte la foto cargala.</h3>

                      <!-- First, include the JPEGCam JavaScript Library -->
                      <script type="text/javascript" src="camjs/webcam.js"></script>

                      <!-- Configure a few settings -->
                      <script language="JavaScript">
                        webcam.set_api_url('camjs/test.php');
                        webcam.set_quality(100); // JPEG quality (1 - 100)

                        webcam.set_shutter_sound(true); // play shutter click sound
                      </script>

                      <!-- Next, write the movie to the page at 320x240 -->
                      <script language="JavaScript">
                        document.write(webcam.get_html(320, 240));
                      </script>

                      <!-- Some buttons for controlling things -->
                      <br/>
                      <form>
                        <!--<input type=button value="Configure..." onClick="webcam.configure()">-->

                        <input class="btn btn-success" type=button value="Capturar" onClick="webcam.freeze()">

                        <input type=button value="Upload" class="btn btn-danger" data-dismiss="modal" onClick="webcam.upload()">

                        <input type=button value="Reset" class="btn btn-primary" onClick="webcam.reset()">
                      </form>

                      <!-- Code to handle the server response (see test.php) -->
                      <script language="JavaScript">
                        webcam.set_hook('onComplete', 'my_completion_handler');

                        function my_completion_handler(msg) {
                          // extract URL out of PHP output
                          if (msg.match(/(http\:\/\/\S+)/)) {
                            var image_url = RegExp.$1;

                            alert(image_url);

                            // show JPEG image in page
                            document.getElementById('upload_results').innerHTML =
                              '<h1>Upload Successful!</h1>' +
                              '<h3>JPEG URL: ' + image_url + '</h3>' +
                              '<img src="' + image_url + '">';

                            // reset camera for another shot
                            webcam.reset();
                          } else alert("PHP Error1: " + msg);
                        }
                      </script>

                    </td>
                    <td width=50></td>
                    <td valign=top>
                      <!--<div id="upload_results" style="background-color:#eee;"></div>-->
                    </td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div style="align-content: center; display:none" class="div-consulta view">
        <form class="form-inscripcion form-horizontal" action="index.html" method="post">
          <input type="hidden" name="formulario" value="consultausuario">
          <h1> Consulta de asistencia usuarios </h1>
          <?php
                $sql="SELECT cve_ulsa, count(*) as total from Asistencia where Hora_Salida != NULL group by cve_ulsa;";
                $result = mysqli_query($conexion, $sql);

                if (mysqli_num_rows($result) > 0)
                {
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "Usuario: " . $row["cve_ulsa"]. " - " . $row["total"] . "<br>";
                }
                }
                else
                {
                    echo "0 results";
                }
              ?>
        </form>
      </div>

      <div style="align-content: center; display:none" class="div-eliminar view">
        <form class="form-inscripcion form-horizontal" action="index.html" method="post">
          <input type="hidden" name="formulario" value="eliminarusuario">
          <h1> Eliminar usuario </h1>
          <div class="form-group">
            <label class="col-md-4 control-label">Clave de usuario a eliminar</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="usuarioaeliminar" id="" placeholder="Usuario a eliminar">
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Cancel</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>

      </div>
      <div style="align-content: center; display:none" class="div-mod-usuario view">
        <form class="form-inscripcion form-horizontal" action="index.html" method="post">
          <input type="hidden" name="formulario" value="modificarusuario">
          <h1> Modificar usuario </h1>
          <div class="form-group">
            <label class="col-md-4 control-label">Clave de usuario a eliminar</label>
            <div class="col-lg-4">
              <input type="text" class="form-control" name="usuarioamodificar" id="" placeholder="Usuario a modificar">
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="reset" class="btn btn-default">Cancel</button>
              <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
          </div>
        </form>

      </div>
  </body>
  <script>
    $("#static").click(function() {
      $("#myModal3").modal({
        backdrop: "static"
      });
    });
    $("#alert").on("click", function() {
      alert();
    });
  </script>


  </div>
  </div>



  </body>

  <script>
    function hint(num) {
      for (var x = 0; x <= 6; x++) {
        if (x === num) {
          document.getElementsByClassName('view')[x].style.display = 'block';
          //document.getElementById('altasboton').style.display='none';

        } else {
          document.getElementsByClassName('view')[x].style.display = 'none';
        }

      }


    }
  </script>

  </html>

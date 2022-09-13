<?php

if($_SESSION["perfil"] == "Especial" ){

  echo '<script>

    window.location = "pacientes2";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Pacientes
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Pacientes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarPaciente">
          
          Agregar Paciente

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Documento</th>
           <th>Cama</th>
           <th>Fecha</th> 
           <th>Ag-nasal</th>
           <th>Ego</th>
           <th>Cult</th>
           <th>Psa</th>
           <th>Eco</th>
           <th>Tom</th>
           <th>Card</th>
           <th>Val-esp</th>
           <th>Hem-bqm</th>
           <th>Otros</th>
           <th>Observacion</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $pacientes = ControladorPacientes::ctrMostrarPacientes($item, $valor);

          foreach ($pacientes as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["documento"].'</td>

                    <td>'.$value["cama"].'</td>

                    <td>'.$value["fecha"].'</td>';
                    
                    
                   
                    if($value["ag"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["ag"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["ag"].'</button></td>';
  
                    } 

                    if($value["ego"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["ego"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["ego"].'</button></td>';
  
                    }           

                    if($value["cult"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["cult"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["cult"].'</button></td>';
  
                    }

                    if($value["psa"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["psa"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs" >'.$value["psa"].'</button></td>';
  
                    }

                    if($value["eco"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["eco"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["eco"].'</button></td>';
  
                    }

                    if($value["tom"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["tom"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["tom"].'</button></td>';
  
                    }

                    if($value["card"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["card"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["card"].'</button></td>';
  
                    }

                    if($value["val"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["val"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["val"].'</button></td>';
  
                    }

                    if($value["hem"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["hem"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["hem"].'</button></td>';
  
                    }

                    echo '<td>'.$value["otros"].'</td>

                    <td>'.$value["observacion"].'</td>

                    <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarPaciente" data-toggle="modal" data-target="#modalEditarPaciente" idPaciente="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                    if($_SESSION["perfil"] == "Administrador"){

                        echo '<button class="btn btn-danger btnEliminarPaciente" idPaciente="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                    }

                    echo '</div>  

                  </td>

                  </tr>';
                    
                   
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PACIENTE
======================================-->

<div id="modalAgregarPaciente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Paciente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoPaciente" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar documento" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CAMA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCama" placeholder="Ingresar cama" required>

              </div>

            </div>

            
             <!-- ENTRADA PARA LA FECHA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFecha" placeholder="Ingresar fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

              <!-- ENTRADA PARA LA AG -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoAg">
                  
                  <option value="">Ag-nasal</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA EGO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoEgo">
                  
                  <option value="">Ego</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA CULT -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoCult">
                  
                  <option value="">Cult</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA PSA -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPsa">
                  
                  <option value="">Psa</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA ECO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoEco">
                  
                  <option value="">Eco</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA TOM -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoTom">
                  
                  <option value="">Tom</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA CARD -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoCard">
                  
                  <option value="">Card</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA VAL -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoVal">
                  
                  <option value="">Val-esp</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA HEM -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoHem">
                  
                  <option value="">Hem-bqm</option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA OTROS -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoOtros" placeholder="Ingresar Otros">

              </div>

            </div>

              <!-- ENTRADA PARA LA OBSERVACIÓN -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoObservacion" placeholder="Ingresar Observación">

              </div>

            </div>
                
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Paciente</button>

        </div>

      </form>

      <?php

        $crearPaciente = new ControladorPacientes();
        $crearPaciente -> ctrCrearPaciente();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PACIENTE
======================================-->

<div id="modalEditarPaciente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Paciente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editarPaciente" id="editarPaciente" required>
                <input type="hidden" id="idPaciente" name="idPaciente">
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CAMA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="tex" class="form-control input-lg" name="editarCama" id="editarCama" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFecha" id="editarFecha"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

              <!-- ENTRADA PARA LA AG -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarAg">
                  
                  <option value="editarAg" id="editarAg"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA EGO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarEgo">
                  
                  <option value="" id="editarEgo"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA CULT -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarCult">
                  
                  <option value="" id="editarCult"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA PSA -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarPsa">
                  
                  <option value="" id="editarPsa"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA ECO -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarEco">
                  
                  <option value="" id="editarEco"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA TOM -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarTom">
                  
                  <option value="" id="editarTom"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA CARD -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarCard">
                  
                  <option value="" id="editarCard"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA VAL -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarVal">
                  
                  <option value="" id="editarVal"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA LA HEM -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="editarHem">
                  
                  <option value="" id="editarHem"></option>

                  <option value="con examen">con examen</option>

                  <option value="sin examen">sin examen</option>


                </select>

              </div>

            </div>

              <!-- ENTRADA PARA OTROS -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarOtros" id="editarOtros">

              </div>

            </div>

              <!-- ENTRADA PARA LA OBSERVACIÓN -->
            
              <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editarObservacion" id="editarObservacion">

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarPaciente = new ControladorPacientes();
        $editarPaciente -> ctrEditarPaciente();

      ?>

    

    </div>

  </div>

</div>

<?php

  $eliminarPaciente = new ControladorPacientes();
  $eliminarPaciente -> ctrEliminarPaciente();

?>



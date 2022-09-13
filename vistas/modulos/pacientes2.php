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

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["ag"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["ag"].'</button></td>';
  
                    } 

                    if($value["ego"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["ego"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs"  >'.$value["ego"].'</button></td>';
  
                    }           

                    if($value["cult"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["cult"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["cult"].'</button></td>';
  
                    }

                    if($value["psa"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["psa"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs " >'.$value["psa"].'</button></td>';
  
                    }

                    if($value["eco"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["eco"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["eco"].'</button></td>';
  
                    }

                    if($value["tom"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["tom"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["tom"].'</button></td>';
  
                    }

                    if($value["card"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["card"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["card"].'</button></td>';
  
                    }

                    if($value["val"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs "  >'.$value["val"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["val"].'</button></td>';

                    }

                    if($value["hem"] != "sin examen"){

                      echo '<td><button class="btn btn-success btn-xs"  >'.$value["hem"].'</button></td>';
  
                    }else{
  
                      echo '<td><button class="btn btn-danger btn-xs "  >'.$value["hem"].'</button></td>';
  
                    }

                    echo '<td>'.$value["otros"].'</td>

                    <td>'.$value["observacion"].'</td>

                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>





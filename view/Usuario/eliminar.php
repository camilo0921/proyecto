<?php
     while ($usu=pg_fetch_assoc($usuarios)) {
        echo "<tr>";
            echo "<td>".$usu['usuario_id']."</td>";
            echo "<td>".$usu['usuario_nombre']."</td>";
            echo "<td>".$usu['usuario_apellidos']."</td>";
            echo "<td>".$usu['usuario_identificacion']."</td>";
            echo "<td>".$usu['usuario_contrasena']."</td>";
            echo "<td>".$usu['rol_desc']."</td>";
            echo "<td><img src='".$usu['usuario_foto']."'</td>";

        echo "<td>";


                echo "<div class='form-button-action'>";
                echo "<button value='".$usu['usuario_id']."' class='btn btn-link btn-primary' data-toggle='modal' data-target='#exampleModalEli'><i class='fas fa-edit   -alt fa-2x'></i></button></a>";
        echo "</td>";
         echo "<td>";
            echo "<div class='form-button-action'>";
                if($usu['estado_id']==1){
                   echo "<button class='btn btn btn-primary estado'
                   data-estado='".$usu['estado_id']."' 
                   data-id='".$usu['usuario_id']."'
                   data-url='".getUrl('Usuario','Usuario','getDelete',false,'ajax')."'>INHABILITAR</button>";

                }else if($usu['estado_id']==2){
                   echo "<button class='btn btn-link btn-danger estado'
                   data-estado='".$usu['estado_id']."' 
                   data-id='".$usu['usuario_id']."'
                   data-url='".getUrl('Usuario','Usuario','getDelete',false,'ajax')."'>HABILITAR</button>";
}
                echo "</td>";
               


                echo "</div>";

               

                 echo "</tr>";
            
        }
             ?>
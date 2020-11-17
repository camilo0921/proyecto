<?php
    while ($rev=pg_fetch_assoc($revista)) {
        echo "<tr>";
            echo "<td>".$rev['revista_id']."</td>";
            echo "<td>".$rev['revista_nombre']."</td>";
            echo "<td>".$rev['genero_desc']."</td>";
            echo "<td>".$rev['autor_desc']."</td>";
            echo "<td><img src='".$rev['revista_foto']."' width='100' heigth='100'></td>";

            echo "<td><button class=' btn btn-primary  modificarRev'data-toggle='modal'data-target='#modalUpdate'data-url='".getUrl("Revista","Revista","getUpdate",false,"ajax")."'data-id='".$rev['revista_id']."'>EDITAR</button></a>";

            echo "<button class=' btn btn-outline-info descripcionRevi'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Revista","Revista","getDetalles",false,"ajax")."'data-id='".$rev['revista_id']."'>DETALLES</button></a></td>";
        

            if($rev['estado_id']==1){
                echo "<td><a><button class='btn btn-danger estadoRevista' data-estado='".$rev['estado_id']."'  data-id='".$rev['revista_id']."' data-url='".getUrl("Revista","Revista","getEstado",false,"ajax")."'>Inhabilitar</button></a></td>";

            }else if($rev['estado_id']==2){
                echo "<td><a><button class='btn btn-success estadoRevista' data-estado='".$rev['estado_id']."'  data-id='".$rev['revista_id']."' data-url='".getUrl("Revista","Revista","getEstado",false,"ajax")."'>Habilitar</button></a></td>";
            }
        
        echo "</tr>";
    }
?>
   
<?php
    while ($lib=pg_fetch_assoc($libro)) {
        echo "<tr>
            <td>".$lib['libro_id']."</td>
            <td>".$lib['libro_nombre']."</td>
            <td>".$lib['genero_desc']."</td> 
            <td>".$lib['autor_desc']."</td>
            <td><img src='".$lib['libro_foto']."' width='100' heigth='100'></td>";

        
        echo "<td><a><button class='btn btn-primary modificarL' data-toggle='modal' data-target='#modalUpdate' data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getUpdate",false,"ajax")."'>Editar</button></a>";

        echo "<button class=' btn btn-outline-info descripcionLibro'data-toggle='modal'data-target='#modalDescripcion' data-url='".getUrl("Libro","Libro","getDetalles",false,"ajax")."'data-id='".$lib['libro_id']."'>DETALLES</button></a></td>";
       

        if($lib['estado_id']==1){
           echo "<td><a><button class='btn btn-danger estadoLibro' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getEstado",false,"ajax")."'>Inhabilitar</button></a></td>";
         }else if($lib['estado_id']==2){
            echo "<td><a><button class='btn btn-success estadoLibro' data-estado='".$lib['estado_id']."'  data-id='".$lib['libro_id']."' data-url='".getUrl("Libro","Libro","getEstado",false,"ajax")."'>Habilitar</button></a></td>";
        }
       
        echo "</tr>";
    }
?>
   
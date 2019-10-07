
<!-- select con get_result -->
<?php
$id - 1;
$sel = $con->prepare("SELECT * FROM mitabla WHERE id = ? ");
$sel -> bind_param('i', $id);
$sel -> execute();
$res = $sel->get_result();
 ?>
 <table>
   <th>id_estado</th>
   <th>nombre_estadp</th>
   <?php while ($row = $res->fetch_assoc()) { ?>
   <tr>
     <td><?php echo $row['id']; ?></td>
     <td><?php echo $row['estado']; ?></td>
   </tr>
   <?php }
   $sel->close();
   $con->close();
   ?>
 </table>

<!-- select con bind_result -->
 <?php
 $id - 1;
 $sel = $con->prepare("SELECT id,estado FROM mitabla WHERE id = ? ");
 $sel -> bind_param('i', $id);
 $sel -> execute();
 $sel->bind_result($id,$estado);
  ?>
  <table>
    <th>id_estado</th>
    <th>nombre_estadp</th>
    <?php while ($sel->fetch()) { ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $estado; ?></td>
    </tr>
    <?php }
    $sel->close();
    $con->close();
    ?>
  </table>

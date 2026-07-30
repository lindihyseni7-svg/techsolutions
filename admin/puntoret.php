<?php  

use Admin\Lib\Puntori;


?>
<?php include "inc/header.php";
include "inc/adminnav.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Puntoret</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Puntoret</li>
            </ol>
         <?php
            $puntori = new Puntori();
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $puntori= new Puntori();
                    $puntoret = $puntori->find_all();
                    foreach ($puntoret as $p) {
                        echo "<tr>";
                        // echo "<td><img width='100' src='uploads/" . $u->getPhoto() . "' alt='user photo'></td>";
                        echo "<td>" . $p->getEmri() . "</td>";
                        echo "<td>" . $p->getMbiemri() . "</td>";
                        echo "<td>" . $p->getEmail() . "</td>";
                        echo "<td>
                                <a href='update_puntor.php?id=".$p->getId()."'>Edit</a>
                                <a href='delete_puntor.php?id=" .$p->getId()."'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Emri</th>
                        <th>Mbiemri</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <?php include "inc/footer.php"; ?>

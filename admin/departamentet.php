<?php  

use Admin\Lib\Departamenti;

?>
<?php include "inc/header.php";

include "inc/adminnav.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Departamentet</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamentet</li>
            </ol>
            <?php
            $departamenti = new Departamenti();
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Emri</th>
                        <th>Veprimet</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $departamentet = $departamenti->find_all();
                    foreach ($departamentet as $d) {
                        echo "<tr>";
                        echo "<td>" . $d->getId() . "</td>";
                        echo "<td>" . $d->getEmri() . "</td>";
                        echo "<td>
                                <a href='update_departament.php?id=".$d->getId()."'>Edit</a>
                                <a href='delete_departament.php?id=" .$d->getId()."'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Emri</th>
                        <th>Veprimet</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <?php include "inc/footer.php"; ?>

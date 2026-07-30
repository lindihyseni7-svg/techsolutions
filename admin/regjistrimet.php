<?php  

use Admin\Lib\Regjistrimi;

?>
<?php include "inc/header.php";

include "inc/adminnav.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Regjistrimet</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Regjistrimet</li>
            </ol>
         <?php
            $regjistrimi = new Regjistrimi();
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Ora Hyrjes</th>
                        <th>Ora Daljes</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $regjistrimi = new Regjistrimi();
                    $regjistrimet = $regjistrimi->find_all();
                    foreach ($regjistrimet as $r) {
                        echo "<tr>";
                        echo "<td>" . $r->getId() . "</td>";
                        echo "<td>" . $r->getData() . "</td>";
                        echo "<td>" . $r->getOraHyrjes() . "</td>";
                        echo "<td>" . $r->getOraDaljes() . "</td>";
                        echo "<td>
                                <a href='update_regjistrimi.php?id=".$r->getId()."'>Edit</a>
                                <a href='delete_regjistrimi.php?id=" .$r->getId()."'>Delete</a>
                                </td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Ora Hyrjes</th>
                        <th>Ora Daljes</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    <?php include "inc/footer.php"; ?> 

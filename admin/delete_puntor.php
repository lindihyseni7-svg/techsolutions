<?php

use Admin\Lib\Puntori;

include "inc/header.php";


if (isset($_GET['id'])) {
    $puntori = new Puntori();
    $p = $puntori->find_id($_GET['id']);
} else {
    header('Location: puntoret.php');
}
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Delete User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Delete User</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Delete Puntorin</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['delete'])) {
                                    $p->delete();
                                }
                                ?>
                                <form method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmri">Emri</label>
                                                <input class="form-control py-4" name="emri"
                                                       value="<?php echo $p->getEmri() ?>" readonly id="inputEmri"
                                                       type="text" placeholder="Emri"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputMbiemri">Mbiemri</label>
                                                <input class="form-control py-4" name="mbiemri" readonly
                                                       value="<?php echo $p->getMbiemri() ?>" id="inputMbiemri"
                                                       type="text"
                                                       placeholder="Mbiemri"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmail">Email</label>
                                        <input class="form-control py-4" name="email" id="inputEmail"
                                               type="email" value="<?php echo $p->getEmail() ?>" readonly
                                               aria-describedby="emailHelp" placeholder="Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputDepartamenti">Departamenti</label>
                                        <input class="form-control py-4" name="departamenti" value="<?php echo $p->getDepartamenti() ?>" readonly
                                               id="inputDepartamenti" type="text" placeholder="Departamenti"/>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary btn-block" name="delete" value="Delete">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php include "inc/footer.php" ?>

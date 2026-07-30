<?php

use Admin\Lib\Departamenti;

include "inc/header.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Department</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Department</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Department</h3></div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $departamenti = new Departamenti();
                                    $departamenti->setEmri($_POST['emri']);
                                    $departamenti->create();
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmri">Name</label>
                                        <input class="form-control py-4" name="emri" id="inputEmri" type="text" placeholder="Enter department name"/>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary btn-block" name="save" value="Save">
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

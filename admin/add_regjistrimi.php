<?php

use Admin\Lib\Regjistrimi;

include "inc/header.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Registration</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Registration</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Registration</h3></div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $regjistrimi = new Regjistrimi();
                                    $regjistrimi->setData($_POST['data']);
                                    $regjistrimi->setOraHyrjes($_POST['ora_hyrjes']);
                                    $regjistrimi->setOraDaljes($_POST['ora_daljes']);
                                    $regjistrimi->create();
                                }
                                ?>
                                <form method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputData">Date</label>
                                        <input class="form-control py-4" name="data" id="inputData" type="date" placeholder="Enter date"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputOraHyrjes">Entry Time</label>
                                        <input class="form-control py-4" name="ora_hyrjes" id="inputOraHyrjes" type="time" placeholder="Enter entry time"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputOraDaljes">Exit Time</label>
                                        <input class="form-control py-4" name="ora_daljes" id="inputOraDaljes" type="time" placeholder="Enter exit time"/>
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

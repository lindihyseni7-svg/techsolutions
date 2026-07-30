<?php

use Admin\Lib\Puntori;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tech Solutions - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Add Employee</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Add Employee</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Employee</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_POST['save'])) {
                                    $puntori = new Puntori();
                                    $puntori->setEmri($_POST['emri']);
                                    $puntori->setMbiemri($_POST['mbiemri']);
                                    $puntori->setEmail($_POST['email']);
                                    $puntori->setFjalekalimi($_POST['fjalekalimi']);
                                    $puntori->setDepartamenti($_POST['departamenti']);
                                    $puntori->create();
                                }
                                ?>
                                <form method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmri">First Name</label>
                                                <input class="form-control py-4" name="emri" id="inputEmri"
                                                       type="text" placeholder="Enter first name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputMbiemri">Last Name</label>
                                                <input class="form-control py-4" name="mbiemri" id="inputMbiemri"
                                                       type="text"
                                                       placeholder="Enter last name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmail">Email</label>
                                        <input class="form-control py-4" name="email" id="inputEmail"
                                               type="email"
                                               aria-describedby="emailHelp" placeholder="Enter email address"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">Password</label>
                                        <input class="form-control py-4" name="fjalekalimi" id="inputPassword"
                                               type="password"
                                               placeholder="Enter password"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputDepartamenti">Department</label>
                                        <input class="form-control py-4" name="departamenti" id="inputDepartamenti"
                                               type="text" placeholder="Enter department"/>
                                    </div>
                                    <div class="form-group mt-4 mb-0">
                                        <input type="submit" class="btn btn-primary btn-block" name="save"
                                               value="Save">
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

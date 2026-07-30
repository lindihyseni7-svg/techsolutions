<?php

include "inc/header.php";

if (isset($_GET['id'])) {
    $puntori = new Admin\Lib\Puntori();
    $p = $puntori->find_id($_GET['id']);
} else {
    header('Location: puntoret.php');
}

if (isset($_POST['save'])) {
    $puntori->setId($p->getId());
    $puntori->setEmri($_POST['firstname']);
    $puntori->setMbiemri($_POST['lastname']);
    $puntori->setEmail($_POST['email']);
    $puntori->setDepartamenti($_POST['department']);
    $puntori->update();
}
?>


<!-- HTML Content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit User</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edito Puntorin</h3></div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                                <input class="form-control py-4" name="firstname" value="<?php echo $p->getEmri(); ?>" id="inputFirstName" type="text" placeholder="Enter first name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                                <input class="form-control py-4" name="lastname" value="<?php echo $p->getMbiemri(); ?>" id="inputLastName" type="text" placeholder="Enter last name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmail">Email</label>
                                        <input class="form-control py-4" name="email" value="<?php echo $p->getEmail(); ?>" id="inputEmail" type="email" placeholder="Enter email address"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputDepartment">Department</label>
                                        <input class="form-control py-4" name="department" value="<?php echo $p->getDepartamenti(); ?>" id="inputDepartment" type="text" placeholder="Enter department"/>
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
</div>

<?php include "inc/footer.php"; ?>

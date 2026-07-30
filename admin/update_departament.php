<?php

use Admin\Lib\Departamenti;

include "inc/header.php";


if (isset($_GET['id'])) {
    $departamenti = new Departamenti();
    $departament = $departamenti->find_id($_GET['id']);
} else {
    header('Location: departamentet.php');
}

if (isset($_POST['save'])) {
    $departamenti = new Departamenti();
    $departamenti->setId($departament->getId());
    $departamenti->setEmri($_POST['emri']);
    $departamenti->update();
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Departament</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Departament</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Departament</h3></div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmri">Emri</label>
                                        <input class="form-control py-4" name="emri" value="<?php echo $departament->getEmri(); ?>" id="inputEmri" type="text" placeholder="Enter department name"/>
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

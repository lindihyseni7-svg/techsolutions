<?php

use Admin\Lib\Regjistrimi;

include "inc/header.php";


if (isset($_GET['id'])) {
    $regjistrimi = new Regjistrimi();
    $regjistrimi = $regjistrimi->find_id($_GET['id']);
} else {
    header('Location: regjistrimet.php');
}

if (isset($_POST['save'])) {
    $regjistrimi->setId($regjistrimi->getId());
    $regjistrimi->setData($_POST['data']);
    $regjistrimi->setOraHyrjes($_POST['ora_hyrjes']);
    $regjistrimi->setOraDaljes($_POST['ora_daljes']);
    $regjistrimi->update();
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit Regjistrim</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Edit Regjistrim</li>
            </ol>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Regjistrim</h3></div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputID">ID</label>
                                        <input class="form-control py-4" name="id" value="<?php echo $regjistrimi->getId(); ?>" id="inputID" type="text" placeholder="Enter ID"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputData">Data</label>
                                        <input class="form-control py-4" name="data" value="<?php echo $regjistrimi->getData(); ?>" id="inputData" type="text" placeholder="Enter data"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputOraHyrjes">Ora Hyrjes</label>
                                        <input class="form-control py-4" name="ora_hyrjes" value="<?php echo $regjistrimi->getOraHyrjes(); ?>" id="inputOraHyrjes" type="text" placeholder="Enter ora hyrjes"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputOraDaljes">Ora Daljes</label>
                                        <input class="form-control py-4" name="ora_daljes" value="<?php echo $regjistrimi->getOraDaljes(); ?>" id="inputOraDaljes" type="text" placeholder="Enter ora daljes"/>
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

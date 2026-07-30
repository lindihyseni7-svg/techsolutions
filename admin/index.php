<?php
include "inc/header.php";
include "inc/adminnav.php";

use Admin\Lib\Departamenti;
use Admin\Lib\Kontakti;
use Admin\Lib\Puntori;
use Admin\Lib\Regjistrimi;

function safeCount($model): int
{
    try {
        return count($model->find_all());
    } catch (Throwable $e) {
        return 0;
    }
}

function safeLatest($model, int $limit = 5): array
{
    try {
        $items = $model->find_all();
        return array_slice(array_reverse($items), 0, $limit);
    } catch (Throwable $e) {
        return [];
    }
}

$puntoriModel = new Puntori();
$departamentiModel = new Departamenti();
$regjistrimiModel = new Regjistrimi();
$kontaktiModel = new Kontakti();

$stats = [
    'puntoret' => safeCount($puntoriModel),
    'departamentet' => safeCount($departamentiModel),
    'regjistrimet' => safeCount($regjistrimiModel),
    'kontaktet' => safeCount($kontaktiModel),
];

$latestContacts = safeLatest($kontaktiModel, 4);
$latestEmployees = safeLatest($puntoriModel, 4);
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="puntoret.php" method="get">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search employees..." name="q">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php" target="_blank">
                        <i class="fas fa-globe fa-fw"></i>
                    </a>
                </li>
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                        <span class="rounded-circle bg-primary text-white d-inline-grid" style="width:36px;height:36px;display:inline-grid;place-items:center;">
                            <i class="fas fa-user"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="dashboard-hero mb-4">
                <div>
                    <span class="admin-eyebrow">Tech Solutions Admin</span>
                    <h1>Operations Dashboard</h1>
                    <p>Clean overview for employees, departments, registrations and contact requests. No demo charts, no template noise.</p>
                </div>
                <a href="create_account.php" class="btn btn-light btn-lg">+ Add Employee</a>
            </div>

            <div class="row mb-4">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fas fa-users"></i></div>
                        <span>Puntoret</span>
                        <strong><?php echo $stats['puntoret']; ?></strong>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fas fa-building"></i></div>
                        <span>Departamentet</span>
                        <strong><?php echo $stats['departamentet']; ?></strong>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fas fa-clock"></i></div>
                        <span>Regjistrimet</span>
                        <strong><?php echo $stats['regjistrimet']; ?></strong>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="metric-card">
                        <div class="metric-icon"><i class="fas fa-envelope"></i></div>
                        <span>Kontaktet</span>
                        <strong><?php echo $stats['kontaktet']; ?></strong>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-lg-4 mb-4">
                    <div class="action-card">
                        <div>
                            <h3>Employees</h3>
                            <p>View and manage staff records.</p>
                        </div>
                        <a href="puntoret.php">Open</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="action-card">
                        <div>
                            <h3>Departments</h3>
                            <p>Keep departments clean and simple.</p>
                        </div>
                        <a href="departamentet.php">Open</a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="action-card">
                        <div>
                            <h3>Registrations</h3>
                            <p>Track attendance and daily logs.</p>
                        </div>
                        <a href="regjistrimet.php">Open</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="table-card">
                        <h2>Latest contacts</h2>
                        <ul class="dashboard-list mt-3">
                            <?php if ($latestContacts): ?>
                                <?php foreach ($latestContacts as $contact): ?>
                                    <li>
                                        <div>
                                            <strong><?php echo htmlspecialchars($contact->getEmri() . ' ' . $contact->getMbiemri()); ?></strong><br>
                                            <span><?php echo htmlspecialchars($contact->getEmail()); ?></span>
                                        </div>
                                        <span><?php echo htmlspecialchars($contact->getDepartamenti()); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><span>No contact requests yet.</span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="table-card">
                        <h2>Latest employees</h2>
                        <ul class="dashboard-list mt-3">
                            <?php if ($latestEmployees): ?>
                                <?php foreach ($latestEmployees as $employee): ?>
                                    <li>
                                        <div>
                                            <strong><?php echo htmlspecialchars($employee->getEmri() . ' ' . $employee->getMbiemri()); ?></strong><br>
                                            <span><?php echo htmlspecialchars($employee->getEmail()); ?></span>
                                        </div>
                                        <span><?php echo htmlspecialchars($employee->getDepartamenti()); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><span>No employees yet.</span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php include "inc/footer.php"; ?>

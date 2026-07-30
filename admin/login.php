<?php
use Admin\Lib\Session;
use Admin\Lib\Puntori;

require_once "autoloader.php";

$session = new Session();
if ($session->isSignedIn()) {
    header("Location: index.php");
    exit;
}

$message = '';
$email = '';

if (isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $fjalekalimi = $_POST['fjalekalimi'] ?? '';

    $puntori = new Puntori();
    $puntori = $puntori->verifyPuntori($email, $fjalekalimi);

    if ($puntori) {
        $session->login($puntori);
        header("Location: index.php");
        exit;
    }

    $message = "Email ose fjalekalimi eshte gabim.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Tech Solutions</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/tech-admin.css" rel="stylesheet">
</head>
<body class="login-page">
<main class="login-shell">
    <section class="login-brand-panel">
        <div class="sidebar-brand-icon mb-4">
            <i class="fas fa-bolt fa-2x"></i>
        </div>
        <span class="admin-eyebrow">Admin Access</span>
        <h1>Welcome back to Tech Solutions.</h1>
        <p>Manage employees, departments and registrations from a cleaner dashboard built for daily operations.</p>
        <a class="btn btn-light mt-4" href="../index.php">Back to website</a>
    </section>

    <section class="login-form-panel">
        <h2>Sign in</h2>
        <p class="text-muted mb-4">Use your employee admin credentials.</p>

        <?php if ($message): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form method="post" autocomplete="on">
            <div class="form-group">
                <label for="inputEmailAddress">Email</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="name@company.com" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
            </div>
            <div class="form-group">
                <label for="inputFjalekalimi">Fjalekalimi</label>
                <input class="form-control" id="inputFjalekalimi" type="password" placeholder="Vendosni fjalekalimin" name="fjalekalimi" required>
            </div>
            <button type="submit" class="btn-tech w-100 mt-3" name="login">Login</button>
            <div class="text-center mt-4">
                <a class="small" href="create_account.php">Create an Account</a>
            </div>
        </form>
    </section>
</main>
</body>
</html>

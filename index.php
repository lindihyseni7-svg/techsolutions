<?php
include 'autoloader1.php';
include 'admin/lib/Kontakti.php';

use Admin\Lib\Kontakti;
use Admin\Lib\Session;

$session = new Session();
$isLoggedIn = $session->isSignedIn();
$contactMessage = '';

if (isset($_POST['save'])) {
    $kontakt = new Kontakti();
    $kontakt->setEmri(trim($_POST['emri'] ?? ''));
    $kontakt->setMbiemri(trim($_POST['mbiemri'] ?? ''));
    $kontakt->setEmail(trim($_POST['email'] ?? ''));
    $kontakt->setMesazhi(trim($_POST['mesazhi'] ?? ''));
    $kontakt->setDepartamenti(trim($_POST['departamenti'] ?? ''));

    ob_start();
    $kontakt->create();
    ob_end_clean();

    $contactMessage = 'Thank you! Your request was sent successfully.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tech Solutions - employee management, HR automation, payroll and project operations platform.">
    <meta name="keywords" content="tech solutions, employee management, HR, payroll, project management">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css?v=20260730-landing-v3">
    <title>Tech Solutions | Workforce Management Platform</title>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top tech-nav">
    <div class="container">
        <a class="navbar-brand brand-lockup" href="index.php">
            <span class="brand-icon"><i class="fa-solid fa-bolt"></i></span>
            Tech Solutions
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ml-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#solutions">Solutions</a></li>
                <li class="nav-item"><a class="nav-link" href="#workflow">Workflow</a></li>
                <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                <?php if ($isLoggedIn): ?>
                    <li class="nav-item"><a class="nav-link" href="admin/index.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="admin/login.php">Login</a></li>
                <?php endif; ?>
                <li class="nav-item ml-lg-3"><a class="btn btn-nav" href="#contact">Request demo</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="hero" id="home">
    <div class="video-container">
        <video autoplay muted loop playsinline>
            <source src="admin/images/video.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <div class="hero-grid"></div>
    <div class="hero-orb hero-orb-one"></div>
    <div class="hero-orb hero-orb-two"></div>
    <div class="scan-line"></div>

    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-7 reveal">
                <span class="eyebrow"><i class="fa-solid fa-shield-halved"></i> Workforce operations, simplified</span>
                <h1>Manage people, projects and payroll from one calm dashboard.</h1>
                <p class="hero-lead">
                    Tech Solutions helps teams replace messy spreadsheets with a smarter employee management platform for HR, attendance, payroll and project coordination.
                </p>
                <div class="hero-actions">
                    <a href="#solutions" class="btn btn-primary-modern">Explore platform</a>
                    <a href="#contact" class="btn btn-ghost">Talk to us</a>
                </div>
                <div class="trust-row">
                    <span><strong>99%</strong> faster HR access</span>
                    <span><strong>24/7</strong> team visibility</span>
                    <span><strong>3x</strong> cleaner workflow</span>
                </div>
                <div class="hero-feature-row">
                    <div><i class="fa-solid fa-fingerprint"></i> Secure employee records</div>
                    <div><i class="fa-solid fa-wand-magic-sparkles"></i> Automated daily operations</div>
                    <div><i class="fa-solid fa-chart-simple"></i> Cleaner management insights</div>
                </div>
            </div>
            <div class="col-lg-5 reveal reveal-delay">
                <div class="hero-panel command-panel">
                    <div class="panel-header">
                        <span></span><span></span><span></span>
                    </div>
                    <div class="command-title">
                        <small>Live Operations Command</small>
                        <b>Today</b>
                    </div>
                    <div class="panel-metric">
                        <div>
                            <small>Active workforce</small>
                            <strong>557</strong>
                        </div>
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="mini-progress">
                        <label>Payroll readiness <b>92%</b></label>
                        <div><span style="width:92%"></span></div>
                    </div>
                    <div class="mini-progress">
                        <label>Attendance synced <b>76%</b></label>
                        <div><span style="width:76%"></span></div>
                    </div>
                    <div class="panel-list">
                        <p><i class="fa-solid fa-check"></i> HR records organized</p>
                        <p><i class="fa-solid fa-check"></i> Departments connected</p>
                        <p><i class="fa-solid fa-check"></i> Registration logs tracked</p>
                    </div>
                    <div class="orbit-widget">
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="orbit-center"><i class="fa-solid fa-microchip"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="marquee-band" aria-label="Platform highlights" style="margin-bottom: 50px;">
    <div class="marquee-track">
        <span>HR automation</span>
        <span>Payroll readiness</span>
        <span>Attendance tracking</span>
        <span>Department control</span>
        <span>Registration logs</span>
        <span>Employee records</span>
        <span>HR automation</span>
        <span>Payroll readiness</span>
        <span>Attendance tracking</span>
        <span>Department control</span>
    </div>
</section>

<!-- 🟢 U SHTUA margin-top KËTU: -->
<section class="section-space quick-actions" style="margin-top: 60px;">
    <div class="container">
        <div class="quick-card reveal">
            <div>
                <span class="eyebrow">Fast start</span>
                <h2>One platform for daily employee operations.</h2>
            </div>
            <a class="btn btn-primary-modern" href="admin/login.php">Open admin</a>
        </div>
    </div>
</section>

<section class="section-space" id="solutions">
    <div class="container">
        <div class="section-title reveal">
            <span class="eyebrow">Solutions</span>
            <h2>Built for the work behind great teams.</h2>
            <p>Static image blocks are replaced with clean, animated solution cards that feel more like a real product website.</p>
        </div>

        <div class="solution-grid">
            <article class="solution-card reveal">
                <div class="card-glow"></div>
                <i class="fa-solid fa-user-plus"></i>
                <h3>Human Resources</h3>
                <p>Employee profiles, onboarding, departments and clear staff data in one place.</p>
            </article>
            <article class="solution-card reveal">
                <div class="card-glow"></div>
                <i class="fa-solid fa-diagram-project"></i>
                <h3>Project Management</h3>
                <p>Coordinate teams, organize responsibilities and keep operational work moving.</p>
            </article>
            <article class="solution-card reveal">
                <div class="card-glow"></div>
                <i class="fa-solid fa-money-check-dollar"></i>
                <h3>Payroll Management</h3>
                <p>Prepare payroll workflows with cleaner attendance and employee records.</p>
            </article>
            <article class="solution-card reveal">
                <div class="card-glow"></div>
                <i class="fa-solid fa-clock"></i>
                <h3>Attendance Tracking</h3>
                <p>Track registration logs and daily activity without scattered manual records.</p>
            </article>
        </div>
    </div>
</section>

<section class="section-space dark-section">
    <div class="container">
        <div class="stats-grid reveal">
            <div>
                <strong>133</strong>
                <span>Finished projects</span>
            </div>
            <div>
                <strong>557</strong>
                <span>Team members managed</span>
            </div>
            <div>
                <strong>432</strong>
                <span>Happy companies</span>
            </div>
            <div>
                <strong>32</strong>
                <span>Years combined experience</span>
            </div>
        </div>
    </div>
</section>

<section class="section-space" id="workflow">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 reveal">
                <span class="eyebrow">Workflow</span>
                <h2 class="split-title">A cleaner path from signup to daily management.</h2>
                <p class="muted">The old static step photos are replaced with a modern process timeline that works better on mobile and feels more premium.</p>
            </div>
            <div class="col-lg-7 reveal reveal-delay">
                <div class="timeline">
                    <div class="timeline-item">
                        <span>01</span>
                        <div>
                            <h3>Sign in</h3>
                            <p>Admin users access the protected dashboard securely.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span>02</span>
                        <div>
                            <h3>Organize records</h3>
                            <p>Create employees, departments and daily registration logs.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span>03</span>
                        <div>
                            <h3>Monitor operations</h3>
                            <p>Use the simplified dashboard to understand what matters fast.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <span>04</span>
                        <div>
                            <h3>Grow smarter</h3>
                            <p>Keep the data clean as the company scales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-space pricing-section" id="pricing">
    <div class="container">
        <div class="section-title reveal">
            <span class="eyebrow">Pricing</span>
            <h2>Simple plans for serious operations.</h2>
        </div>
        <div class="pricing-grid">
            <article class="price-card reveal">
                <i class="fa-solid fa-users"></i>
                <h3>Human Resources</h3>
                <strong>$199<span>/month</span></strong>
                <ul>
                    <li>Employee onboarding</li>
                    <li>Department management</li>
                    <li>Employee database</li>
                </ul>
                <a href="#contact">Learn more</a>
            </article>
            <article class="price-card featured reveal">
                <i class="fa-solid fa-layer-group"></i>
                <h3>Operations Suite</h3>
                <strong>$299<span>/month</span></strong>
                <ul>
                    <li>HR + registrations</li>
                    <li>Project coordination</li>
                    <li>Priority support</li>
                </ul>
                <a href="#contact">Request demo</a>
            </article>
            <article class="price-card reveal">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <h3>Payroll Management</h3>
                <strong>$399<span>/month</span></strong>
                <ul>
                    <li>Payroll preparation</li>
                    <li>Attendance insights</li>
                    <li>Compliance workflow</li>
                </ul>
                <a href="#contact">Learn more</a>
            </article>
        </div>
    </div>
</section>

<section class="cta-strip">
    <div class="container">
        <div class="cta-inner reveal">
            <div>
                <span class="eyebrow">Ready when you are</span>
                <h2>Upgrade your employee management system today.</h2>
            </div>
            <a class="btn btn-ghost light" href="#contact">Get started</a>
        </div>
    </div>
</section>

<section class="section-space contact-section" id="contact">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-5 mb-4 mb-lg-0 reveal">
                <div class="contact-copy">
                    <span class="eyebrow">Contact</span>
                    <h2>Tell us what your team needs.</h2>
                    <p>Send a request and it will be saved in the existing database contact table.</p>
                    <div class="contact-info">
                        <span><i class="fa-solid fa-location-dot"></i> Wellington Road, Street 32</span>
                        <span><i class="fa-solid fa-phone"></i> +1 234 567 890</span>
                        <span><i class="fa-solid fa-envelope"></i> hello@techsolutions.test</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 reveal reveal-delay">
                <div class="contact-container">
                    <h2>Request a consultation</h2>
                    <p>We will reply with a practical plan for your HR and operations workflow.</p>
                    <?php if ($contactMessage): ?>
                        <div class="alert alert-success"><?php echo htmlspecialchars($contactMessage); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="#contact">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="emri" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="mbiemri" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" required name="email">
                        </div>
                        <div class="form-group">
                            <label for="inputDepartamenti">Department</label>
                            <input class="form-control" name="departamenti" id="inputDepartamenti" type="text" placeholder="HR, Payroll, Operations..." required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="mesazhi" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary-modern btn-block" name="save">Send request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer-modern">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4">
                <a class="brand-lockup footer-brand" href="index.php">
                    <span class="brand-icon"><i class="fa-solid fa-bolt"></i></span>
                    Tech Solutions
                </a>
                <p>Employee management, HR automation and operations workflow in a clean PHP/MySQL application.</p>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h4>Platform</h4>
                <a href="#solutions">Solutions</a>
                <a href="#workflow">Workflow</a>
                <a href="#pricing">Pricing</a>
            </div>
            <div class="col-lg-2 col-md-4 mb-4">
                <h4>Account</h4>
                <?php if ($isLoggedIn): ?>
                    <a href="admin/index.php">Dashboard</a>
                    <a href="admin/logout.php">Logout</a>
                <?php else: ?>
                    <a href="admin/login.php">Login</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-3 col-md-4 mb-4">
                <h4>Social</h4>
                <div class="socials">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
<script>
    const nav = document.querySelector('.tech-nav');
    const revealItems = document.querySelectorAll('.reveal');

    window.addEventListener('scroll', () => {
        nav.classList.toggle('is-scrolled', window.scrollY > 20);
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.14 });

    revealItems.forEach((item) => observer.observe(item));
</script>
</body>
</html>

<?php
declare(strict_types=1);

// Static/portfolio deployment check. This project can run as a frontend-only
// landing page; backend/admin requires a separate MySQL setup.
header('Content-Type: text/plain; charset=utf-8');

$requiredFiles = [
    'index.php',
    'style1.css',
    'admin/images/video.mp4',
    'admin/images/system.jpg',
    'admin/images/system1.jpg',
    'admin/images/contact.jpg',
    'admin/images/parallax.jpg',
    'admin/images/parallax1.jpg',
    'admin/images/step1.jpg',
    'admin/images/step2.jpg',
    'admin/images/step3.jpg',
    'admin/images/step4.jpg',
    'admin/images/step5.jpg',
];

echo "Tech Solutions deploy check\n";
echo "PHP: " . PHP_VERSION . "\n";
echo "Mode: frontend-only portfolio\n";

$missing = [];
foreach ($requiredFiles as $file) {
    if (!is_file(__DIR__ . '/' . $file)) {
        $missing[] = $file;
    }
}

echo "Missing files: " . count($missing) . "\n";
foreach ($missing as $file) {
    echo "Missing: {$file}\n";
}

echo $missing ? "Status: upload missing assets\n" : "Status: ready\n";

<?php
// spl_autoload_register(function ($class) {
//     $prefix = 'Admin\\';
//     $base_dir = __DIR__ . '/';
//     $len = strlen($prefix);
//     if (strncmp($prefix, $class, $len) !== 0) {
//         return;
//     }
//     $relative_class = substr($class, $len);
//     $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
//     if (file_exists($file)) {
//         require $file;
//     }
// });

// Autoloader function
spl_autoload_register(function ($class) {
    // Define the base directory for the namespace prefix
    $base_dir = __DIR__ . '/admin/'; // Base directory to look for classes
    
    // Get the namespace and class name
    $prefix = 'Admin\\'; // Define the prefix
    $len = strlen($prefix); // Get the length of the prefix
    
    // Check if the class name starts with the prefix
    if (strncmp($prefix, $class, $len) !== 0) {
        // If not, exit the autoloader
        return;
    }
    
    // Remove the prefix from the class name to get the relative class name
    $relative_class = substr($class, $len);
    
    // Replace namespace separators with directory separators
    $file_path = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // If the file exists, require it
    if (file_exists($file_path)) {
        require $file_path;
    }
});

?>

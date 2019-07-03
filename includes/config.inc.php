<?php
/* This script:
 * - define constants and settings
 * - dictates how errors are handled
 * - defines useful functions
*/

// Document who created this site, when, why, etc.

// ************************************ //
// ************ SETTINGS ************** //

// Flag variable for site status:
    define('LIVE', FALSE);

// Admin Contact address:
    define('EMAIL', 'Insert adress Here');

// Site URL (base for all redirections):
    define('BASE_URL', 'http://localhost/');

// Location of MySQL connection script:
    define('MYSQL', '../mysqliconnection.php');

// Adjust the time zone:
    date_default_timezone_set('Zambia');

// ************************************ //
// ************ SETTINGS ************** //

// ******************************************** //
// ************ ERROR MANAGEMENT ************** //

//Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    // Biuld the error message:
    $message = "An error occured in script '$e_file' on life $e_line: $e_message\n";

    // Add the date and time:
    $message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n";

    if (!LIVE) { // Development(print the error).
        
        // Show the message error:
        echo '<div class="error">' .nl2br($message);

        // Add the variables and a backtrace:
        echo '<pre>' . print_r($e_vars, 1) . "\n";
        debug_print_backtrace();
        echo '</pre></div>';
    }else { // Don't show the error:

        // Send an email to the admin:
        $body= $message . "\n" . print_r($e_vars);
        mail(EMAIL, 'Site Error!', $body, 'From: email@example.com');

        // Only print an error message if the error isn't a notice:
            if ($e_number != E_NOTICE) {
                echo '<div class="error">A system error occurred. We apologize for the inconvinience.</div><br>';
            }
         
    }
}

// Use my error handler:
set_error_handler('my_error_handler');

// ******************************************** //
// ************ ERROR MANAGEMENT ************** //
?>
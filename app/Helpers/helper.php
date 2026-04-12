<?php

/** 
 * Dump and Die
 * * @param mixed $value
 * @return void 
 */

if (!function_exists('dd')) {
    function dd($data) {
        echo '<pre style="background: #1d1d1d; color: #00ff00; padding: 20px; border-radius: 8px; border: 1px solid #333; line-height: 1.5; font-family: monospace;">';
        echo "<strong>[DEBUG DUMP]</strong><br><br>";
        var_dump($data);
        echo '</pre>';
        die();
    }
}

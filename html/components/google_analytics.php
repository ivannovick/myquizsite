<?php
    if (!$subdomain)        
    {
        include('google_analytics_code.php');
    }
    else
    {
        echo "\n<!-- google analytics disabled for non-production site -->\n";
    }
?>

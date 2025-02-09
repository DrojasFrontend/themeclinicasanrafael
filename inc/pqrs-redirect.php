<?php
add_filter('wpcf7_special_mail_tags', 'custom_wpcf7_special_mail_tags', 10, 3);

function custom_wpcf7_special_mail_tags($output, $name, $html) {
    if ($name === 'wpcf7.departamento_mailto') {
        $submission = WPCF7_Submission::get_instance();
        
        if ($submission) {
            $posted_data = $submission->get_posted_data();
            $ciudad = $posted_data['departamento'];
            
            switch($ciudad) {
                case 'Armenia':
                    return 'danielrojas243@gmail.com';
                case 'Pereira':
                    return 'daniel.rojas@leggercolombia.com';
            }
        }
    }
    return $output;
}
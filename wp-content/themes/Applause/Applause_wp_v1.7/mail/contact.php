<?php

global $bub_mt;

            $absolute_path = __FILE__;
            $path_to_file = explode( 'wp-content', $absolute_path );
            $path_to_wp = $path_to_file[0];

            // Access WordPress
            require_once( $path_to_wp . '/wp-load.php' );
            if(!$_POST) exit;
            $bub_mt = get_option('bub_mt');
            $name = esc_html($_POST['name']);
            $email = esc_html($_POST['email']);
            $message = esc_html($_POST['message']);
            $msg = esc_attr('Name: ', 'applause') . $name . PHP_EOL;
            $msg .= esc_attr('E-mail: ', 'applause') . $email . PHP_EOL;
            $msg .= esc_attr('Message: ', 'applause') . $message;
            $to = $bub_mt['email'];
            $sitename = get_bloginfo('name');
            $subject = '[' . $sitename . ']' . ' New Message';
            $headers = 'From: ' . $name . ' <' . $email . '>' . PHP_EOL;
            if( wp_mail( $to, $subject, $msg, $headers));     
           // wp_mail($to, $subject, $msg, $headers);

?>
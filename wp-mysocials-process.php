<?php
echo 'coucou';
define('WP_USE_THEMES', false);
require($_SERVER['DOCUMENT_ROOT'].'/wp-blog-header.php');
//require_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php');

if(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD'])){
 
    $nameSender      = $_REQUEST['name'];   // this is the sender name
    $emailSender     = $_REQUEST['email'];  // Valid Email
    $page            = $_REQUEST['page'];
    $message         = 'Salut, voici une superbe page : '.$page.'
        
'.$_REQUEST['message']; // Message content of what you will send in this form
 
    $to          = $emailSender;
    $subject     = $_REQUEST['name'].' vous recommande cette page';
 
    /*$Subject = get_option('wpmysocial_on_subject');
	$Adminmail_Content = get_option('wpmysocial_adminmail_content');
	$Usermail_Content = get_option('wpmysocial_usermail_content');
    
	$Adminmail_Content = str_replace("&", "and", $Adminmail_Content);
	$Adminmail_Content = str_replace("##USERNAME##" , $SenderName , $Adminmail_Content);
	$Adminmail_Content = str_replace("##FRIENDEMAIL##" , $ToEmail , $Adminmail_Content);
	$Adminmail_Content = str_replace("##MESSAGE##" , $ToMessage , $Adminmail_Content);
	$Adminmail_Content = str_replace("##LINK##" , $Link , $Adminmail_Content);
	$Adminmail_Content = str_replace("\r\n", "<br />", $Adminmail_Content);
	$Adminmail_Content = str_replace("\n", "<br />", $Adminmail_Content);
	$Adminmail_Content = nl2br($Adminmail_Content);
	
	$Usermail_Content = str_replace("&", "and", $Usermail_Content);
	$Usermail_Content = str_replace("##USERNAME##" , $SenderName , $Usermail_Content);
	$Usermail_Content = str_replace("##FRIENDEMAIL##" , $ToEmail , $Usermail_Content);
	$Usermail_Content = str_replace("##MESSAGE##" , $ToMessage , $Usermail_Content);
	$Usermail_Content = str_replace("##LINK##" , $Link , $Usermail_Content);
	$Usermail_Content = str_replace("\r\n", "<br />", $Usermail_Content);
	$Usermail_Content = str_replace("\n", "<br />", $Usermail_Content);
	$Usermail_Content = nl2br($Usermail_Content);*/
    
    $headers = 'MIME-Version: 1.0';
    $headers .= 'Content-type: text/plain; charset=iso-8859-1';
    $headers .= "From: florenrc <contact@restezconnectes.fr>";
    $headers .= "Subject: $subject";
    $headers .= 'Bcc: On a recommande  <maillefaud.florent@gmail.com>';
    
    if($to){
        //@wp_mail( $to, $subject, $message, $headers );
        wp_mail( $to, $subject, $message, $headers );
    } else {
        $to = 'florent@restezconnectes.fr';
        if( mail($to, $subject, $message, $headers) ) {
            echo 'envoyé';
        } else {
        echo 'Erreur mailto (change $to)';
        }
    }
    //mail($to, $subject, $message, implode("\r\n", $headers));
    //mail($to, $subject, $message, $headers);
}
 
?>




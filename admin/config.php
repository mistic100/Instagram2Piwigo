<?php
if (!defined('INSTAG_PATH')) die('Hacking attempt!');

if (isset($_POST['save_config']))
{
  $conf['Instagram2Piwigo'] = array(
    'api_key' => trim($_POST['api_key']),
    'secret_key' => trim($_POST['secret_key']),
    );
  unset($_SESSION['phpinstagram_auth_token']);
  conf_update_param('Instagram2Piwigo', serialize($conf['Instagram2Piwigo']));
}


$template->assign(array(
  'Instagram2Piwigo' => $conf['Instagram2Piwigo'],
  'INSTAG_HELP_CONTENT' => load_language('help_api_key.html', INSTAG_PATH, array('return'=>true)),
  'INSTAG_CALLBACK' => get_absolute_root_url() . INSTAG_ADMIN . '-import',
  ));


$template->set_filename('Instagram2Piwigo', dirname(__FILE__) . '/template/config.tpl');

?>
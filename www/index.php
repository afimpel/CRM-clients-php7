<?php
/**
 * Example Application
 *
 * @package Example-application
 */
require_once "bootstrap.php";
$smarty = new Smarty;
$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 100;
//$smarty->assign("option_selected", "NE");
$smarty->display('index.tpl');

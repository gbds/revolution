<?php
/**
 * Loads the usergroup update page
 *
 * @package modx
 * @subpackage manager.security.usergroup
 */
if (!$modx->hasPermission('access_permissions')) return $modx->error->failure($modx->lexicon('access_denied'));

/* get usergroup */
$usergroup = $modx->getObject('modUserGroup',$_REQUEST['id']);

/* register JS scripts */
$modx->regClientStartupScript($modx->getOption('manager_url').'assets/modext/widgets/security/modx.grid.user.group.context.js');
$modx->regClientStartupScript($modx->getOption('manager_url').'assets/modext/widgets/security/modx.grid.user.group.resource.js');
$modx->regClientStartupScript($modx->getOption('manager_url').'assets/modext/widgets/security/modx.grid.user.group.category.js');
$modx->regClientStartupScript($modx->getOption('manager_url').'assets/modext/widgets/security/modx.panel.user.group.js');
$modx->regClientStartupScript($modx->getOption('manager_url').'assets/modext/sections/security/usergroup/update.js');

$modx->smarty->assign('_pagetitle',$modx->lexicon('user_group').': '.$usergroup->get('name'));
$this->checkFormCustomizationRules($usergroup);
return $modx->smarty->fetch('security/usergroup/update.tpl');
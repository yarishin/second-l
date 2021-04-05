<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<?php $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons', array('inline' => false)); ?>
<?php $this->layout = LAYOUT_NAME_001; ?>




<div class="g-bg-color--sky-light">
	<div class="container g-padding-y-80--xs g-padding-y-125--xsm" style="margin-top: 50px;text-align: center;">

<div id="content">
    <div id="error">
		<i class="material-icons" style="font-size: 20em;">emoji_nature</i><br>
		<h1>ご指定のURLは存在しません。</h1>
		
	</div>
	
	<form id="form" method="post" action="." name="form">
             <input class="kari_form_bt2" type="button" value="トップに戻る" onclick="location.href='<?php echo URL_SITE_TOP ?>'" tabindex="4">
    </form>
	
</div>
</div>
</div>

<?php
/**
 */

/**
 */
class EmailConfig {

//	public $default = array(
//		'transport' => 'Mail',
//		'from' => 'you@localhost',
//		//'charset' => 'utf-8',
//		//'headerCharset' => 'utf-8',
//	);

	public $auto = array(
		'transport'     => 'Smtp',
		'from'          => array('auto@second-l.jp' => '104_SECOND LIFE'),
		'host'          => 'second-l.jp',
		'port'          => 587,
		'timeout'       => 30,
		'username'      => 'auto',
		'password'      => '1qsx-2wdc-7Star',
		'client'        => null,
		'log'           => true,
		'charset'       => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $confirm = array(
		'transport'     => 'Smtp',
		'from'          => array('confirm@second-l.jp' => '104_SECOND LIFE'),
		'host'          => 'second-l.jp',
		'port'          => 587,
		'timeout'       => 30,
		'username'      => 'confirm',
		'password'      => '1qsx-2wdc-7Star',
		'client'        => null,
		'log'           => true,
		'charset'       => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $subscribe = array(
		'transport'     => 'Smtp',
		'from'          => array('subscribe@second-l.jp' => '104_SECOND LIFE'),
		'host'          => 'second-l.jp',
		'port'          => 587,
		'timeout'       => 30,
		'username'      => 'subscribe',
		'password'      => '1qsx-2wdc-7Star',
		'client'        => null,
		'log'           => true,
		'charset'       => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $support = array(
		'transport'     => 'Smtp',
		'from'          => array('support@second-l.jp' => '104_SECOND LIFE'),
		'host'          => 'second-l.jp',
		'port'          => 587,
		'timeout'       => 30,
		'username'      => 'support',
		'password'      => '1qsx-2wdc-7Star',
		'client'        => null,
		'log'           => true,
		'charset'       => 'utf-8',
		'headerCharset' => 'utf-8',
	);

//	public $fast = array(
//		'from' => 'you@localhost',
//		'sender' => null,
//		'to' => null,
//		'cc' => null,
//		'bcc' => null,
//		'replyTo' => null,
//		'readReceipt' => null,
//		'returnPath' => null,
//		'messageId' => true,
//		'subject' => null,
//		'message' => null,
//		'headers' => null,
//		'viewRender' => null,
//		'template' => false,
//		'layout' => false,
//		'viewVars' => null,
//		'attachments' => null,
//		'emailFormat' => null,
//		'transport' => 'Smtp',
//		'host' => 'localhost',
//		'port' => 25,
//		'timeout' => 30,
//		'username' => 'user',
//		'password' => 'secret',
//		'client' => null,
//		'log' => true,
//		//'charset' => 'utf-8',
//		//'headerCharset' => 'utf-8',
//	);
	
}

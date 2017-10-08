<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('app/Mage.php');
Mage::app();



Mage::log('# TESTE 1 ----------------------------------------------------------', null, 'hbsis_combo_sftp_test.log');

try {
	$connection = new Varien_Io_Sftp();
	$connection->open(array(
	    'host'     => '54.207.5.241',
	    'username' => 'ftp_ecommerce',
	    'password' => 'kdGtdasgt@4405tg@!'
	));

	$connection->cd('/data/hbsis/');
	$files = $connection->ls();
	Mage::log($files, null, 'hbsis_combo_sftp_test.log');

	$connection->cd('combo/');
	$files = $connection->ls();
	Mage::log($files, null, 'hbsis_combo_sftp_test.log');
} catch (Exception $e) {
	Mage::log($e, null, 'hbsis_combo_sftp_test.log');
}




Mage::log('# TESTE 2 ----------------------------------------------------------', null, 'hbsis_combo_sftp_test.log');

try {
	$environment = Mage::getStoreConfig('hbsis_combo_config/general/environment');
	Mage::log($environment, null, 'hbsis_combo_sftp_test.log');

	$config = Mage::getStoreConfig('hbsis_combo_config/ftp_' . $environment);
	Mage::log($config, null, 'hbsis_combo_sftp_test.log');

	$connection = new Varien_Io_Sftp();
	$connection->open(array(
	    'host' => $config['hostname'],
	    'username' => $config['username'],
	    'password' => $config['password']
	));

	$connection->cd('/data/hbsis/');
	$files = $connection->ls();
	Mage::log($files, null, 'hbsis_combo_sftp_test.log');

	$connection->cd('combo/');
	$files = $connection->ls();
	Mage::log($files, null, 'hbsis_combo_sftp_test.log');
} catch (Exception $e) {
	Mage::log($e, null, 'hbsis_combo_sftp_test.log');
}
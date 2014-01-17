<?php
require_once 'autoload.php';

use \Symfony\Component\Console\Helper\HelperSet;
use \Symfony\Component\Console\Helper\DialogHelper;
use \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;

// Any way to access the EntityManager from  your application
$diContainer = sspmod_janus_DiContainer::getInstance();
$em = $diContainer->getEntityManager();

$tablePrefix = $diContainer->getSymfonyContainer()->getParameter('database_prefix');
define('DB_TABLE_PREFIX', $tablePrefix);

$helperSet = new HelperSet(array(
    'dialog' => new DialogHelper(),
    'db' => new ConnectionHelper($em->getConnection()),
    'em' => new EntityManagerHelper($em)
));
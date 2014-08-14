<?php
use Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;
$raizConfig = dirname(__FILE__);
require dirname(__FILE__) . "/set_AplicationEnv.php";
require ROOTFOLDER . "/Doctrine/Common/ClassLoader.php";


/*--------------- Class Loaders por namespaces-----------------*/
$classLoader = new \Doctrine\Common\ClassLoader('Doctrine',ROOTFOLDER);
$classLoader->register(); // register on SPL autoload stack

$classLoader = new \Doctrine\Common\ClassLoader('Symfony', "$raizConfig/Doctrine");
$classLoader->register();

$classLoader2 = new \Doctrine\Common\ClassLoader('Entities', "$raizConfig/");
$classLoader2->register(); // register on SPL autoload stack

$classLoader2 = new \Doctrine\Common\ClassLoader('Business', "$raizConfig/");
$classLoader2->register(); // register on SPL autoload stack

$classLoader2 = new \Doctrine\Common\ClassLoader('Utils', "$raizConfig/");
$classLoader2->register(); // register on SPL autoload stack



$classLoader4 = new \Doctrine\Common\ClassLoader('classes',"$raizConfig/");
$classLoader4->register(); // register on SPL autoload stack


$classLoader5 = new \Doctrine\Common\ClassLoader('fpdf',"$raizConfig/");
$classLoader5->register(); // register on SPL autoload stack
/*--------------------- Configuracao do cach ------------------*/
//if(APPLICATION_ENV == "development")
 $cache = new \Doctrine\Common\Cache\ArrayCache;
//else if(APPLICATION_ENV == "production")
// $cache = new \Doctrine\Common\Cache\ApcCache();

/*-------------------------------------------------------------*/
 
 $config = new Configuration();
 $config->setMetadataCacheImpl($cache);
 $driverImpl = $config->newDefaultAnnotationDriver('./Entities');
 $config->setMetadataDriverImpl($driverImpl);
 $config->setQueryCacheImpl($cache);
 $config->setProxyDir($raizConfig .'/Entities/Proxies');
 $config->setProxyNamespace('MyProject\Proxies');
 $config->setAutoGenerateProxyClasses(true);
 
if(APPLICATION_ENV == "development"){
	$conn = array(
	    'dbname' => 'jtqrcode',
	    'user' => 'root',
	    'password' => '123',
	    'host' => 'localhost',
	    'driver' => 'pdo_mysql',
	);
}
else if(APPLICATION_ENV == "production"){
	$conn = array(
	    'dbname' => 'jtqrcode',
	    'user' => 'jtqrcode',
	    'password' => 'Content@sys201',
	    'host' => 'jtqrcode.db.9904985.hostedresource.com',
	    'driver' => 'pdo_mysql',
	);
}
global $em;
$em = EntityManager::create($conn, $config);

function getEm(){
global $em;
	return $em;
}

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

require_once ROOTFOLDER . "/includes/utils.php";

?>
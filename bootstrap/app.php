<?php 

session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
		'settings' => [
		'displayErrorDetails' => true,
		]
	]);

$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ .'/../resources/view', [
        'cache' => FALSE
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};


require __DIR__ . '/../app/routes.php';

$app->run();
?>


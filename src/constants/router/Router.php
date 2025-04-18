<?php



namespace Uas_ProgWeb\constants\router;

require_once __DIR__ . '/../../../config/database.php';

class Router
{
  private static $routes = [];

  public static function add(string $method, string $path, string $controller, string $function): void
  {
    self::$routes[] = [
      'method' => strtoupper($method),
      'path' => $path,
      'controller' => $controller,
      'function' => $function
    ];
  }

  public static function run(): void
  {
    global $pdo;

    $path = $_SERVER['PATH_INFO'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];

    foreach (self::$routes as $route) {
      if ($path === $route['path'] && strtoupper($method) === $route['method']) {
        $controller = new $route['controller']($pdo);
        $function = $route['function'];
        $controller->$function();
        return;
      }
    }

    http_response_code(404);
    echo "404 Not Found";
  }
}

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
      'path' => $path,   // Rute ini akan diterima
      'controller' => $controller,
      'function' => $function
    ];
  }


  public static function run(): void
  {
    global $pdo;

    $requestUri = $_SERVER['REQUEST_URI'];
    //        echo "Requested Path: " . $requestUri . "<br>"; // Debugging untuk path yang diminta
    $scriptName = $_SERVER['SCRIPT_NAME'];
    //        echo "Requested Path: " . $scriptName . "<br>"; // Debugging untuk path yang diminta
    // Bersihkan base path (misalnya: /UAS_progWeb/index.php) dari URI
    $base = str_replace('\\', '/', dirname($scriptName));
    //        echo "Requested Path: " . $base . "<br>";
    $path = str_replace($base, '', parse_url($requestUri, PHP_URL_PATH));
    //        echo "Requested Path: " . $path . "<br>"; // Debugging untuk path yang diminta
    $path = rtrim($path, '/') ?: '/';
    //        echo "Requested Path: " . $path . "<br>"; // Debugging untuk path yang diminta
    $method = $_SERVER['REQUEST_METHOD'];

    //        echo "Requested Path: " . $path . "<br>"; // Debugging untuk path yang diminta

    // Periksa apakah ada rute yang cocok menggunakan regex
    foreach (self::$routes as $route) {
      //            echo "Checking route: " . $route['path'] . "<br>";  // Debugging untuk rute yang diperiksa
      //            echo "Method: " . strtoupper($method) . " URL Method: " . $route['method'] . "<br>";

      if (preg_match("#^{$route['path']}$#", $requestUri, $matches) && strtoupper($method) === $route['method']) {
        //                echo "Route matched! Executing controller: " . $route['controller'] . "<br>"; // Debugging untuk controller yang dipanggil
        if (isset($matches[1])) {
          //                    echo "ID parameter received: " . $matches[1] . "<br>"; // Debugging untuk ID yang diterima
          $controller = new $route['controller']($pdo);
          $controller->{$route['function']}($matches[1]);
        } else {
          //                    echo "No ID received, using default controller method.<br>";
          $controller = new $route['controller']($pdo);
          $controller->{$route['function']}();
        }
        return;
      }
    }

    http_response_code(404);
    //        echo "404 Not Found (path: $requestUri)";
  }
}

<?php 

echo "db url: ${getenv('DATABASE_URL')}\n";
echo "host: ${getenv('DB_HOST')}\n";
echo "port: ${getenv('DB_PORT')}\n";
echo "database: ${getenv('DB_DATABASE')}\n";
echo "username: ${getenv('DB_USERNAME')}\n";
echo "password: ${getenv('DB_PASSWORD')}\n";
echo "unix_socket: ${getenv('DB_SOCKET')}\n";

?>

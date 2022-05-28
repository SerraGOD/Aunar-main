#activar servicios sh
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
composer install
echo $'\e[0;31m'se ejecuto instalacion servicio composer$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
npm audit fix
npm install
echo $'\e[0;31m'se instalo npm$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
php artisan key:generate
echo $'\e[0;31m'se restablecio key$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
composer require laravel/ui --dev
echo $'\e[0;31m'se cargo libreria ui$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
php artisan ui bootstrap --auth
echo $'\e[0;31m'se cargo el auth de laravel ....$'\e[0m'
echo $'\e[0;31m'Desea ejecutar el servicio$'\e[0m'
read -p $'\e[33m'"Press [Enter] key to continue..."$'\e[0m' foo
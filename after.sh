#!/usr/bin/env bash
echo I am provisioning...
cd Norum
php artisan migrate --seed
echo DataBase seeded c:
#!/usr/bin/env bash
echo I am provisioning...
cd norum
php artisan migrate --seed
echo DataBase seeded c:
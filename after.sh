#!/usr/bin/env bash
echo I am provisioning...
cd norum
php artisan migrate:refresh --seed
echo DataBase seeded c:
#!/bin/bash
set -e

while [ ! -d /var/www/src/Fallout/GameBundle/Resources/frontend ]; do
    echo "Waiting for package.json..."
    sleep 2s;
done

cd /var/www/src/Fallout/GameBundle/Resources/frontend
npm install;
./node_modules/.bin/webpack;

#exec "$@"

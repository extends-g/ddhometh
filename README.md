# ddhometh

*Install*
- composer update
- sf assets:install web --symlink --env=dev


*Install Database*
- sf doctrine:database:drop --force (ถ้ามี DB แล้ว)
- sf doctrine:database:create
- sf doctrine:schema:update --dump-sql --force
- sf doctrine:fixture:load

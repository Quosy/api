# Quosy API

![apiplatform](https://api-platform.com/logo.png)


This projet as been created using [API Platform Framework](https://api-platform.com) `2.3` with `Symfony 4.1.1`
# Install 

```
composer install

edit u're .env and set DATABASE_URL=sqlite:///%kernel.project_dir%/var/data.db

php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

```

# Features

- [x] Graphql
- [x] Manage members
- [x] Manage activities
- [x] Manage users

# Todo

- [x] Add Test
- [x] Add Login & register
- [x] Add Jwt
- [ ] Add Filters
- [x] Add php-cs-fixer
- [ ] Monolog
- [ ] phpunit
# Quosy API

This projet as been creanoted using [API Platform Framework](https://api-platform.com)

![apiplatform](https://dunglas.fr/slides/forum-php-2015/img/api-platform-logo-500x500.png)

# Install 

```
composer install
php bin/console doctrine:database:drop --force
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force

```

Todo :
- Add Test
- Add login/register
- Add JWT
- Add filters
- Enable Graphql

# Leboncoin-like

Site fictif sur la base du site leboncoin.fr

Trello : https://trello.com/b/SN4xUBQP/projet-leboncoin-like 
Gitlab : https://gitlab.com/Lucas-allard/leboncoin-like
Github : https://github.com/Lucas-allard

# Environnement de développement

# Pré-requis

* PHP 7.4
* Composer
* Symfony CLI
* Docker
* Docker compose
* PHP Unit
* PHP Stan

Vous pouvez vérifier les pré-requis (sauf Docker et docker compose) avec la commande suivante (de la CLI Symfony) : 

```bash 
symfony check-requirements
```

### Lancer l'envrionnement de développement

```bash
docker-compose up -d
npm install 
npm run build
```

### Lancer les test 

```bash
php bin/phpunit --testdox
```

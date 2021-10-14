# Mise en place env de dev

- Démarrer le conteneur avec la base de données:
```
docker-compose up -d
```

- Installer les dépendances
```
symfony composer install
```

- Créer le schéma de la base de données
```
symfony console doctrine:migrations:migrate
```

- Remplir la base de données :
```
symfony console doctrine:fixtures:load
```

- Démarrer le serveur
```
symfony server:start -d
```

- Identifiant de connexion
login : rom.chalum@gmail.com
mdp : romain






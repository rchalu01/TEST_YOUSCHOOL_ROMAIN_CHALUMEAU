# Mise en place env de dev

- Démarrer le serveur
```
symfony server:start -d
```

- Démarrer la base de données:
```
docker-compose up -d
```

- Remplir la base de données :
```
symfony console doctrine:fixtures:load
```


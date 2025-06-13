# Projet de Gestion d'Événements

Ce projet est un site web de gestion d'événements développé en PHP avec une architecture MVC, utilisant Bootstrap 5 pour le design, et MySQL pour la base de données. Le site est en français et conçu pour être hébergé localement avec Laragon.

---

## Fonctionnalités principales

- Page d'accueil dynamique affichant les événements à venir
- Espace administrateur complet (connexion, gestion des événements, visualisation des inscriptions)
- Espace utilisateur fonctionnel (inscription, connexion, liste des événements, historique des inscriptions)
- Authentification sécurisée avec sessions et hachage des mots de passe
- Base de données relationnelle MySQL avec tables utilisateurs, événements, inscriptions
- Design responsive adapté aux mobiles et tablettes
- Sécurité contre les injections SQL et gestion des erreurs
- Interface intuitive avec un style moderne "disco"
- Documentation utilisateur et guide d'installation

---

## Installation et Hébergement Local avec Laragon

1. **Installer Laragon**  
   Téléchargez et installez Laragon depuis [https://laragon.org/](https://laragon.org/).

2. **Copier le projet**  
   Placez le dossier `events-mgmt` dans le répertoire `www` de Laragon (ex: `C:\laragon\www\events-mgmt`).

3. **Créer la base de données**  
   - Lancez Laragon et ouvrez phpMyAdmin (via le menu Laragon).  
   - Créez une base de données nommée `events_db`.  
   - Importez le fichier `database/events_db.sql` pour créer les tables.

4. **Configurer la connexion à la base de données**  
   - Ouvrez le fichier `config/database.php`.  
   - Modifiez les paramètres `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS` selon votre configuration Laragon.

5. **Lancer le serveur**  
   - Dans Laragon, démarrez Apache et MySQL.  
   - Accédez à `http://localhost/events-mgmt` dans votre navigateur.

---

## Transfert vers un autre poste

- Copiez le dossier `events-mgmt` sur une clé USB ou via un réseau.  
- Répétez les étapes d'installation sur le nouveau poste.  
- Assurez-vous que Laragon est installé et configuré.  
- Importez la base de données via phpMyAdmin.

---

## Structure du projet

- `index.php` : point d'entrée principal (front controller)  
- `config/` : fichiers de configuration (base de données, paramètres)  
- `controllers/` : contrôleurs MVC (gestion des requêtes)  
- `models/` : modèles MVC (accès aux données)  
- `views/` : vues MVC (templates HTML avec Bootstrap)  
- `public/` : ressources publiques (CSS, JS, images)  
- `database/` : scripts SQL pour la base de données

---

## Guide rapide du code

- Le routeur dans `index.php` redirige vers les contrôleurs selon l'URL.  
- Les contrôleurs appellent les modèles pour récupérer ou modifier les données.  
- Les vues affichent les pages HTML avec Bootstrap 5.  
- La sécurité est assurée par des sessions PHP et le hachage des mots de passe avec `password_hash`.  
- Les requêtes SQL utilisent des requêtes préparées pour éviter les injections.

---

## Contact

Pour toute question, contactez l'auteur du projet.


# Roadmap du projet de gestion de post-it

**Légende**  
- **F1** : Fonctionnalité primaire  
- **F2** : Fonctionnalité secondaire  
- **\*** : Niveau de difficulté

---

## Étapes Ghi-chu

### Page d'inscription (F1 **)

#### Mise en place d’un système de gestion d’erreurs :
- Champs requis : nom, prénom, date de naissance, email, mot de passe
- Vérification : mot de passe === confirmation mot de passe
- Expression régulière : 
  - Email : format `@domaine.indicateur`
  - Mot de passe : à définir
- Contrôle des champs au fur et à mesure
- Si une erreur est détectée :
  - Afficher les messages d’erreur
- Interdire l’inscription aux utilisateurs de moins de 17 ans

#### Envoi des données au back-end pour vérifications :
- Prévention d’injections de scripts (XSS, etc.)
- Si l’email existe déjà :
  - Message : "Cet utilisateur existe déjà. Veuillez vous connecter" (lien)
  - Lien : "J’ai oublié mon mot de passe" (restauration)

### Page de connexion (F1 **)

#### Vérification des informations de connexion :
- Vérification email et mot de passe
- Contrôle en temps réel des champs
- Si erreur :
  - Afficher les messages d’erreur
  - Vider le champ mot de passe

#### Envoi au back-end :
- Si email inexistant :
  - Message : "Vous n’avez pas de compte" (lien d’inscription)
- Si mot de passe incorrect :
  - Message : "Mot de passe incorrect, veuillez réessayer" (vider le champ)
- Si tout est correct : connexion

### Déconnexion (F1 **)

- Bouton de déconnexion
- Déconnexion automatique après un temps d’inactivité

### Réinitialisation du mot de passe oublié (F2 **)

#### Système de réinitialisation :
- Envoi d’un email de restauration
- Vérification : mot de passe === confirmation mot de passe
  - Si non : afficher erreur
  - Si oui : soumettre le formulaire

#### Vérifications back-end :
- Si le nouveau mot de passe est identique à l’ancien :
  - Message : "Vous avez déjà utilisé ce mot de passe"
- Sinon :
  - Mise à jour du mot de passe
  - Redirection vers la page de connexion

#### Difficultés :
- Comprendre le système d’envoi d’emails
- Gérer les liens sécurisés pour la modification

### Changement du mot de passe (F2 **)

#### Interface utilisateur :
- Contrôle en temps réel des champs
- Renseigner :
  - Ancien mot de passe
  - Nouveau mot de passe
  - Confirmation du nouveau mot de passe
- Vérifications :
  - Ancien === nouveau → erreur
  - Nouveau === confirmation → sinon erreur

#### Vérifications back-end :
- Nouveau mot de passe déjà utilisé → erreur
- Sinon :
  - Mise à jour du mot de passe
  - Déconnexion
  - Redirection vers la connexion

### Modification des informations utilisateur (F2 **)

#### Interface utilisateur :
- Contrôle en temps réel des champs :
  - Nom, prénom, date de naissance, email, photo de profil
- Si les nouvelles infos === anciennes :
  - Erreur
- Sinon : envoi du formulaire

#### Vérifications back-end :
- Si correspondance avec anciennes données → erreur
- Sinon : mise à jour

### Création d’un post-it (F1 **)

#### Création :
- Formulaire :
  - Titre (limite de caractères)
  - Contenu (limite de caractères)
- Contrôle des champs en temps réel

#### Vérifications back-end :
- Formatage des données (sécurité)
- Si titre déjà utilisé :
  - Ajout automatique d’un suffixe → `monTitre(1)`

### Modification d’un post-it (F1 **)

#### Modification :
- Modification du contenu uniquement
- Vérification du nombre de caractères
- Optionnel : vérifier si le contenu a changé

#### Vérifications back-end :
- Formatage
- Si contenu modifié : mise à jour
- Sinon : message d’erreur

### Partage d’un post-it (F1 ****)

#### Système de partage :
- Recherche par email ou nom (AJAX)
- Méthode de recherche
- Sélection multiple
- Attribution des droits : lecture seule ou écriture

### Notification de partage par email (F2 ****)

#### Notification :
- Lors du partage, envoi d’un email à l’utilisateur :
  - "Le post-it X a été partagé avec vous par l’utilisateur A"
  - Spécification des droits

#### Difficultés :
- Mise en place d’un serveur SMTP (lié au nom de domaine)
- Configuration de l’envoi d’emails via PHP

### Archivage des post-it (F2 *)

#### Fonctionnement :
- Suppression → déplacement dans une zone d’archivage
- Archivage supprimé après un délai **t** (à définir)

### Restauration d’une archive (F2 *)

#### Fonctionnement :
- Bouton "Restaurer"

### Création d’une nouvelle version (F2 **)

#### Système de versionning :
- Bouton "Créer une nouvelle version"
- Copie des infos du post-it actuel
- Formulaire pré-rempli (en attente de modif)
- Application de la logique de modification
- Ajout en base si validation OK

### Revenir à une version antérieure (F2 ****)

#### Navigation entre versions :
- Liste des versions disponibles
- Sélection d’une version → option "Restaurer"

#### Back-end :
- Mise à jour de la table post-it avec les données de la version choisie
- Optionnel : rechargement de la page

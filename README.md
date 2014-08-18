# DisclaimerBundle

Bundle facilitant la mise en place de mentions légales dans votre site sous Symfony 2

## Installation

1/ Ajoutez cette ligne dans votre `composer.json`
```
"rudak/disclaimer-bundle": "dev-master"
```
2/ Ajoutez le bundle dans le kernel
```
new Rudak\Bundle\DisclaimerBundle\RudakDisclaimerBundle()
```
3/ Ajoutez le routing suivant qui pointe vers le `RudakDisclaimerBundle` dans votre `app/config/routing.yml`
```
rudak_disclaimer:
    resource: "@RudakDisclaimerBundle/Resources/config/routing.yml"
    prefix: /
```
4/ (Optionnel) Vous pouvez ajouter `"doctrine/doctrine-fixtures-bundle": "2.2.*"` dans le require de votre `composer.json` si vous avez l'intention d'utiliser les fixtures. (Une commande est disponible pour remplir les attributs de l'objet DisclaimerData avec des valeurs par defaut).
## Utilisation

Il y a trois possibilités possibles pour l'instant :

 - Administration
     - Afficher les informations
     - Editer les informations
 - Afficher la vue finale

Le routing peut etre modifié pour afficher des URL personalisées, notamment celles de la partie administration qui se contente de prefixer l'URL avec `admin/`.
Les vues pointées par les controlleurs sont envoyées dans la vue `layout.html.twig`qui peut être facilement surchargée et renvoyée dans des blocks twig au milieu de votre contenu.
## TODO
 - Une ligne de commande simple permettant de rentrer les informations unes a unes afin de gagner en rapidité d'installation, (à condition de disposer de toutes les informations dès le début)...
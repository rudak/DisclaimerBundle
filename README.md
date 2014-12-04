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

4/ Par defaut la page de mention légales s'affiche dans une page HTML basique qui n'a rien a voir avec votre design (j'espere) vous pouvez surcharger le bundle et modifier le layout.html.twig de sortie pour qu'il intégre votre layout principal


5/ (Optionnel) Vous pouvez ajouter `"doctrine/doctrine-fixtures-bundle": "2.2.*"` dans le require de votre `composer.json` si vous avez l'intention d'utiliser les fixtures. (Une commande est disponible pour remplir les attributs de l'objet DisclaimerData avec des valeurs par defaut).
## Utilisation

Il y a trois possibilités possibles pour l'instant :

 - Administration
     - Afficher les informations
     - Editer les informations
 - Afficher la vue finale

Le routing peut etre modifié pour afficher des URL personalisées, notamment celles de la partie administration qui se contente de prefixer l'URL avec `admin/`.
Les vues pointées par les controlleurs sont envoyées dans la vue `layout.html.twig`qui peut être facilement surchargée et renvoyée dans des blocks twig au milieu de votre contenu.

Il est possible aussi de surcharger facilement tout ce qui se trouve dans le bundle. Ce lien est assez clair je pense : `http://symfony.com/fr/doc/current/cookbook/bundles/inheritance.html`. Donc la bonne pratique serait de surcharger le `layout.html.twig` et d'étendre votre vue contenant le design du site. Ainsi en 3 minutes les mentions legales seront intégrées au reste du site. Il est possible aussi grace à cette méthode de surcharger la vue `disclaimer.html.twig` et d'en modifier le contenu. C'est comme ca que je fais pour ajouter un petit grid bootstrap qui va bien...
## Ligne de commande
Il est possible d'initialiser les données directement dans le terminal, aussitot le bundle installé (et la BDD à jour).
Voici la commande:
```php app/console disclaimer:init```
Répondez aux questions et c'est réglé...


## TODO
 - Ajouter possibilité de traduction (à voir si les mentions légales sont portables sont les mêmes ici et 'la bas'...)
 - Refactoriser et découpler quelques trucs

## Algorithme Rendue Monnaie en PHP

**Objectif :** Créer une fonction en PHP qui calcule le nombre minimum de billets et pièces à rendre au client en fonction d'un prix à payer et du montant donné par le client.

**Énoncé :**

Vous êtes en charge de développer un algorithme pour un système de caisse qui doit rendre la monnaie au client lorsque ce dernier paie un certain montant pour un produit ou un service. L'algorithme doit être écrit en PHP et prendra en compte les billets et pièces suivants pour effectuer le rendu de monnaie :

**Billets disponibles :** 200€, 100€, 50€, 20€, 10€, 5€

**Pièces disponibles :** 2€, 1€, 50cts, 20cts, 10cts, 5cts, 2cts, 1cts

Votre tâche consiste à créer une fonction nommée `rendreMonnaie` qui prendra deux paramètres en entrée :

1. Le prix à payer en euros (un nombre entier ou à virgule flottante).
2. Le montant donné par le client en euros (un nombre entier ou à virgule flottante).

La fonction devra calculer la somme à rendre et déterminer le nombre minimum de billets et pièces à rendre au client en utilisant les valeurs disponibles listées ci-dessus. L'algorithme devra utiliser les billets et pièces de valeurs croissantes pour minimiser leur nombre tout en rendant la somme exacte.

Enfin, la fonction devra afficher le résultat sous la forme suivante :

```
Montant à rendre : [montant à rendre en euros] €
Nombre de [billets/pièces] de [valeur] € : [nombre]
```

**Exemple :**
Supposons que le prix à payer soit 175€ et que le client donne 200€. La fonction devra indiquer qu'il faut rendre 1 billet de 20€ et 1 billet de 5€.

**Note :**
Assurez-vous que le montant donné par le client est suffisant pour couvrir le prix à payer. Vous pouvez supposer que les valeurs fournies seront cohérentes et positives.
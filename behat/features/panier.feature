# language: fr
Fonctionnalité: Gestion du panier TechShop
  En tant que client
  Je veux gérer mon panier
  Afin de préparer ma commande

  Scénario: Un panier vide a un total de zéro
    Étant donné que mon panier est vide
    Alors le total de mon panier est 0 €

  Scénario: Ajouter un article au panier
    Étant donné que mon panier est vide
    Quand j'ajoute "Clavier USB" à 49.99 € au panier
    Alors mon panier contient 1 article
    Et le total de mon panier est 49.99 €

  Scénario: Retirer un article du panier
    Étant donné que mon panier est vide
    Et j'ai ajouté "Souris" à 19.99 € au panier
    Quand je retire "Souris" du panier
    Alors le total de mon panier est 0 €

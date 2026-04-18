# language: fr
Fonctionnalité: Codes promotionnels TechShop
  En tant que client
  Je veux utiliser un code promo
  Afin d'obtenir une réduction sur ma commande

  Contexte:
    Étant donné que mon panier est vide

  Plan du scénario: Appliquer un code promo valide
    Quand j'ajoute "Article" à <prix_initial> € au panier
    Et j'applique le code promo "<code>" de <reduction>%
    Alors le total de mon panier est <prix_final> €

    Exemples:
      | code      | prix_initial | reduction | prix_final |
      | RENTRÉE   | 100.00       | 15        | 85.00      |
      | SOLDES    | 200.00       | 50        | 100.00     |
      | BIENVENUE | 49.99        | 10        | 44.99      |

  Scénario: Code promo avec pourcentage invalide
    Quand j'essaie de créer un code promo "ERREUR" avec 0%
    Alors une erreur est levée avec le message "pourcentage invalide"

<?php

// Produits avec informations de prix et quantité
$panier = [
    ["article" => "Livre", "prix_unitaire" => 15, "quantite" => 2],
    ["article" => "Stylo", "prix_unitaire" => 3, "quantite" => 5],
    ["article" => "Sac", "prix_unitaire" => 25, "quantite" => 1]
];

// Calcul du total pour chaque produit
function calculerMontant($prix, $quantite) {
    return $prix * $quantite;
}

// Fonction pour calculer le total général du panier
function calculerTotalPanier($panier) {
    $total = 0;
    foreach ($panier as $produit) {
        $total += calculerMontant($produit['prix_unitaire'], $produit['quantite']);
    }
    return $total;
}

// Affichage du contenu du panier avec les montants
function afficherPanier($panier) {
    echo "<table border='1'>";
    echo "<tr><th>Article</th><th>Prix Unitaire</th><th>Quantité</th><th>Total</th></tr>";

    foreach ($panier as $produit) {
        $montant = calculerMontant($produit['prix_unitaire'], $produit['quantite']);

        echo "<tr>";
        echo "<td>{$produit['article']}</td>";
        echo "<td>{$produit['prix_unitaire']}€</td>";
        echo "<td>{$produit['quantite']}</td>";
        echo "<td>{$montant}€</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Calcul et affichage du total avec ou sans réduction
function afficherTotalAvecRemise($total) {
    echo "<p>Montant total : {$total}€</p>";

    if ($total > 50) {
        $reduction = $total * 0.10;
        $totalRemise = $total - $reduction;
        echo "<p>Remise de 10% : -{$reduction}€</p>";
        echo "<p>Total après remise : {$totalRemise}€</p>";
    } else {
        echo "<p>Aucune remise applicable.</p>";
    }
}

// Exécution des fonctions pour afficher le panier et le total final
afficherPanier($panier);
$total = calculerTotalPanier($panier);
afficherTotalAvecRemise($total);

?>

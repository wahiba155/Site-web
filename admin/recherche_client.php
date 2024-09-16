<?php
include('etablissement.php');
if(isset($_GET['search'])) {
    $search = $_GET['search'];
// Construire la requête SQL en fonction de la recherche
$sql = "SELECT * FROM clients WHERE nom_complet LIKE '%$search%' OR email LIKE '%$search%' OR Adresse LIKE '%$search%' OR Tele LIKE '%$search%'";

$result = $conn->query($sql);

// Vérification si des résultats sont retournés
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        // Afficher les données du client
        echo "<tr>";
                  echo "<td>
                      <span class=\"custom-checkbox\">
                          <input type=\"checkbox\" id=\"checkbox1\" name=\"options[]\" value=\"1\">
                          <label for=\"checkbox1\"></label>
                      </span>
                  </td>";
                  echo "<td>" . $row["nom_complet"] . "</td>";
                  echo "<td>" . $row["email"] . "</td>";
                  echo "<td>" . $row["Adresse"] . "</td>";
                  echo "<td>" . $row["Tele"] . "</td>";
                  echo '<td>
                  <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-client-id="' . $row["id_client"] . '">
                  <i class="material-icons" data-toggle="tooltip" title="Supprimer">&#xE872;</i>
                </a>
                        </td>';                
                  echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Aucun client trouvé</td></tr>";
}
}
?>
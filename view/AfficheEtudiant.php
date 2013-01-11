
<div class="container">
		<div class="row">
			<legend>Informations Etudiant<legend>
			<div class="span6 offset3">					
					<table class="table table-condensed">  
						<thead>
							  <tr>  
								<th>Nom</th>  
								<th>Prénom</th>  
								<th>Diplome</th>
								<th>Année</th> 								
							  </tr>  
						</thead>  
							<tbody>  
							  <tr>  
								<?php
									echo '<td>' . $Membre->getNom() . '</td>';  
									echo '<td>' . $Membre->getPrenom() . '</td>';
									echo '<td>' . $Membre->getDiplome() . '</td>';
									echo '<td>' . $Membre->getAnnee() . '</td>';
								?>
							  </tr>
							</tbody>  
					</table> 
			</div>
		</div>	
</div>

	<div class="container">
		<div class="row">
			<div class="span6 offset3">
				<legend>Liste Emprunt et Réservation<legend>
					
					<table class="table table-hover">  
						<thead>  
							  <tr>  
								<th>Livre</th>  
								<th>Auteur</th>  
								<th>Début emprunt</th> 																
								<th>Fin emprunt</th> 	
								<th>Date réservation</th> 																
							  </tr>  
							</thead>  
							<tbody>  
							  <tr>  
								<td><a href="Livre.html"> <u>timon et pumba</u></td>  
								<td>toto</td>  
								<td>10/10/10</td>
								<td>10/10/10</td>
							  </tr>  
							  <tr>  
								<td><a href="livre2.html"> <u>akunamatata</u></td>  
								<td>tototo</td>  
								<td>12/12/12</td>
								<td>12/12/12</td>
							  </tr>  
							  <tr>  
								<td><a href="etudiantZ.html"> <u>Carlos</u></td>  
								<td>titi</td>  
								<td>13/13/13</td>
								<td>13/13/13</td>
							  </tr>  
							</tbody>  
					</table> 
			</div>
		</div>	
</div>

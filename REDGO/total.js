function calcul_total(laclasse)
{
var nbLignes = document.getElementById("tab").rows.length;

	document.getElementById('total').value = 0;
	for (i=1;i<nbLignes;i++){
		document.getElementById('total').value= parseFloat(document.getElementById('total').value) + parseFloat(document.getElementById('laclasse'+i).value); 
	}
}

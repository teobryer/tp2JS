/**
 * 
 */

function generateTemperaturesTable(tab, tableau, cumul=true) {
	for (let i = 0; i < tab.length; i++) {
		var row = document.createElement("tr");
		var c1 = document.createElement("td");
		c1.innerHTML = tab[i][0];
		var c2 = document.createElement("td");
		c2.innerHTML = tab[i][1];
		row.appendChild(c1);
		row.appendChild(c2);
	if(cumul) {
		tableau.appendChild(row);
	} else {
		if(oldrow = tableau.rows[1]) {
			console.debug(oldrow);
			tableau.removeChild(oldrow);
		}
		tableau.appendChild(row);
		}		
	}
}

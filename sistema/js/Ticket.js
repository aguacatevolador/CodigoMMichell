<script>

	switch(tiket) {
	case 'ticketventas':
	var resultado = calculo.sumas(bmil,bquinientos);
                document.getElementById('resultado').innerHTML="<pre>"+
                'Biletes de $1,000°° = '+ bmil+'<br>'+
                '$ '+Bmil+'<br>'+
                'Biletes de $500°°   = '+ bquinientos+'<br>'+
                '$ '+Bquinientos+'<br>'+
                'Biletes de $200°°   = '+ bdosientos+'<br>'+
                '$ '+Bdosientos+'<br>'+
                'Biletes de $100°°   = '+ bcien+'<br>'+
                '$ '+Bcien+'<br>'+
                'Biletes de $50°°    = '+ bcincuenta+'<br>'+
                '$ '+Bcincuenta+'<br>'+
                'Biletes de $20°°    = '+ bveinte+'<br>'+
                '$ '+Bveinte+'<br>'+
                'Monedas de $50°°    = '+ mcincuenta+'<br>'+
                '$ '+Mcincuenta+'<br>'+
                'Monedas de $20°°    = '+ mveinte+'<br>'+
                '$ '+Mveinte+'<br>'+
                'Monedas de $10°°    = '+ mdiez+'<br>'+
                '$ '+Mdiez+'<br>'+
                'Monedas de $5°°     = '+ mcinco+'<br>'+
                '$ '+Mcinco+'<br>'+
                'Monedas de $2°°     = '+ mdos+'<br>'+
                '$ '+Mdos+'<br>'+
                'Monedas de $1°°     = '+ muno+'<br>'+
                '$ '+Muno+'<br>'+
                'Monedas de $.50     = '+ mcincos+'<br>'+
                '$ '+Mcincos+'<br>'+
                'Total == '+resultado+"</pre>"+'<br><br><br>'+
				'Firma:_______________'

				 window.print();
				 window.location.reload();
				 break;


	case 'ticketabonos':
	var resultado = calculo.sumas(bmil,bquinientos);
                document.getElementById('resultado').innerHTML="<pre>"+
                'Biletes de $1,000°° = '+ bmil+'<br>'+
                '$ '+Bmil+'<br>'+
                'Biletes de $500°°   = '+ bquinientos+'<br>'+
                '$ '+Bquinientos+'<br>'+
                'Biletes de $200°°   = '+ bdosientos+'<br>'+
                '$ '+Bdosientos+'<br>'+
                'Biletes de $100°°   = '+ bcien+'<br>'+
                '$ '+Bcien+'<br>'+
                'Biletes de $50°°    = '+ bcincuenta+'<br>'+
                '$ '+Bcincuenta+'<br>'+
                'Biletes de $20°°    = '+ bveinte+'<br>'+
                '$ '+Bveinte+'<br>'+
                'Monedas de $50°°    = '+ mcincuenta+'<br>'+
                '$ '+Mcincuenta+'<br>'+
                'Monedas de $20°°    = '+ mveinte+'<br>'+
                '$ '+Mveinte+'<br>'+
                'Monedas de $10°°    = '+ mdiez+'<br>'+
                '$ '+Mdiez+'<br>'+
                'Monedas de $5°°     = '+ mcinco+'<br>'+
                '$ '+Mcinco+'<br>'+
                'Monedas de $2°°     = '+ mdos+'<br>'+
                '$ '+Mdos+'<br>'+
                'Monedas de $1°°     = '+ muno+'<br>'+
                '$ '+Muno+'<br>'+
                'Monedas de $.50     = '+ mcincos+'<br>'+
                '$ '+Mcincos+'<br>'+
                'Total == '+resultado+"</pre>"+'<br><br><br>'+
				'Firma:_______________'

				 window.print();
				 window.location.reload();
				 break;			 
}
</script>

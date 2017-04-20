
</div>
<div id="Footer">Copiright&nbsp;<span id="yearNum"></span></div>
</div>
<script>
function getNumberOfYear(){
	var D = new Date();
	var year = D.getFullYear();
	return stringYear.innerHTML = year;	
}
var stringYear = document.getElementById('yearNum');
window.onload = getNumberOfYear();
</script>
</body>
</html>

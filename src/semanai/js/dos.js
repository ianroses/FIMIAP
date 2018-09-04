// JavaScript Document


function show1(){
	
	var dorado= document.getElementById("uno").value;

document.getElementById("one").innerHTML="<p>TOTAL: $"+(dorado*137500)+"MXN<br>IVA: $"+ ((dorado*137500)*0.15)+" MXN<br>ENVÍO GRATIS</p>";}


function show2(){
	
	var rosa= document.getElementById("dos").value;

document.getElementById("two").innerHTML="<p>TOTAL: $"+(rosa*140500)+" MXN<br>IVA: $"+ ((rosa*140500)*0.15)+" MXN<br>ENVÍO GRATIS</p>";}

function show3(){
	
	var blu= document.getElementById("tres").value;

document.getElementById("tree").innerHTML="<p>TOTAL: $"+(blu*130500)+"MXN<br>IVA: $"+ ((blu*130500)*0.15)+" MXN<br>ENVÍO GRATIS</p>";}
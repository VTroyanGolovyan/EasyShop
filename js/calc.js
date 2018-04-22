 function recalc(){
			 var w1 = document.getElementById('in1').value;
			 var hw1 = document.getElementById('in2').value;
			 var d1 = document.getElementById('in3').value;
			 var w2 = document.getElementById('in4').value;
			 var hw2 = document.getElementById('in5').value;
			 var d2 = document.getElementById('in6').value;
			 var d1 = 2*w1*hw1/100 + d1*25.4;
			 var d2 = 2*w2*hw2/100 + d2*25.4;
		
			 var rez =Math.round((d2 - d1)/d2 * 10000)/100;
			 document.getElementById('out').innerHTML = (rez > 0 ? "Показания спидометра выростут на " : "Показания спидометра упадут на ") + Math.abs(rez) + "%";
		 }
		 recalc();

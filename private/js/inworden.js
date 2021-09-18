//console.log(inWorden(77777779.44));
function inWorden(nn){
		var first=["","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Ninteen"],

			first_des=["Zero","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Ninteen"],

			second=["","","Tweenty","Therty","Fourty","Fifty","Sixty","Seventy","Eighty","Ninty"],

			unit=["Hundred","Thousand","Lakh","Crore"],

			int_number=parseFloat(nn),
			fullnumber=int_number.toString(),
			spl=fullnumber.split("."),
			number=spl[0],
			desplace=spl[1];

		function dec(ddd){ //Function for Showing Decimal place
			if(ddd!=null){
				if(ddd.length>1){
					return " point "+first_des[ddd[0]]+" "+first_des[(ddd[1])];
				}
				else if(ddd.length==1){
					return " point "+first_des[ddd[0]];
				}
			}
			else {
				return "";
			}
		}

			//First Two Degit Reading function start here for use in re use in another function like hundred.
			function first2degred(number){
				var word=first[number];
				if(word!=null){
					return word;
				}

				else if(word==null && number.length<3){
					word=second[number[0]]+" "+first[number[1]];
					return word;
				}
			}

			//First Two Degit Reading function end here


			//This is function to First Two Degit counting after decimal
			function first2deg(number){
				var stnumber=parseInt(number);
				var number=stnumber.toString();
				var word=first[number];

				if(word!=null){
					return word+dec(desplace);
				}

				else if(word==null && number.length<3){
					word=second[number[0]]+" "+first[number[1]];
					return word+dec(desplace);
				}
			}

			//Hundred Start here
			function hundred(number){
				if(number.length==3){
					subnum=number[1]+number[2];
						if(number[0]<1){
							unit[0]="";
						}
						word= first[number[0]]+" "+unit[0]+" "+first2deg(subnum);
						return word;
					
				}
			}
			//Hundred End here

			//Thousand Start here
			function thousand(number){
				if(number.length==4){
					subnum=number[1]+number[2]+number[3];
					if(number[0]<1){
						unit[1]="";
					}
					word= first[number[0]]+" "+unit[1]+" "+hundred(subnum);
					return word;
				}
				else if(number.length==5){
					subnum=number[2]+number[3]+number[4];
					if (number[0]!='0') {
						word= first2degred(number[0]+number[1])+" "+unit[1]+" "+hundred(subnum);
					}
					else if(number[1]!='0'){
						word=first2degred(number[1])+" "+unit[1]+hundred(subnum);
					}
					else{
						word=hundred(subnum);
					}
					return word;
				}
			}
			//Thousand End here	

			//Lakh Start here
			function lakh(number){
				if(number.length==6){
					subnum=number[1]+number[2]+number[3]+number[4]+number[5];
					if(number[0]<1){
						unit[2]="";
					}
					word= first[number[0]]+" "+unit[2]+" "+thousand(subnum);
					return word;
				}
				else if(number.length==7){
					subnum=number[2]+number[3]+number[4]+number[5]+number[6];
					if (number[0]!='0') {
						word= first2degred(number[0]+number[1])+" "+unit[2]+" "+thousand(subnum);
					}
					else if(number[1]!='0'){
						word= first2degred(number[1])+" "+unit[2]+" "+thousand(subnum);
					}
					else{
						word=thousand(subnum);
					}
					return word;
				}
			}
			//Lakh End here

			//Crore Start here
			function crore(number){
				if(number.length==8){
					subnum=number[1]+number[2]+number[3]+number[4]+number[5]+number[6]+number[7];
					word= first[number[0]]+" "+unit[3]+" "+lakh(subnum);
					return word;
				}
				else if(number.length==9){
					subnum=number[2]+number[3]+number[4]+number[5]+number[6]+number[7]+number[8];
					word= first2degred(number[0]+number[1])+" "+unit[3]+" "+lakh(subnum);
					return word;
				}
			}
			//Crore End here


			//Calling the Functions
				if(number.length<3){
					return first2deg(number);
				}
				else if(number.length<4){
					return hundred(number);
				}
				else if(number.length<6){
					return thousand(number);
				}
				
				else if(number.length<8){
					return lakh(number);
				}
				else if(number.length<10){
					return crore(number);
				}
	}
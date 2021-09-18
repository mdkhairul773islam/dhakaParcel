//console.log(inWordbn(77777779.44));
function inWordbn(nn){
		var first=["","এক", "দুই", "তিন", "চার", "পাঁচ", "ছয়", "সাত", "আট", "নয়", "দশ", "এগার", "বার", "তের", "চৌদ্দ", "পনের", "ষোল", "সতের", "আঠার", "উনিশ", "বিশ", "একুশ", "বাইশ", "তেইশ", "চব্বিশ", "পঁচিশ", "ছাব্বিশ", "সাতাশ", "আঠাশ", "ঊনত্রিশ", "ত্রিশ", "একত্রিশ", "বত্রিশ", "তেত্রিশ", "চৌত্রিশ", "পঁয়ত্রিশ", "ছত্রিশ", "সাঁয়ত্রিশ", "আটত্রিশ", "ঊনচল্লিশ", "চল্লিশ", "একচল্লিশ", "বিয়াল্লিশ", "তেতাল্লিশ", "চুয়াল্লিশ", "পঁয়তাল্লিশ", "ছয়চল্লিশ", "সাতচল্লিশ", "আটচল্লিশ", "ঊনপঞ্চাশ", "পঞ্চাশ", "একান্ন", "বায়ান্ন", "তিপ্পান্ন", "চুয়ান্ন", "পঞ্চান্ন", "ছাপ্পান্ন", "সাতান্ন", "আটান্ন", "ঊনষাট", "ষাট", "একষট্টি", "বাষট্টি", "তেষট্টি", "চৌষট্টি", "পঁয়ষট্টি", "ছয়ষট্টি", "সাতষট্টি", "আটষট্টি", "ঊনসত্তর", "সত্তর", "একাত্তর", "বাহাত্তর", "তিয়াত্তর", "চুয়াত্তর", "পঁচাত্তর", "ছিয়াত্তর", "সাতাত্তর", "আটাত্তর", "ঊনআশি", "আশি", "একাশি", "বিরাশি", "তিরাশি", "চুরাশি", "পঁচাশি", "ছিয়াশি", "সাতাশি", "অাটাশি", "ঊননব্বই", "নব্বই", "একানব্বই", "বিরানব্বই", "তিরানব্বই", "চুরানব্বই", "পঁচানব্বই", "ছিয়ানব্বই", "সাতানব্বই", "আটানব্বই", "নিরানব্বই"],

			first_des=["শূণ্য","এক", "দুই", "তিন", "চার", "পাঁচ", "ছয়", "সাত", "আট", "নয়", "দশ", "এগার", "বার", "তের", "চৌদ্দ", "পনের", "ষোল", "সতের", "আঠার", "উনিশ", "বিশ", "একুশ", "বাইশ", "তেইশ", "চব্বিশ", "পঁচিশ", "ছাব্বিশ", "সাতাশ", "আঠাশ", "ঊনত্রিশ", "ত্রিশ", "একত্রিশ", "বত্রিশ", "তেত্রিশ", "চৌত্রিশ", "পঁয়ত্রিশ", "ছত্রিশ", "সাঁয়ত্রিশ", "আটত্রিশ", "ঊনচল্লিশ", "চল্লিশ", "একচল্লিশ", "বিয়াল্লিশ", "তেতাল্লিশ", "চুয়াল্লিশ", "পঁয়তাল্লিশ", "ছয়চল্লিশ", "সাতচল্লিশ", "আটচল্লিশ", "ঊনপঞ্চাশ", "পঞ্চাশ", "একান্ন", "বায়ান্ন", "তিপ্পান্ন", "চুয়ান্ন", "পঞ্চান্ন", "ছাপ্পান্ন", "সাতান্ন", "আটান্ন", "ঊনষাট", "ষাট", "একষট্টি", "বাষট্টি", "তেষট্টি", "চৌষট্টি", "পঁয়ষট্টি", "ছয়ষট্টি", "সাতষট্টি", "আটষট্টি", "ঊনসত্তর", "সত্তর", "একাত্তর", "বাহাত্তর", "তিয়াত্তর", "চুয়াত্তর", "পঁচাত্তর", "ছিয়াত্তর", "সাতাত্তর", "আটাত্তর", "ঊনআশি", "আশি", "একাশি", "বিরাশি", "তিরাশি", "চুরাশি", "পঁচাশি", "ছিয়াশি", "সাতাশি", "অাটাশি", "ঊননব্বই", "নব্বই", "একানব্বই", "বিরানব্বই", "তিরানব্বই", "চুরানব্বই", "পঁচানব্বই", "ছিয়ানব্বই", "সাতানব্বই", "আটানব্বই", "নিরানব্বই"]

//			second=["","","Tweenty","Therty","Fourty","Fifty","Sixty","Seventy","Eighty","Ninty"],

			unit=["শত","হাজার","লক্ষ","কোটি"],

			int_number=parseFloat(nn),
			fullnumber=int_number.toString(),
			spl=fullnumber.split("."),
			number=spl[0],
			desplace=spl[1];

		function dec(ddd){ //Function for Showing Decimal place
			if(ddd!=null){
				if(ddd.length>1){
					return " দশমিক "+first_des[ddd[0]]+" "+first_des[(ddd[1])];
				}
				else if(ddd.length==1){
					return " দশমিক "+first_des[ddd[0]];
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
/*
				else if(word==null && number.length<3){
					word=second[number[0]]+" "+first[number[1]];
					return word;
				}*/
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
/*
				else if(word==null && number.length<3){
					word=second[number[0]]+" "+first[number[1]];
					return word+dec(desplace);
				}*/
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
						word=first2degred(number[1])+" "+unit[1]+" "+hundred(subnum);
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
					return first2deg(number).replace("  ","");
				}
				else if(number.length<4){
					return hundred(number).replace("  ","");
				}
				else if(number.length<6){
					return thousand(number).replace("  ","");
				}
				
				else if(number.length<8){
					return lakh(number).replace("  ","");
				}
				else if(number.length<10){
					return crore(number).replace("  ","");
				}
	}


var read = (x)=>document.querySelector(x);
(()=>{
window.addEventListener('load', ()=>{
	var not_found = `<h4 class="not_found">Nothing Found !</h4>`;
	var search_field_brand  = read("#search_field_brand");

	var wrapper    = read('#search_suggest');
	var search     = read("input[name='search']");
	if(wrapper && search){
		search.addEventListener('focus', ()=>{
			wrapper.classList.add('open');
			if(search.value==""){
				wrapper.innerHTML = `<h4 class="not_found">Search Your Favorite Product...</h4>`;				
			}
		});

		search.addEventListener('keyup', ()=>{
			searchProduct();
		});
		
		search_field_brand.addEventListener('change', ()=>{
			searchProduct();
		});
	}

	window.addEventListener('click', (event)=>{
		var target = event.target;
		if(target && wrapper && !target.closest('.search_form')){
			wrapper.classList.remove('open');
		}
	});

	var timeout = null;
	function searchProduct(){
		if(search.value!=''){
			if(timeout){clearTimeout(timeout);}
			timeout=setTimeout(()=>{
				var where = {
					key:search.value,
				}
				if(search_field_brand && search_field_brand.value!=''){
					Object.assign(where, {'brand_id':search_field_brand.value});
				}
				axios.post(url+"Frontend/HomeController/get_products", makeFormData(where))
				.then(response=>{
					console.log((response.data));
					if((response.data).length>0){
						var items = '';
						Object.values(response.data).forEach((item)=>{
							items += rendarItem(item);
						});
						wrapper.innerHTML = items;
					}
					else {
						wrapper.innerHTML = `<h4 class="not_found">Noting Found...</h4>`;	
					}
				})
				.catch(err=>console.log(err));
			}, 400);
		}else{
			wrapper.innerHTML = `<h4 class="not_found">Search Your Favorite Product...</h4>`;	
		}
	}

	function rendarItem(item){
		var parameter = btoa(item.id);
		var text = `
			<a href="${url+'products/'+parameter+'/'+(item.title).replaceAll(' ', '-').replaceAll('/', '-')}" class="search_product">
			    <img src="${url+item.feature_photo}" alt="">
			    <span class="title">
			        <h5>${item.title}</h5>
			        <p></p>
			    </span>
			    <h6>${(!item.quantity || item.quantity==0)?'Sold Out':''}</h6>
			    <span class="offer">(-${item.discount}% Off)</span>
			    <span class="price">
			        <h5>${(item.sale_price)?item.sale_price+'TK':''}</h5>
			    </span>
			</a>
		`;
		return text;
	}
	
});
})()
import Vue from 'vue';
class customJs {
	constructor(){
		Vue.prototype.$custom = customJs.methods();
	}

	// Remove debounce of tag
	static cart(isCart){
		//console.log(isCart);
		let isLoading = document.querySelector('#isLoading');
		if(isLoading && isCart)
		{
			isLoading.classList.add('col-9');
			isLoading.classList.remove('col-12');
		}
		else if(isLoading){
			isLoading.classList.add('col-12');
			isLoading.classList.remove('col-9');
		}
	}

	// class Object
	static methods(){
		return {
			isCart:function(x){ customJs.cart(x); }
		}
	}
}

export const custom = new customJs();
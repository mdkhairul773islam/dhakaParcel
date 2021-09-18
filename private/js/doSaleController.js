// do sale controller
app.controller('DOSale', function($scope, $http) {
	$scope.cart = [];
	$scope.presentBalance = 0.00;
	$scope.message = "";
	$scope.transactionBy="cash";

	$scope.amount = {
		labour : 0,
		total: 0,
		discount: 0,
		truck_rent : 0,
		grandTotal: 0,
		paid: 0,
		due: 0
	};


	$scope.doNo = [];

	$scope.setAllBrand = function(){
		var condition = {
			table: 'stock',
			cond: {
				category: $scope.category,
				type: 'do'
			},
			column: 'subcategory'
		};

		$http({
			method: 'POST',
			url: url + 'readDistinct',
			data: condition
		}).success(function(response){
			$scope.allSubcategory = response;
		});
	}

	$scope.setAllProducts = function(){
		var condition = {
			table: 'stock',
			cond: {
				category: $scope.category,
				subcategory: $scope.subcategory,
				type: 'do'
			},
			column: 'product_name'
		};

		$http({
			method: 'POST',
			url: url + 'readDistinct',
			data: condition
		}).success(function(response){
			$scope.allProducts = response;
		});
	}


    //set all do no
	$scope.setAllDONoFn = function(){
		$scope.allDONO = [];

		var condition = {
			table: 'stock',
			cond: {
				category: $scope.category,
				subcategory: $scope.subcategory,
				product_name: $scope.product,
				type: 'do'
			}
		};

		$http({
			method: 'POST',
			url: url + 'read',
			data: condition
		}).success(function(response){
			if(response.length > 0){
				angular.forEach(response, function(items, key){
					if((items.do_in - items.do_out) > 0){
						$scope.allDONO.push(items);
					}
				 });
		     }else{
			  $scope.allDONO = [];
		   }
		});
	}



	//get all available do stock from db
	$scope.getdoStockFn = function(){

		var where = {
			table : "stock",
			cond : { do_no : $scope.do_no}
		};

		$http({
			method : "POST",
			url : url + "read",
			data : where
		}).success(function(response){
			$scope.unit = response[0].unit;
			$scope.available = (response[0].do_in - response[0].do_out) + " " + response[0].unit + "s   Available!";
		    $scope.remainingStock = (response[0].do_in - response[0].do_out);
		});
	};


  // match object from object's array function
	var findObject = function(main, obj) {
		var hasitem = -1,
			objLength = Object.keys(obj).length,
			temp = [],
			data = [];

		[].forEach.call(main, function(row, index) {
			var allKeys = Object.keys(row),
				newobj = [];

			[].forEach.call(allKeys, function(item, key){
				newobj[key] = false;

				if (main[index][item] == obj[item]) {
					newobj[key] = true;
				}
			});

			temp.push(newobj);
		});

		[].forEach.call(temp, function(item, key) {
			var counter = 0,
				current = true;

			[].forEach.call(item, function(element) {
				if(element == current) {
					counter++;
				}
			});

			data.push(counter)
		});

		return data.indexOf(objLength);
	}



	$scope.mainobject = [];
	$scope.addNewProductFn = function(){
		if(typeof $scope.product !== 'undefined' && $scope.remainingStock >0){
			$scope.active = false;
			var condition = {
				table: 'stock',
				cond: {
					do_no : $scope.do_no,
					category: $scope.category,
					subcategory: $scope.subcategory,
					product_name: $scope.product,
					unit: $scope.unit,
					godown: $scope.showroom_id,
					showroom_id: $scope.showroom_id,
					type: 'do'
				}
			};

			$http({
				method: 'POST',
				url: url + 'read',
				data: condition
			}).success(function(response){
				angular.forEach(response, function(item){
					//Getting purchase price Start here
					var condd = {
						table: 'products',
						cond: {product_name: item.product_name}
					};

					$http({
						method: 'POST',
						url: url + 'read',
						data: condd
					}).success(function(product_info){
						//Getting purchase price End here
						var brand  =  (item.subcategory).replace(/ /gi, "-").toLowerCase();
						var newItem = {
							do_no : item.do_no,
							product: item.product_name,
							product_code: item.product_code,
							category: item.category,
							subcategory: item.subcategory,
							brand : brand,
							godown: item.godown,
							price: parseFloat(item.sell_price),
							maxQuantity: (parseInt(item.do_in) - parseInt(item.do_out)),
							stock_qty: item.do_in,
							quantity: 1.00,
							unit: $scope.unit,
							discount: 0.00,
							subtotal: 0.00,
							godown: item.godown,
							purchase_price: parseFloat(item.purchase_price)
						};

						var tempobject = {
							brand: brand,
							dono: item.do_no
						};


					  	// single product entry
					  	if(findObject($scope.mainobject, tempobject) < 0) {
					  		$scope.cart.push(newItem);
					  		$scope.mainobject.push(tempobject);
					  	}
					});
				});
			});
		}
	}


	$scope.setSubtotalFn = function(index){
		$scope.cart[index].subtotal = $scope.cart[index].price * $scope.cart[index].quantity;
		return $scope.cart[index].subtotal;
	}

	$scope.purchaseSubtotalFn = function(index){
		$scope.cart[index].purchase_subtotal = $scope.cart[index].purchase_price * $scope.cart[index].quantity;
		return $scope.cart[index].purchase_subtotal;
	}

	$scope.getTotalFn = function(){
		var total = 0;
		angular.forEach($scope.cart, function(item){
			total += parseFloat(item.subtotal);
		});

		$scope.amount.total = total;
		return $scope.amount.total;
	}

	$scope.getPurchaseTotalFn = function(){
		var total = 0;
		angular.forEach($scope.cart, function(item){
			total += parseFloat(item.purchase_subtotal);
		});

		$scope.amount.purchase_total = total;
		return $scope.amount.purchase_total;
	}

	/* $scope.getGrandTotalFn = function(){
		var grand_total = 0.0;
		grand_total = parseFloat($scope.amount.total - $scope.amount.discount - $scope.commission.total) + parseFloat($scope.amount.truck_rent) + parseFloat($scope.amount.labour);
		return $scope.amount.grandTotal = grand_total.toFixed(2);
	}*/

	$scope.getGrandTotalFn = function(){
		var grand_total = 0.0;
		grand_total = (parseFloat($scope.amount.total) - parseFloat($scope.amount.truck_rent) - parseFloat($scope.amount.discount)) + parseFloat($scope.amount.labour);
		return $scope.amount.grandTotal = grand_total.toFixed(2);
	}

	$scope.getCurrentTotalFn = function(){
		var total = 0.00;

		if($scope.partyInfo.sign == 'Receivable'){
			total = ($scope.partyInfo.balance + parseFloat($scope.amount.grandTotal)) - $scope.amount.paid;

			if(total > 0) {
				$scope.partyInfo.csign = "Receivable";
			} else if(total < 0) {
				$scope.partyInfo.csign = "Payable";
			} else {
				$scope.partyInfo.csign = "Receivable";
			}
		} else {
			total = ($scope.partyInfo.balance + $scope.amount.paid) - parseFloat($scope.amount.grandTotal);

			if(total > 0) {
				$scope.partyInfo.csign = "Payable";
			} else if(total < 0) {
				$scope.partyInfo.csign = "Receivable";
			} else {
				$scope.partyInfo.csign = "Receivable";
			}
		}

		$scope.amount.due = total.toFixed(2);
		$scope.presentBalance = Math.abs(total.toFixed(2));

		//console.log("Current Balance =>" +  $scope.presentBalance);
		//console.log("Current Sign =>" + $scope.partyInfo.csign);
		//console.log("Credit Limit =>" + $scope.partyInfo.limit);

		if($scope.partyInfo.csign == "Receivable" && $scope.presentBalance <= $scope.partyInfo.limit){
        	$scope.active = false;
					$scope.message = "";
        }else if($scope.partyInfo.csign == "Payable"){
        	$scope.active = false;
					$scope.message = "";
        }else{
        	$scope.active = true;
					$scope.message = "Grand Total is being crossed the Credit Limit!";
        }

		return $scope.presentBalance;
	}





	$scope.deleteItemFn = function(index){
		$scope.cart.splice(index, 1);
	}

	$scope.partyInfo = {
		code: '',
		name: '',
		contact: '',
		address: '',
		balance: 0.00,
		payment: 0.00,
		limit : 0.00,
		sign: 'Receivable',
		csign: 'Receivable'
	};


	$scope.findPartyFn = function(){
		if(typeof $scope.partyCode != 'undefined'){
			var condition = {
				from: 'parties',
				join: 'partybalance',
				cond: 'parties.code=partybalance.code',
				where: {'parties.code': $scope.partyCode , 'partybalance.brand' : $scope.cart[0].brand}
			};
		console.log(condition);

			$http({
				method: 'POST',
				url: url + 'readJoinData',
				data: condition
			}).success(function(response){

				if(response.length > 0){
					$scope.partyInfo.balance = Math.abs(parseFloat(response[0].balance));

					if(parseFloat(response[0].balance) > 0) {
						$scope.partyInfo.sign = "Payable";
					} else if(parseFloat(response[0].balance) < 0) {
						$scope.partyInfo.sign = "Receivable";
					} else {
						$scope.partyInfo.sign = "Receivable";
					}

					$scope.partyInfo.code = response[0].code;
					$scope.partyInfo.name = response[0].name;
					$scope.partyInfo.contact = response[0].contact;
					$scope.partyInfo.address = response[0].address;
					$scope.partyInfo.limit = response[0].credit_limit;
				} else {
					$scope.partyInfo = {};

					$scope.partyInfo.balance = 0.00;
					$scope.partyInfo.sign = "Receivable";
				}
				console.log($scope.partyInfo);

			});
		}

	}

	// console.log($scope.Balance);


	// get commission total
	$scope.commission = {
		quantity : 0,
		amount : 0,
		total: 0.0
	};

	// get less total
	$scope.less = {
		quantity : 0,
		amount : 0
	};

	// get Truck total
	$scope.truck = {
		quantity : 0,
		amount : 0
	};

	$scope.totalQuantityFn = function() {
		var total = 0;

		angular.forEach($scope.cart, function(item, index){
			total += item.quantity;
		});

		$scope.truck.quantity = total;
		$scope.commission.quantity = total;

		return $scope.truck.quantity;
	}

	$scope.getTruckTotal = function(){
		return $scope.amount.truck_rent = (parseFloat($scope.truck.quantity) * parseFloat($scope.truck.amount)).toFixed(2);
	};

	$scope.getCommissionTotal = function(){
		return $scope.commission.total = (parseFloat($scope.commission.quantity) * parseFloat($scope.commission.amount)).toFixed(2);
	};

	$scope.getLessTotal = function(){
		return $scope.amount.discount = (parseFloat($scope.less.quantity) * parseFloat($scope.less.amount)).toFixed(2);
	};


});

app.controller("editPurchaseController", ["$scope", "$http", "$log", "$axios", function ($scope, $http, $log, $axios){
	//
	$scope.supplier = null;
	$scope.cart     = [];
	$scope.total    = {
		s_price   : 0,
		p_price   : 0,
		sub_total : 0,
		qty       : 0
	};
	$scope.credential = {
		discount 	: 0,
		paid     	: 0,
		grand_total : 0,
		balance 	: 0,
		due			: 0,
		type  		: 'N/A'
	};
	$scope.supplier_id 	 = '';
	$scope.sap_record_id = '';
	$scope.supplier_name = '';

	$scope.$watch('sap_record_id', ()=>{
		if($scope.sap_record_id){
			$http({
				method  : "POST",
				url 	: url+'ajax/purchaseInvoice',
				data    : {
					sap_record_id:$scope.sap_record_id
				}
			})
			.success(response=>{
				angular.forEach(response.items, (item)=>{
					item.price 			= +item.sale_price;
					item.sale_price 	= +item.sale_price;
					item.purchase_price = +item.purchase_price;
					item.qty 			= +item.quantity;
					$scope.cart.push(item);
				});

				if(response.supplier){
					$scope.supplier 		 = response.supplier;
					$scope.supplier.balance -= response.record.grand_total;
					$scope.supplier_id = +(response.supplier).id;
				}

				$scope.credential.paid 	   = response.record.paid;
				$scope.credential.discount = response.record.discount;
				$scope.supplier_name 	   = response.record.supplier_name;
			});
		}
	});


	$scope.$watch('product_id', ()=>{
		if($scope.product_id)
		{
			var permision = true;
			angular.forEach($scope.cart, (item)=>{
				if(item.product_id==$scope.product_id){
					permision = false;
				}
			});
			if(permision){
				$http({
					method  : "POST",
					url 	: url+'ajax/getProducts',
					data    : {
						where : {
							product_id:$scope.product_id
						}
					}
				})
				.success(response=>{
					if(response.length>0){
						var item 			= response[0];
						item.product_id 	= +item.id;
						item.purchase_price = +item.price;
						item.sale_price 	= +item.price;
						item.qty 		= 1;
						item.total 		= 0;
						$scope.cart.push(item);					
					}
				});
			}
		}
	});


	// item Remove
	$scope.remove = function(index){
		$scope.cart.splice(index, 1);
	} 

	// SUM TOTAL
	$scope.getsum = function(index){

		return $scope.cart[index].total = $scope.cart[index].sale_price * $scope.cart[index].qty;
	}

	$scope.getSubTotal = function(){
		$scope.total.s_price =  $scope.total.p_price = $scope.total.qty = $scope.total.sub_total = 0;
		angular.forEach($scope.cart, (item)=>{
			$scope.total.s_price   += +item.sale_price;
			$scope.total.p_price   += +item.purchase_price;
			$scope.total.qty 	   += +item.qty;
			$scope.total.sub_total += +item.total;
		});
		return $scope.total.sub_total;
	}

	$scope.getGrandTotal = function()
	{
		var supp_balance 		  = ($scope.supplier ? $scope.supplier.initial_balance : 0);
		$scope.credential.balance = supp_balance;

		var total = ($scope.total.sub_total);
		var less  = (total/100) * $scope.credential.discount;

		$scope.credential.grand_total 	= (total - less);
		$scope.credential.due 			= ($scope.credential.grand_total - $scope.credential.paid);
		$scope.credential.balance 		= (($scope.supplier  ? $scope.supplier.balance : 0) + $scope.credential.grand_total) - $scope.credential.paid;

		return $scope.credential.grand_total;
	}

}]);
app.controller("addPurchaseController", ["$scope", "$http", "$log", "$axios", function ($scope, $http, $log, $axios){
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
	$scope.supplier_id = '';

	$scope.$watch('supplier_id', ()=>{
		if($scope.supplier_id){
			$http({
				method  : "POST",
				url 	: url+'ajax/getSupplier',
				data    : {
					supplier_id:$scope.supplier_id
				}
			})
			.success(response=>{
				console.log(response);
				$scope.supplier = null;
				if(response.length>0){
					$scope.supplier = response[0];		
				}
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
							'products.id':$scope.product_id
						}
					}
				})
				.success(response=>{
					console.log(response);
					if(response.length>0){
						var item 			= response[0];
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
		$scope.cart.splice(index, 1)
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
		var supp_balance = ($scope.supplier ? $scope.supplier.initial_balance : 0);

		$scope.credential.balance = supp_balance;

		var total = ($scope.total.sub_total);
		var less  = (total/100) * $scope.credential.discount;

		$scope.credential.grand_total = (total - less);

		$scope.credential.due = ($scope.credential.grand_total - $scope.credential.paid);

		$scope.credential.balance = (($scope.supplier  ? $scope.supplier.balance : 0) + $scope.credential.grand_total) - $scope.credential.paid;

		return $scope.credential.grand_total;
	}

}]);
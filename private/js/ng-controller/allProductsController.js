app.controller("allProductsController", ["$scope", "$log", function ($scope, $log) 
{
	// Featch Category To Sub-Category
	$('#sub_cat_id').selectpicker();
	$scope.$watch('cat_id', ()=>{
		if($scope.cat_id){
			var option = `<option value="" selected disabled> --Select A Sub-Category-- </option>`;
			var data  = {
				table : 'subcategories',
				where : {
					cat_id : $scope.cat_id,
					trash  : 0,
				}
			}
			axios.post(url+'ajax/read', makeFormData(data))
			.then(response=>{
				if(response){
					option = `<option value="" selected disabled> -- Select A Sub-Category (${(response.data).length}) -- </option>`;
					angular.forEach(response.data, (item)=>{
						option += `<option value="${item.id}"> ${item.subcategory} </option>`;
					});
				}
				$('#sub_cat_id').html(option);
				$('#sub_cat_id').selectpicker('refresh');
			})
			.catch(err=>console.log(err));
		}
	});

}]);
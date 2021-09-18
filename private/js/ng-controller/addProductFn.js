app.controller("addProductFn", ["$scope", "$log", function ($scope, $log) 
{
	$scope.photos = [{
		src 	: url+'public/images/thumbnail/photo.svg',
		default : url+'public/images/thumbnail/photo.svg',
		index   : 0
	}];


	// Featch Category To Sub-Category
	$('#sub_cat_id').selectpicker();
	$scope.$watch('cat_id', ()=>{
		if($scope.cat_id){
			var option = `<option value="" selected disabled> Select A Sub-Category </option>`;
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
					$('#total_cat').html((response.data).length);
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


	// Add And Remove Photo Item 
	$scope.addFn = function(index){
		$scope.photos.push({
			src 	: url+'public/images/thumbnail/photo.svg',
			default : url+'public/images/thumbnail/photo.svg',
			index   : index+1
		});
	}
	$scope.removeFn = function(index){
		$scope.photos.splice(index, 1);
	}
	
	// File Load 
	window.fileLoadFn = function(file){
		console.log(file.files.length);
		var wrapper = file.closest('.set-photo-wrapper');
		var img     = wrapper.querySelector('img');

		if(file.files.length>0){
			const reader = new FileReader();
			reader.addEventListener('load', (event) => {
			    if(img) {img.src = reader.result};
			});
			reader.readAsDataURL(file.files[0]);
		}else
		    if(img) {img.src = url+'public/images/thumbnail/photo.svg'};
	}


}]);
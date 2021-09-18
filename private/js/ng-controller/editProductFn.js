app.controller("editProductFn", ["$scope", "$log", "$window", function ($scope, $log, $window) 
{
	$scope.photos = [{
		src 	: url+'public/images/thumbnail/photo.svg',
		default : url+'public/images/thumbnail/photo.svg',
		index   : 0
	}];
	$scope.sub_cat_id = '';

	// Featch Category To Sub-Category
	$('#sub_cat_id').selectpicker();
	$scope.$watch('cat_id', ()=>{
		if($scope.cat_id){
			var option = `<option value="" disabled> Select A Sub-Category </option>`;
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
						option += `<option value="${item.id}" ${$scope.sub_cat_id==item.id?'selected':''}> ${item.subcategory} </option>`;
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
		var wrapper = file.closest('.set-photo-wrapper');
		var img     = wrapper.querySelector('img');

		if(file.files.length>0){
			const reader = new FileReader();
			reader.addEventListener('load', (event) => {
			    if(img) {img.src = reader.result};
			});
			reader.readAsDataURL(file.files[0]);
		}else
		    if(img){img.src = url+'public/images/thumbnail/photo.svg'};
	}

	// Delete Image
	$scope.deleteFn = function(id, type){
		if(type=='feature_photo'){read('#feature_photo').setAttribute('required', 'required');}

		var target = window.event.target.closest('.col-md-3');

		axios.post(url+'ajax/imageDelete', makeFormData({id:id}))
		.then(response=>{
			if(target){
				target.remove();
			}
		})
		.catch(err=>console.log(err));
	}

	// Read is Available Feature Photo
	var feature_photo = read("img[data-type='feature_photo']");
	if(!feature_photo){read('#feature_photo').setAttribute('required', 'required');};

}]);
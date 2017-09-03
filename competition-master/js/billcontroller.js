app.controller("myctrl",($scope,myfactory)=>{
    $scope.body = true;
    data();
    function data(){
        var promise =  myfactory.getdata();
        promise.then((data)=>{
				
            console.log(data)
$scope.arr = data
$scope.body=false;
           $scope.gif = true;
			},(err)=>{
				
				alert("image not sent");
			})
    }
     $scope.modal = (i)=>{
        console.log("hello")
      var promise=  myfactory.inside(i.id);
        promise.then((data)=>{
				
            console.log(data)
        $scope.person = data

			},(err)=>{
				
				alert("image not sent");
			})
      
    }
})
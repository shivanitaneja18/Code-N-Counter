app.controller("myctrl",($scope,myfactory)=>{
    data();
    function data(){
       
        var promise =  myfactory.getdata();
        promise.then((data)=>{
				
            console.log(data)
            $scope.arr = data;

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
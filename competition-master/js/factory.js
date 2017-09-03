app.factory("myfactory",($http,$q)=>{
    var object = {
        default : (id)=>{
            var pr = $q.defer();
         var url = "http://localhost:8000/categories/"+id+"/facilities";
        
                
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
         }
         )
         return pr.promise
        
    },
        getdata : ()=>{
             var id = localStorage.getItem("storeid");
               var pr = $q.defer();
         var url = "http://localhost:8000/categories/"+id+"/facilities";
        
                
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
         }
         )
         return pr.promise
        },
        postcomplaint : function(obj){
                      var pr = $q.defer();
         var url = "http://localhost:8000/complaints";
        
                
         $http.post(url,obj).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise
            
        },
        users : function(){
                          var pr = $q.defer();
         var url = "http://localhost:8000/users/";
        
                
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise
        },
        messagepost : function(obj){
                             var pr = $q.defer();
         var url = "http://localhost:8000/messages/";
        
//              var headers = {"Content-Type":"application/json","Accept":"application/json"};
            console.log(obj)
         $http.post(url,obj).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise
        },
        getmessage : function(id){
                                     var pr = $q.defer();
         var url = "http://localhost:8000/messages/"+id;
        
//              var headers = {"Content-Type":"application/json","Accept":"application/json"};
            
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise
        },
        getcomplaint : function(){
                                            var pr = $q.defer();
         var url = "http://localhost:8000/complaints/";
        
//              var headers = {"Content-Type":"application/json","Accept":"application/json"};
            
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise
        },
        inside : function(id){
                                               var pr = $q.defer();
         var url = "http://localhost:8000/categories/facilities/"+id+"/stores";
        
//              var headers = {"Content-Type":"application/json","Accept":"application/json"};
            
         $http.get(url).then(function(data){
             pr.resolve(data.data)
             console.log("success")
           
         },
                             function(err){
             pr.reject(err)
             console.log("error")
             
         }
         )
         return pr.promise  
        }
    }
    return object;
})
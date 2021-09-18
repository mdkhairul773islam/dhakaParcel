var app = angular.module("MainApp", ['angularUtils.directives.dirPagination', 'ngSanitize']);

var url = window.location.origin+'/';
if(window.location.host=='localhost' || (window.location.host.match('192.168'))){
    var pathname = window.location.pathname;
    url += pathname.substr(1, pathname.indexOf('/', 1));
}
// custom filter in Angular js
app.filter('removeUnderScore', function() {
    return function(input) {
        return input.replace(/_/gi, " ");
    }
});


app.filter('textToLower', function() {
    return function(input) {
        return input.replace(/_/gi, " ").toLowerCase();
    }
});



// ucwords custom filter in Angular js
app.filter('textBeautify', function() {
    return function(input) {
        var str = input.replace(/_/gi, " ").toLowerCase();

        return str.replace(/^([a-z])|\s+([a-z])/g, function($1) {
            return $1.toUpperCase();
        });
    }
});


app.filter('join', function() {
    return function(input) {
        console.log(typeof input);
        return (typeof input === 'object') ? "" : input.join();
    }
});


app.filter("showStatus", function() {
    return function(input) {
        if (input == 1) {
            return "Available";
        } else {
            return "Not Available";
        }
    }
});


app.filter("status", function() {
    return function(input) {
        if (input == "active") {
            return "Running";
        } else {
            return "Blocked";
        }
    }
});


app.filter("fNumber", function() {
    return function(input) {
        var myNum = new Intl.NumberFormat('en-IN').format(input);
        return myNum;
    }
});


window.makeFormData=(object)=>{
    var formdata = new FormData();
    if(typeof object == 'object'){
        for(const key in object){
            if(typeof object[key] == 'object'){
                formdata.append(key, JSON.stringify(object[key]));                
            }else{
                formdata.append(key, object[key]);                
            }
        }
    }
    return formdata;
}


window.read    = (x)=>document.querySelector(x);
window.readAll = (x)=>document.querySelectorAll(x);





var axiosRequest = {
    post:function(url, data=null){return http(url, makeFormData(data))}
}
app.value('$axios', axiosRequest);
async function http(url, data) {
    var responsedata = null;
    await axios.post(url, data)
    .then(response=>{
        responsedata = response
    })
    .catch(err=>console.log(err));
    return responsedata;
}
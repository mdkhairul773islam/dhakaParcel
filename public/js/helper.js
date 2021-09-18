var read = (x)=>document.querySelector(x);
var readAll = (x)=>document.querySelectorAll(x);

var url = window.location.origin+'/';
if(window.location.host=='localhost' || (window.location.host.match('192.168'))){
    var pathname = window.location.pathname;
    url += pathname.substr(1, pathname.indexOf('/', 1));
}

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


window.shop = function(niddle=null) {
    var from_rang = read("#from_rang");
    var to_rang   = read("#to_rang");
    var cat_id    = read("#cat_id").value;

    if(niddle && niddle.cat_id)
        cat_id = niddle.cat_id;


    var data = {
        'products.price >' : +(from_rang.value).replaceAll(',', ''),
        'products.price <' : +(to_rang.value).replaceAll(',', ''),
        'products.cat_id'  : (cat_id!=''? +cat_id : ''),
    }

    if(niddle && niddle.limit)
        data.limit = niddle.limit;
    else
        data.limit = 12;
    if(niddle && niddle.offset)
        data.offset = niddle.offset;
    else
        data.offset=0;

    if(niddle && niddle.rate){
        data = Object.assign(data, {'product_ratings.rate':niddle.rate});
    }

    var date = new Date();
    window.location.href = url+'shop/'+btoa(JSON.stringify(data))+'/'+date.getTime();
}

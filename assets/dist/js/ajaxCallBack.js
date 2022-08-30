
window.onload = function(){
    console.log("jjj")
    ajaxCallBack("countries+cities.json", function(result){
        console.log(result)
       printCountry(result)
        
    }) 
}

function printCountry(countries){
    
    var print = "<option value =`0`>Select</option>";
    for(let c in countries){
        print += `<option value ="${c}">${c}</option>`
    }
    $("#ddlCountries").html(print);
} 

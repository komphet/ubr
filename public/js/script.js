function numberWithCommas(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return parts.join(".");
}

function getAddress(type,value){
	var typeReset = null;
	var typeGet = null;

			if(type.indexOf('geography') != -1 || type.indexOf('Geography') != -1)  {
                typeReset = new Array('province','amphur','district','postcode');
  	      		typeGet = 'province';
            }
            if(type.indexOf('province') != -1 || type.indexOf('Province') != -1){
                typeReset = new Array('amphur','district','postcode');
  	      		typeGet = 'amphur';
            }   
            if(type.indexOf('amphur') != -1   || type.indexOf('Amphur') != -1){
                typeReset = new Array('district','postcode');
  	      		typeGet = 'district';
            }     
            if(type.indexOf('district') != -1 || type.indexOf('District') != -1){
                typeReset = new Array('postcode');
  	      		typeGet = 'postcode';
            }    
            

	$.get('//'+window.location.hostname+'/getaddress/'+typeGet+'/'+value,function(data){
		for (index = 0; index < typeReset.length; ++index) {
			if(typeReset[index] == 'postcode'){
				$('#'+typeReset[index]).val('');
			}else{
				$('#'+typeReset[index]).text('');
			}
		    
		}

		if(typeGet == 'postcode'){
			$('#'+typeGet).val(data);
		}else{
			$('#'+typeGet).html(data);
		}
		
	}).fail(function(){
		alert('Error!');
	});


}


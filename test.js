
function checkPass(password){
	console.log("checkpass");
	var pass=/^(?=.*\d)(?=.*[A-Za-z])(?=.*[!@#$&%])[0-9A-Za-z!@#$%&]{8,50}$/;
	if(pass.test(password) || password==""){
			return true;
	}else{
			return false;
	}
}

function checkAdd(address){

	var pass=/^[\s-\'a-zA-Z0-9]{1,50}$/;
	if(pass.test(address) || address==""){
		return true;
	}else{
		return false;
	}

}

function checkString(name){
	var pass=/^[A-za-z][\s-\'a-zA-Z]{0,50}$/;
	if(pass.test(name) || name==""){
		return true;
	}else{
		return false;
	}

}

QUnit.test( "Password test", function( assert ) {
	var result= checkPass('CodeLyoko@360');
  assert.equal(result,true,'Expected to be true');
});

QUnit.test( "Name test", function( assert ) {
  var result= checkString('Steve');
  assert.equal(result,true,'Expected to be true');
});

QUnit.test( "Address test", function( assert ) {
  var result= checkAdd('21 Jump Street');
  assert.equal(result,true,'Expected to be true');
});
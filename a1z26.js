var letters = 'abcdefghijklmnopqrstuvwxyz';
function Encrypt(params){
	var t = params.toLowerCase();
	var outt = "";
	var needseparator = false;
	for (var i = 0, len = t.length; i < len; i++) {
		var l = t[i];
		var idx = letters.indexOf(l);
		if (-1 == idx) {
			outt += l;
			needseparator = false;
		} else {
			if (needseparator) outt += "-";
			outt += (idx + 1).toString();
			needseparator = true;
		}
	}
	return outt;
}

function Decrypt(params){
	var t = params.replace(/([\d]{1,2})([^\d]|$)/g, function(match, p1, p2) {
		return letters[Number(p1) - 1] + (p2 == "-" ? "" : p2);
	});
	return t;
}

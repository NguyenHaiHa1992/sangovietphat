function removeAccent(a){a=a.toLowerCase();a=a.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");a=a.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");a=a.replace(/ì|í|ị|ỉ|ĩ/g,"i");a=a.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");a=a.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");a=a.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");a=a.replace(/đ/g,"d");a=a.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");a=a.replace(/-+-/g,"-");a=a.replace(/^\-+|\-+$/g,"");return a}
$(document).ready(function(){
	NProgress.start();
	NProgress.done();

	// $(document).pjax('#menuBar a', '#main-content', {timeout: 30000});
	// $(document)
		// .on('pjax:start', function() { NProgress.start();})
		// .on('pjax:end',  function() { NProgress.done(); });
})
function toggle(a) {
	var b = document.getElementById(a);
	if (b.style.display == "none") {
		b.style.display = "block"
	} else {
		b.style.display = "none"
	}
}

function blanket_size(a) {
	if ( typeof window.innerWidth != "undefined") {
		viewportheight = window.innerHeight
	} else {
		viewportheight = document.documentElement.clientHeight
	}
	if (viewportheight > document.body.parentNode.scrollHeight && viewportheight > document.body.parentNode.clientHeight) {
		blanket_height = viewportheight
	} else {
		if (document.body.parentNode.clientHeight > document.body.parentNode.scrollHeight) {
			blanket_height = document.body.parentNode.clientHeight
		} else {
			blanket_height = document.body.parentNode.scrollHeight
		}
	}
	var b = document.getElementById("blanket");
	b.style.height = blanket_height + "px";
	var c = document.getElementById(a);
	c.style.top = 50 + "px"
}

function window_pos(a) {
	if ( typeof window.innerWidth != "undefined") {
		viewportwidth = window.innerHeight
	} else {
		viewportwidth = document.documentElement.clientHeight
	}
	if (viewportwidth > document.body.parentNode.scrollWidth && viewportwidth > document.body.parentNode.clientWidth) {
		window_width = viewportwidth
	} else {
		if (document.body.parentNode.clientWidth > document.body.parentNode.scrollWidth) {
			window_width = document.body.parentNode.clientWidth
		} else {
			window_width = document.body.parentNode.scrollWidth
		}
	}
	var b = document.getElementById(a);
	window_width = window_width / 2 - 450;
	b.style.left = window_width + "px"
}

function popup(a) {
	blanket_size(a);
	window_pos(a);
	toggle("blanket");
	toggle(a)
}
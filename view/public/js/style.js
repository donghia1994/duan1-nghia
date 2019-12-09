//SWIPER SIDE
function swiper() {
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 5,
		spaceBetween: 30,
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
	});
}
//WOW ANIMATE

// new WOW().init();

//TABS SẢN PHẨM CỦA CHÚNG TÔI
function tabcontent() {
	var buttons = document.getElementsByClassName('tablinks');
	var contents = document.getElementsByClassName('tabcontent');

	function showContent(id) {
		for (var i = 0; i < contents.length; i++) {
			contents[i].style.display = 'none';
		}
		var content = document.getElementById(id);
		content.style.display = 'block';
	}
	for (var i = 0; i < buttons.length; i++) {
		buttons[i].addEventListener("click", function () {
			var id = this.textContent;
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].classList.remove("active");
			}
			this.className += " active";
			showContent(id);
		});
	}
	showContent('NAM');

}


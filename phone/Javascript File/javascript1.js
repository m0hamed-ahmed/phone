var name_phone  = [
		'Samsung Galaxy Note 8 (N950FD) 64GB - Dual SIM (Black) EGP 12,499.00',
		'Apple Iphone 7 Plus - 128GB(Red) EGP 23,556.00',
		'OPPO- F9-64G+6RAM-Blue EGP 5,990.00',
		'Huawei (P20 Lite), Dual SIM -Black EGP 3,999.00'
		];
var photo_phone = [
		'Picture/samsung mobile/s3.jpg',
		'Picture/apple mobile/a8.jpg',
		'Picture/oppo mobile/o7.jpg',
		'Picture/huawei mobile/h4.jpg'
		];

var i=0;
function showslide() {
	document.getElementsByClassName('slideshow_name_phone')[0].textContent = name_phone[i];
	document.slideshow_photo_phone.src = photo_phone[i];
	if(i<name_phone.length - 1 || i<photo_phone -1)
	{
		i++;
	}
	else
	{
		i=0;
	}

	setTimeout("showslide()",2000);

};
showslide();

// ===============================================================


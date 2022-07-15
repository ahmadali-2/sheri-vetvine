jQuery(document).ready(function($) {
	"use strict";
	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );
	jQuery('.selectpicker').selectpicker;
	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});
	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});
	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});
});

/**
 * Preparing modal delete records for admin on all screens
 *
 * @param Int id
 * @param String uri
 *
 * @return Response
 */
const deleteRecord = (id, uri) => {
    document.getElementById('identity').value ;
    let route = window.location.origin + uri + id;
    document.getElementById('deleteForm').setAttribute('action', route)
    $('#deleteModal').modal('show')
}


//Add more fields on admin's subscription plan form
const addmoreFields = () => {
	let section2 = document.getElementById('package_description_row');
	let divId = Math.floor(Math.random() * 11);
	document.getElementById('package_description_row').insertAdjacentHTML('afterend', "<div id=" + divId + " class='enclosing' style='margin-top:10px'>" + "<div class='form-row flex__left'><button class='btn btn-xs btn-danger close_btn' type='button' onclick='removeAdded(" + divId + ")' style='margin-left:5px; margin-bottom:6px;'>&times;</button></div>" + section2.outerHTML + "</div>")
}
// remove added HTML fields on  page
const removeAdded = (id) => {
document.getElementById(id).remove();
}

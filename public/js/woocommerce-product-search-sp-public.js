(function( $ ) {
	'use strict';

	jQuery(document).ready(function () {

		function truncate(input, count) {
			if (input.length > count) {
				return input.substring(0, count) + '...';
			}
			return input;
			};

		// On Search 
		const onSearchHandler = (e) => {
			e.preventDefault(); 
			const key = e.target.dataset.key;
			
			if (key) {
				let input = document.getElementById(key);
				if (!input || input.value.length < 3 ) return;
				

				 jQuery.post(spAjax.ajax_url,
					{ action: "sp_search_ajax", skey: input.value, key: key},
					 function (data, status) {
						 if (status == "success" ) {
							 let result = document.getElementById(key + 'result');
							 if (result) {
								 let obj = JSON.parse(data);
								//  console.log('obj', obj)
								 if (!Array.isArray(obj.data) || obj.data.length < 1) return result.innerHTML ="No Result Found";
								 result.innerHTML = obj.data.map(function (row, index) {
									 return `<div key="${'sp' + index}" class="spRow">
										<h4 class="spRowTitle">${row.post_title}</h4>
										<p class="spRowContent">${truncate(row.post_content, 100)}</p>
									</div>`;
								 }).join('');
								 
							 }
						 } else {
							 console.error('Ooops!!');
						}
					
					});
			}
		}

		let node = document.querySelectorAll('.spSearchBar');
		if (node) {
			node.forEach(function (currentElement) {
				let btn = currentElement.querySelector('.spSearchButton');

				btn.addEventListener('click', onSearchHandler);			
			})
		}


	})

})( jQuery );

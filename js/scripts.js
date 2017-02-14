$(document).ready(function() {
	var pagination = $('#pagination ul');

	function show_bikes_ajax(value_ajax) {
		var output = $('.searching-bikes'),
			split = [], img = [], div = [],
			brand_bike = [], text;

		$.ajax({
			url: "./backend/database.php",
			method: "POST",
			data: {value: value_ajax},
			success: function(data) {
				split = data.split(" ");
				output.html('');

				for (var i = 0; i < split.length - 1; i = i + 2) {
					div[i] = document.createElement('div');
				  img[i] = document.createElement('img');
				  brand_bike[i] = document.createElement('h1');

				  if (split[i + 1] == 'kross') text = document.createTextNode('kross');
				  else if (split[i + 1] == 'author') text = document.createTextNode('author');
				  else if (split[i + 1] == 'merida') text = document.createTextNode('merida');
				  else if (split[i + 1] == 'accent') text = document.createTextNode('accent');
				  else if (split[i + 1] == 'agang') text = document.createTextNode('agang');

					brand_bike[i].appendChild(text);
				  img[i].setAttribute('src', split[i]);
					div[i].append(img[i]);
					div[i].append(brand_bike[i]);

			    output.append(div[i]);
				}		

				if (Math.floor(split.length / 2 ) > 3) {
					var count = (Math.floor(split.length / 2) / 3).toFixed();
					pagination_ajax(count);
				} else pagination.html('');
			}
		})
	}

	var value = $('#searchForm input');

	$('#searchForm button').on('click', function() {
		show_bikes_ajax(value.val());
	});

	$('#searchForm input').keydown(function(e) {  
    var keyCode = e.keyCode || e.which;  
    if (keyCode == 13) show_bikes_ajax(value.val());  
  });

	$('.buttons-bikes button').on('click', function() {
		show_bikes_ajax($(this).text().toLowerCase());
	});

	function pagination_ajax(count) {
		var prev_pagination = document.createElement('li'),
				next_pagination = document.createElement('li'),
				prev = document.createTextNode('<'),
				next = document.createTextNode('>'),
				li = [], text;

		prev_pagination.setAttribute('id', 'prev');
		prev_pagination.appendChild(prev);
		next_pagination.setAttribute('id', 'next');
		next_pagination.appendChild(next);

		pagination.html('');
		pagination.append(prev_pagination);

		for (var i = 1; i <= count; i++) {
			li[i] = document.createElement('li');
			var number_pagination = document.createTextNode(i);
			li[1].setAttribute('style', 'font-weight: 700;');
			li[i].append(number_pagination);
			li[i].setAttribute('id', i);
			pagination.append(li[i]);
		}
		pagination.append(next_pagination);

		var visible_bicycles = [1,2,3], 
				next_bicycles = 1, current_page = 1;
			
		$('#pagination ul li').on('click', function() {
			var button_click = $(this).attr('id');
			
			if ($.isNumeric(button_click)) {
				button_click = Number(button_click);
				if (button_click > 1 && button_click != visible_bicycles[2] / 3) {
					$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '400');
					current_page = button_click;
					$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '700');
					for (var i = 0; i < visible_bicycles.length; i++) {
						$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','none');
							next_bicycles = (button_click - 1) * 3;
							visible_bicycles[i] = visible_bicycles[i] + next_bicycles;
						$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','inline-block');
					}
				} else if (button_click == 1 && button_click != visible_bicycles[0]) {
					$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '400');
					current_page = 1;
					$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '700');
					for (var i = 0; i < visible_bicycles.length; i++) {
						$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','none');
						visible_bicycles[i] = i + 1;
						$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','inline-block');
					}
				}
			}
			if (button_click === 'prev' && visible_bicycles[0] > 1) {
				$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '400');
				current_page--;
				$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '700');
				for (var i = 0; i < visible_bicycles.length; i++) {
					$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','none');
					visible_bicycles[i] = visible_bicycles[i] - 3;
					$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','inline-block');
				}
			}
			if (button_click === 'next' && $('.searching-bikes div').length != visible_bicycles[2] 
			&& $('#pagination ul li:last-child').prev().attr('id') != current_page) {
				$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '400');
				current_page++;
				$('#pagination ul li:nth-child(' + (current_page + 1) + ')').css('font-weight', '700');
				for (var i = 0; i < visible_bicycles.length; i++) {
					$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','none');
					visible_bicycles[i] = visible_bicycles[i] + 3;
					$('.searching-bikes div:nth-child(' + visible_bicycles[i] + ')').css('display','inline-block');
				}
			}		
		});
	}

	if ($(window).width() < 1300) $('#searchForm input').removeAttr('placeholder');

});
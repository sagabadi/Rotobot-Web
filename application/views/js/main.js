// top navbar behaviour
$('#top-nav').find('#link_1').on('click', function() {
	if ($(this).parent('li').hasClass('open')) {
		$(this).parent('li').removeClass('open');
		$('#subnav_1').css('margin-top', '0');
	} else {	
		$(this).parent('li').addClass('open');
		$(this).parent('li').siblings().removeClass('open');
		$('#subnav_1').css('margin-top', '3.875rem');
		$('#subnav_2').css('margin-top', '0');
	}
});
$('#top-nav').find('#link_2').on('click', function() {
	if ($(this).parent('li').hasClass('open')) {
		$(this).parent('li').removeClass('open');
		$('#subnav_2').css('margin-top', '0');
	} else {	
		$(this).parent('li').addClass('open');
		$(this).parent('li').siblings().removeClass('open');
		$('#subnav_2').css('margin-top', '3.875rem');
		$('#subnav_1').css('margin-top', '0');
	}
});
$('#top-nav').find('#link_utilitas').on('click', function() {
	$(this).parent('li').siblings().removeClass('open');
	$('.sub-nav').css('margin-top', '0');
});
// $('.main-wrapper').on('click', function() {
// 	$('.sub-nav').css('margin-top', '0');
// });

// active tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

/* make Chart.js */
function showChart (xCanvas, xType, xData, xOption) {
    var ctx = xCanvas.getContext('2d');
    var chart = new Chart(ctx, {
        type: xType,
        data: xData,
        options: xOption
    });
    return chart;
}

/* make radialIndicator.js */
function showRadialIndicator (xElm, xProgress, xColor) {
	$(xElm).radialIndicator({
	    barColor: xColor,
	    barWidth: 8,
	    initValue: 0,
	    roundCorner : true,
	    percentage: true
	});
	var progress = $(xElm).data('radialIndicator');
	progress.animate(xProgress);
	return null;
}

/* make radialIndicator.js::Circle */
function showCircleProgressbar (xElm, xProgress, xColor) {
	var bar = new ProgressBar.Circle(xElm, {
	    color: xColor,
	    // This has to be the same size as the maximum width to
	    // prevent clipping
	    strokeWidth: 6,
	    trailWidth: 2,
	    easing: 'easeInOut',
	    duration: 1400,
	    text: {
	        autoStyleContainer: false
	    },
	    from: { color: '#efefef', width: 2 },
	    to: { color: xColor, width: 6 },
	    // Set default step function for all animate calls
	    step: function(state, circle) {
	        circle.path.setAttribute('stroke', state.color);
	        circle.path.setAttribute('stroke-width', state.width);

	        var value = Math.round(circle.value() * 100);
	        if (value === 0) {
	            circle.setText('');
	        } else {
	            circle.setText(value + '%');
	        }
	    }
	});
	bar.text.style.fontFamily = '"Roboto", sans-serif';
	bar.text.style.fontSize = '2rem';
	bar.animate(xProgress / 100);  // Number from 0.0 to 1.0

	return bar;
}

/* dataTable default settings */
$.extend( true, $.fn.dataTable.defaults, {
    'language': {
	    'paginate': {
	      'next': 'Next',
	      'previous': 'Prev'
	    },
        'zeroRecords': 'Tidak ada data yang ditemukan',
        'emptyTable': 'Tabel kosong',
        'infoEmpty': 'Tidak ada data',
        'info': 'Menampilkan _START_-_END_ dari _TOTAL_ data',
        'infoFiltered': '(tersaring dari _MAX_ total data)'
    },
 	'pagingType': 'simple_numbers'
});

// Selectpicker
$('.selectpicker').selectpicker({
    iconBase: 'fa',
    tickIcon: 'fa-check',
    deselectAllText: 'Hapus semua',
    selectAllText: 'Pilih semua',
    noneSelectedText: '-',
    
});

$('.picker-datetime').datetimepicker({
    icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-arrow-up',
        down: 'fa fa-arrow-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-calendar-times-o',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    }
});

$('.picker-date').datetimepicker({
    icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-arrow-up',
        down: 'fa fa-arrow-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-calendar-times-o',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    },
    format: 'DD/MM/YYYY'
});

$('.picker-time').datetimepicker({
    icons: {
        time: 'fa fa-clock-o',
        date: 'fa fa-calendar',
        up: 'fa fa-arrow-up',
        down: 'fa fa-arrow-down',
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-calendar-times-o',
        clear: 'fa fa-trash',
        close: 'fa fa-times'
    },
    format: 'LT'
});
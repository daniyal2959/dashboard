<?php 
return [
	'KT_THEME_BOOTSTRAP' => [
		'default' => 'App\Core\Bootstrap\BootstrapDefault',
		'auth' => 'App\Core\Bootstrap\BootstrapAuth',
		'system' => 'App\Core\Bootstrap\BootstrapSystem',
	],
	'KT_THEME' => 'metronic',
	'KT_THEME_LAYOUT_DIR' => 'layout',
	'KT_THEME_MODE_DEFAULT' => 'light',
	'KT_THEME_MODE_SWITCH_ENABLED' => '1',
	'KT_THEME_DIRECTION' => 'rtl',
	'KT_THEME_ICONS' => 'duotone',
	'KT_THEME_ASSETS' => [
		'favicon' => 'assets/media/logos/favicon.ico',
		'global' => [
			'css' => [
				'0' => 'assets/plugins/global/plugins.bundle.css',
				'1' => 'assets/css/font.css',
				'2' => 'assets/css/style.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/global/plugins.bundle.js',
				'1' => 'assets/js/scripts.bundle.js',
				'2' => 'assets/js/widgets.bundle.js',
			],
		],
	],
	'KT_THEME_VENDORS' => [
		'datatables' => [
			'js' => [
				'0' => 'assets/plugins/custom/datatables/datatables.bundle.js',
			],
		],
		'formrepeater' => [
			'js' => [
				'0' => 'assets/plugins/custom/formrepeater/formrepeater.bundle.js',
			],
		],
		'pickr' => [
			'css' => [
				'0' => 'assets/plugins/custom/pickr/nano.min.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/pickr/pickr.min.js',
			],
		],
		'fullcalendar' => [
			'css' => [
				'0' => 'assets/plugins/custom/fullcalendar/fullcalendar.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/fullcalendar/fullcalendar.bundle.js',
			],
		],
		'flotcharts' => [
			'js' => [
				'0' => 'assets/plugins/custom/flotcharts/flotcharts.bundle.js',
			],
		],
		'google-jsapi' => [
			'js' => [
				'0' => 'assets/js/loader.js',
			],
		],
		'tinymce' => [
			'js' => [
				'0' => 'assets/plugins/custom/tinymce/tinymce.bundle.js',
			],
		],
		'ckeditor-classic' => [
			'js' => [
				'0' => 'assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js',
			],
		],
		'ckeditor-inline' => [
			'js' => [
				'0' => 'assets/plugins/custom/ckeditor/ckeditor-inline.bundle.js',
			],
		],
		'ckeditor-balloon' => [
			'js' => [
				'0' => 'assets/plugins/custom/ckeditor/ckeditor-balloon.bundle.js',
			],
		],
		'ckeditor-balloon-block' => [
			'js' => [
				'0' => 'assets/plugins/custom/ckeditor/ckeditor-balloon-block.bundle.js',
			],
		],
		'ckeditor-document' => [
			'js' => [
				'0' => 'assets/plugins/custom/ckeditor/ckeditor-document.bundle.js',
			],
		],
		'draggable' => [
			'js' => [
				'0' => 'assets/plugins/custom/draggable/draggable.bundle.js',
			],
		],
		'fslightbox' => [
			'js' => [
				'0' => 'assets/plugins/custom/fslightbox/fslightbox.bundle.js',
			],
		],
		'jkanban' => [
			'css' => [
				'0' => 'assets/plugins/custom/jkanban/jkanban.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/jkanban/jkanban.bundle.js',
			],
		],
		'typedjs' => [
			'js' => [
				'0' => 'assets/plugins/custom/typedjs/typedjs.bundle.js',
			],
		],
		'cookiealert' => [
			'css' => [
				'0' => 'assets/plugins/custom/cookiealert/cookiealert.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/cookiealert/cookiealert.bundle.js',
			],
		],
		'cropper' => [
			'css' => [
				'0' => 'assets/plugins/custom/cropper/cropper.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/cropper/cropper.bundle.js',
			],
		],
		'vis-timeline' => [
			'css' => [
				'0' => 'assets/plugins/custom/vis-timeline/vis-timeline.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/vis-timeline/vis-timeline.bundle.js',
			],
		],
		'jstree' => [
			'css' => [
				'0' => 'assets/plugins/custom/jstree/jstree.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/jstree/jstree.bundle.js',
			],
		],
		'prismjs' => [
			'css' => [
				'0' => 'assets/plugins/custom/prismjs/prismjs.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/prismjs/prismjs.bundle.js',
			],
		],
		'leaflet' => [
			'css' => [
				'0' => 'assets/plugins/custom/leaflet/leaflet.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/leaflet/leaflet.bundle.js',
			],
		],
		'amcharts' => [
			'js' => [
				'0' => 'assets/plugins/custom/amchart/index.js',
				'1' => 'assets/plugins/custom/amchart/xy.js',
				'2' => 'assets/plugins/custom/amchart/percent.js',
				'3' => 'assets/plugins/custom/amchart/radar.js',
				'4' => 'assets/plugins/custom/amchart/theme/Animated.js',
			],
		],
		'amcharts-maps' => [
			'js' => [
				'0' => 'assets/plugins/custom/amchart/index.js',
				'1' => 'assets/plugins/custom/amchart/map.js',
				'2' => 'assets/plugins/custom/amchart/geodata/worldLow.js',
				'3' => 'assets/plugins/custom/amchart/geodata/continentsLow.js',
				'4' => 'assets/plugins/custom/amchart/geodata/usaLow.js',
				'5' => 'assets/plugins/custom/amchart/geodata/worldTimeZonesLow.js',
				'6' => 'assets/plugins/custom/amchart/geodata/worldTimeZoneAreasLow.js',
				'7' => 'assets/plugins/custom/amchart/theme/Animated.js',
			],
		],
		'amcharts-stock' => [
			'js' => [
				'0' => 'assets/plugins/custom/amchart/index.js',
				'1' => 'assets/plugins/custom/amchart/xy.js',
				'2' => 'assets/plugins/custom/amchart/theme/Animated.js',
			],
		],
		'bootstrap-select' => [
			'css' => [
				'0' => 'assets/plugins/custom/bootstrap-select/bootstrap-select.bundle.css',
			],
			'js' => [
				'0' => 'assets/plugins/custom/bootstrap-select/bootstrap-select.bundle.js',
			],
		],
	],
];
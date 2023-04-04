'use-strict';

(function ($) {

	$(window).on('elementor/frontend/init', function () {

		const ModuleHandler = elementorModules.frontend.handlers.Base

		const AGLHandler = ModuleHandler.extend({

			onInit: function () {

				ModuleHandler.prototype.onInit.apply(this, arguments);

				const agl_in_name = this.getElementSettings('agl_in_name')

				if (elementorFrontend.isEditMode() && agl_in_name) {
					const direction = this.getElementSettings('agl_in_direction')
					const duration = this.getElementSettings('agl_in_duration').size
					const delay = this.getElementSettings('agl_in_delay').size
					const classes = agl_in_name == 'custom' ? 'agl' : `agl agl-${agl_in_name}${direction}`
					this.$element.addClass(classes)
					this.$element.addClass(`agl-in-duration-${duration}`)
					this.$element.addClass(`agl-in-delay-${delay}`)
				}

			},

			onElementChange: function (changedProp) {

				if (!changedProp.startsWith('agl')) return

				// agl property changed

				// remove all agl classes

				const element = this.$element[0]
				const classes = element.classList;
				let className = element.className
				for (let i = 0; i < classes.length; i++) {
					if (classes[i].startsWith('agl')) {
						className = className.replace(classes[i], '')
					}
				}

				const settings = this.getElementSettings()

				// add agl classes if entrance animation is selected
				if (settings['agl_in_name']) {
					const newClasses = ` agl agl-${settings['agl_in_name']}${settings['agl_in_direction']} agl-in-duration-${settings['agl_in_duration'].size} agl-in-delay-${settings['agl_in_delay'].size}`
					element.className = className + newClasses;
				}

			},

		});

		elementorFrontend.hooks.addAction('frontend/element_ready/global', function ($scope) {
			elementorFrontend.elementsHandler.addHandler(AGLHandler, { $element: $scope });
		});


	});

})(jQuery)







'use-strict';

(function ($) {
    $(window).on('agl-save', function (e) {
        const json = e.detail    
        $.ajax({
    
            type: "POST",
            url: agl_options[2],
            data: {
                json: json,
                security: agl_nonce[0],
                action: "agl_json"
            },
    
            success: function (data, textStatus, jqXHR) {

			},
    
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus);
                alert("Error: " + errorThrown);
            }
        })
    })

	$('.agl-play').on('click', function(){
		window.dispatchEvent(new Event('agl-animate'))
	})

})(jQuery)

window.addEventListener('agl-init', function(){
	const wpAdminBar = document.getElementById('wpadminbar')
	if(wpAdminBar){

		const editorContainer = document.createElement('div')
		editorContainer.id = "aglEditor"
		document.body.appendChild(editorContainer)
		animateGLInstance.options.container = editorContainer

		//position editor after below admin bar
		function positionEditor(){
			editorContainer.style.top = wpAdminBar.offsetHeight + 'px'
		}

		positionEditor()

		window.addEventListener('resize', positionEditor)

		new AGL.Editor(animateGLInstance.options)

	}
	

})





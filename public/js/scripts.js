var clipboard = {
    config: {
        container: 'code',
        trigger: '.clipboard',
        url  :  ''
    },

    init: function (config) {
        $.extend(clipboard.config, config);
        $(clipboard.config.trigger).zclip({
        path: clipboard.config.url + '/clipboard.swf',
        copy: "hellosss"
		});

    }

};
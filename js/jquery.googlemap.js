$(function() {

    $.fn.googleMap = function(params) {
        params = $.extend({
            zoom: 12,
            coords: [-1.9579, 30.1127], // Changed to Rwanda (Kigali)
            type: "ROADMAP",
            debug: false,
            language: "english", // Fixed spelling from 'langage' to 'language'
            overviewMapControl: false,
            streetViewControl: false,
            scrollwheel: false,
            mapTypeControl: false
        }, params);

        switch (params.type) {
            case 'ROADMAP':
            case 'SATELLITE':
            case 'HYBRID':
            case 'TERRAIN':
                params.type = google.maps.MapTypeId[params.type];
                break;
            default:
                params.type = google.maps.MapTypeId.ROADMAP;
                break;
        }

        this.each(function() {
            var map = new google.maps.Map(this, {
                zoom: params.zoom,
                center: new google.maps.LatLng(params.coords[0], params.coords[1]),
                mapTypeId: params.type,
                scrollwheel: params.scrollwheel,
                streetViewControl: params.streetViewControl,
                overviewMapControl: params.overviewMapControl,
                mapTypeControl: params.mapTypeControl
            });

            $(this).data('googleMap', map);
            $(this).data('googleLanguage', params.language); // Updated key name
            $(this).data('googleDebug', params.debug);
            $(this).data('googleMarker', []);
            $(this).data('googleBound', new google.maps.LatLngBounds());
        });

        return this;
    };

});

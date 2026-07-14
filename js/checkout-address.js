
(function () {

    const GOOGLE_API_KEY = 'AIzaSyDUS-Ybq4Ms54h6X7ZnpsLsVI8s-B7CKH8';

    let googleMapsLoaded = false;
    let pendingInits = [];
    let mapsRequested = false;
    const initializedInputs = new Set();

    // Google region -> WooCommerce NZ state code
    const NZ_STATES = {
        'Northland': 'NTL',
        'Auckland': 'AUK',
        'Waikato': 'WKO',
        'Bay of Plenty': 'BOP',
        'Gisborne': 'GIS',
        "Hawke's Bay": 'HKB',
        "Hawke's Bay Region": 'HKB',
        'Taranaki': 'TKI',
        'Manawatu-Whanganui': 'MWT',
        'Manawatu-Wanganui': 'MWT',
        'Wellington': 'WGN',
        'Tasman': 'TAS',
        'Nelson': 'NSN',
        'Marlborough': 'MBH',
        'West Coast': 'WTC',
        'Canterbury': 'CAN',
        'Otago': 'OTA',
        'Southland': 'STL'
    };

    /**
     * Load Google Maps API only once
     */
    function loadGoogleMaps(callback) {

        if (googleMapsLoaded) {
            callback();
            return;
        }

        pendingInits.push(callback);

        if (pendingInits.length > 1) {
            return;
        }

        window.__googleMapsReady = function () {
            googleMapsLoaded = true;

            pendingInits.forEach(function (cb) {
                cb();
            });

            pendingInits = [];
        };

        const script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?key=' +
            GOOGLE_API_KEY +
            '&libraries=places&callback=__googleMapsReady';

        script.async = true;
        script.defer = true;

        document.head.appendChild(script);

    }

    /**
     * Initialise autocomplete
     */
    function setupAutocomplete(inputId, stateId, postcodeId, cityId) {

        if (initializedInputs.has(inputId)) {
            return;
        }

        const input = document.getElementById(inputId);

        if (!input || !window.google || !google.maps) {
            return;
        }

        initializedInputs.add(inputId);

        const autocomplete = new google.maps.places.Autocomplete(input, {

            types: ['address'],

            componentRestrictions: {
                country: 'nz'
            },

            fields: [
                'address_components',
                'formatted_address',
                'geometry'
            ]

        });

        autocomplete.addListener('place_changed', function () {

            const place = autocomplete.getPlace();

            if (!place.address_components) {
                return;
            }

            let streetNumber = '';
            let route = '';
            let unit = '';
            let suburb = '';
            let city = '';
            let postcode = '';
            let state = '';
            // console.log(place.address_components);

            place.address_components.forEach(function (component) {

                const types = component.types;

                

                if (types.includes('street_number')) {
                    streetNumber = component.long_name;
                }

                if (types.includes('route')) {
                    route = component.long_name;
                }

                if (types.includes('subpremise')) {
                    unit = component.long_name;
                }

                if (
                    types.includes('sublocality') ||
                    types.includes('sublocality_level_1') ||
                    types.includes('neighborhood')
                ) {
                    suburb = component.long_name;
                }

                if (
                    types.includes('locality') ||
                    types.includes('postal_town') ||
                    types.includes('administrative_area_level_2')
                ) {
                    city = component.long_name;
                }

                if (types.includes('postal_code')) {
                    postcode = component.long_name;
                }

                if (types.includes('administrative_area_level_1')) {
                    state = component.long_name;
                }

            });

            // fallback
            if (!city) {
                city = suburb;
            }

            stateTrimmed = state.replace(/\s+Region$/i, '').trim();

            const stateCode = NZ_STATES[stateTrimmed] || stateTrimmed;

            const stateField = document.getElementById(stateId);
            const postcodeField = document.getElementById(postcodeId);
            const cityField = document.getElementById(cityId);

            if (stateField) {
                stateField.value = stateCode;
                stateField.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
            }

            if (postcodeField) {
                postcodeField.value = postcode;
                postcodeField.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
            }

            if (cityField) {
                cityField.value = city;
                cityField.dispatchEvent(new Event('change', {
                    bubbles: true
                }));
            }

            let address = '';

            if (unit) {
                address += unit + '/';
            }

            if (streetNumber) {
                address += streetNumber + ' ';
            }

            if (route) {
                address += route;
            }

            input.value = address.trim();

            input.dispatchEvent(new Event('change', {
                bubbles: true
            }));

            // Refresh WooCommerce shipping/taxes
            if (window.jQuery) {
                jQuery(document.body).trigger('update_checkout');
            }

        });

    }

    /**
     * Initialise both address fields
     */
    function initAutocompletes() {

        setupAutocomplete(
            'shipping_address_1',
            'shipping_state',
            'shipping_postcode',
            'shipping_city'
        );

        setupAutocomplete(
            'billing_address_1',
            'billing_state',
            'billing_postcode',
            'billing_city'
        );

    }

    /**
     * Trigger API load
     */
    function triggerLoad() {

        if (mapsRequested) {
            return;
        }

        mapsRequested = true;

        loadGoogleMaps(function () {
            initAutocompletes();
        });

    }

    /**
     * DOM Ready
     */
    document.addEventListener('DOMContentLoaded', function () {

        // Load during browser idle
        if ('requestIdleCallback' in window) {

            requestIdleCallback(triggerLoad, {
                timeout: 2000
            });

        } else {

            setTimeout(triggerLoad, 1500);

        }

        // Load on first interaction
        ['touchstart', 'mousemove', 'scroll'].forEach(function (event) {

            window.addEventListener(event, triggerLoad, {
                once: true,
                passive: true
            });

        });

        // Load on input focus
        ['shipping_address_1', 'billing_address_1'].forEach(function (id) {

            const input = document.getElementById(id);

            if (!input) {
                return;
            }

            input.addEventListener('focus', triggerLoad, {
                once: true
            });

        });

    });

    /**
     * WooCommerce AJAX checkout refresh
     */
    if (window.jQuery) {

        jQuery(document.body).on('updated_checkout', function () {

            if (googleMapsLoaded) {
                initAutocompletes();
            }

        });

    }

})();
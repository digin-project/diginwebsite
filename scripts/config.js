'use strict';

var Wata = {

    // Configuration of triangles
    triangles: {
        mesh: {
            depth: 11,
            slices: 250
        },
        light: {
            //ambient: '#5838e6',
            ambient: '#1a237e',
            //diffuse: '#4efa62',
            diffuse: '#318be1',
            distance: 55
        }
    },

    // Various toast messages
    toastMessages: {
        fillInRequiredFields: 'Merci de remplir tous les champs',
        enterValidEmail: 'Merci d\'entrer une adresse email valide',
        messageSent: "Votre message a été envoyé. Nous revenons vers vous rapidement !",
        somethingWrong: 'Il y a eu une erreur, essayez de nouveau. Erreur: '
    },

    // Currency switcher
    currencySwitcher: {
        offers: {
            standard: {
                usd: 19.0,
                eur: 17.0
            },
            professional: {
                usd: 49.0,
                eur: 43.0
            },
            extended: {
                usd: 99.0,
                eur: 87.0
            }
        },
        symbols: {
            usd: '$',
            eur: '€'
        }
    },

    // Google map position and marker name
    googleMaps: {
        lat: 44.8403734,
        lng: -0.5703114,
        zoom: 7
    }
};
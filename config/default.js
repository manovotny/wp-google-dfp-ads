module.exports = (function () {

    'use strict';

    return {
        author: {
            email: 'manovotny@gmail.com',
            name: 'Michael Novotny',
            url: 'http://manovotny.com',
            username: 'manovotny'
        },
        files: {
            browserify: 'bundle'
        },
        paths: {
            curl: 'curl_downloads',
            source: 'src',
            translations: 'lang'
        },
        project: {
            composer: {
                name: 'manovotny/wp-google-dfp-ads',
                type: 'library' // Should be `library` or `project`.
            },
            description: 'Adds Google DFP Ads to WordPress.',
            git: 'git://github.com/manovotny/wp-google-dfp-ads.git',
            name: 'WP Google DFP Ads',
            slug: 'wp-google-dfp-ads',
            type: 'plugin', // Should be `plugin` or `theme`.
            url: 'https://github.com/manovotny/wp-google-dfp-ads',
            version: '1.0.2'
        }
    };

}());

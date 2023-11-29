const colors = require('tailwindcss/colors')
const plugin = require('tailwindcss/plugin')
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        //"./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./node_modules/choices.js/public/assets/**/*.{js,css}",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        //'./resources/views/home/index.blade.php',
        //'./resources/views/layout/tailwind/*.blade.php',
        //'./resources/views/layout/tailwind/landing.blade.php'
    ],
    darkMode: 'class',
    important: false,
    theme: {
        screens: {
            xs: "540px",
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
            '2xl': '1536px',
        },


        fontFamily: {
            'nunito': ['"Nunito", sans-serif'],
            'cursive-alex': ['"Alex Brush", cursive'],
            'cursive-kaushan': ['"Kaushan Script", cursive'],
            'head-ebgaramond': ['"EB Garamond", serif'],
            'para-worksans': ['"Work Sans", sans-serif'],
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '12px',
                sm: '1rem',
                lg: '45px',
                xl: '5rem',
                '2xl': '13rem',
            },
        },
        extend: {
            colors: {
                //'blue': '#0B9EDA',
                //'dark-blue': '#241E4C',
                //'indigo-600': '#241E4C',
                //'primary': '#241E4C',
                // You can also define shades if needed
                primary: {
                    DEFAULT: '#241E4C',
                    hover: '#514A7E',
                },
                secondary: {
                    DEFAULT: '#169EDA',
                    hover: '#138ec4',
                },
                red: {
                    DEFAULT: '#E82A3B',
                    hover: '#cb2635',
                },
                green: {
                    DEFAULT: '#75B626',
                },
                'warning': "#facc15",
                'white-soft': '#F7F7FC',
                'gray-primary': '#575563',
                'gray-secondary': '#637381',
                'dark': '#3c4858',
                'black': '#161c2d',
                'dark-footer': '#192132',
            },
            backgroundImage: {
                'hero-pattern': "url('/resources/images/logo.png')",
              },

            boxShadow: {
                sm: '0 2px 4px 0 rgb(60 72 88 / 0.15)',
                DEFAULT: '0 0 3px rgb(60 72 88 / 0.15)',
                md: '0 5px 13px rgb(60 72 88 / 0.20)',
                lg: '0 10px 25px -3px rgb(60 72 88 / 0.15)',
                xl: '0 20px 25px -5px rgb(60 72 88 / 0.1), 0 8px 10px -6px rgb(60 72 88 / 0.1)',
                '2xl': '0 25px 100px -12px rgb(60 72 88 / 0.25)',
                '2xl-around': '0 20px 50px -12px rgb(60 72 88 / 0.25)',
                inner: 'inset 0 2px 4px 0 rgb(60 72 88 / 0.05)',
                testi: '2px 2px 2px -1px rgb(60 72 88 / 0.15)',
            },

            spacing: {
                0.75: '0.1875rem',
                3.25: '0.8125rem'
            },

            maxWidth: ({
                           theme,
                           breakpoints
                       }) => ({
                '1200': '71.25rem',
                '992': '60rem',
                '768': '45rem',
            }),

            zIndex: {
                1: '1',
                2: '2',
                3: '3',
                999: '999',
            },
            aspectRatio: {
                'powerbi': '1120 / 690', // 'powerbi': '1120 / 631',
            },
        },
    },
    safelist: [
        'w-full',
        'aspect-video',
        'aspect-powerbi',
        'aspect-auto',
        'max-w-full',
        //9,014
        //1120/(570+61)

        // ...any other classes you need to safelist
    ],
    plugins: [
        require('@tailwindcss/forms'),
    ]

}

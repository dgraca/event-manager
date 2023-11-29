//jetstram
/*import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';*/

//const plugin = require("tailwindcss/plugin");
//const colors = require("tailwindcss/colors");
//const { parseColor } = require("tailwindcss/lib/util/color");
import plugin from "tailwindcss/plugin";
import colors from "tailwindcss/colors";
import forms from '@tailwindcss/forms';
import { parseColor } from "tailwindcss/lib/util/color";
import preset from './vendor/filament/support/tailwind.config.preset'


/** Converts HEX color to RGB */
const toRGB = (value) => {
    return parseColor(value).color.join(" ");
};


/** @type {import('tailwindcss').Config} */
export default {
    //presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',

    ],
    safelist: [
        {
            pattern: /animate-delay-.+/,
        },
    ],
    darkMode: "class",

    theme: {
        extend: {
            screens: {
                '3xl': '1920px',
                '4xl': '2560px',
            },
            colors: {
                primary: "rgb(var(--color-primary) / <alpha-value>)",
                secondary: "rgb(var(--color-secondary) / <alpha-value>)",
                success: "rgb(var(--color-success) / <alpha-value>)",
                info: "rgb(var(--color-info) / <alpha-value>)",
                warning: "rgb(var(--color-warning) / <alpha-value>)",
                pending: "rgb(var(--color-pending) / <alpha-value>)",
                danger: "rgb(var(--color-danger) / <alpha-value>)",
                light: "rgb(var(--color-light) / <alpha-value>)",
                dark: "rgb(var(--color-dark) / <alpha-value>)",
                darkmode: {
                    50: "rgb(var(--color-darkmode-50) / <alpha-value>)",
                    100: "rgb(var(--color-darkmode-100) / <alpha-value>)",
                    200: "rgb(var(--color-darkmode-200) / <alpha-value>)",
                    300: "rgb(var(--color-darkmode-300) / <alpha-value>)",
                    400: "rgb(var(--color-darkmode-400) / <alpha-value>)",
                    500: "rgb(var(--color-darkmode-500) / <alpha-value>)",
                    600: "rgb(var(--color-darkmode-600) / <alpha-value>)",
                    700: "rgb(var(--color-darkmode-700) / <alpha-value>)",
                    800: "rgb(var(--color-darkmode-800) / <alpha-value>)",
                    900: "rgb(var(--color-darkmode-900) / <alpha-value>)",
                },
                //for filament
                custom: {
                    50: 'rgb(var(--c-50) / <alpha-value>)',
                    100: 'rgb(var(--c-100) / <alpha-value>)',
                    200: 'rgb(var(--c-200) / <alpha-value>)',
                    300: 'rgb(var(--c-300) / <alpha-value>)',
                    400: 'rgb(var(--c-400) / <alpha-value>)',
                    500: 'rgb(var(--c-500) / <alpha-value>)',
                    600: 'rgb(var(--c-600) / <alpha-value>)',
                    700: 'rgb(var(--c-700) / <alpha-value>)',
                    800: 'rgb(var(--c-800) / <alpha-value>)',
                    900: 'rgb(var(--c-900) / <alpha-value>)',
                    950: 'rgb(var(--c-950) / <alpha-value>)',
                },
                /*custom: {
                    50: 'rgb(var(--primary-50) / <alpha-value>)',
                    100: 'rgb(var(--primary-100) / <alpha-value>)',
                    200: 'rgb(var(--primary-200) / <alpha-value>)',
                    300: 'rgb(var(--primary-300) / <alpha-value>)',
                    400: 'rgb(var(--primary-400) / <alpha-value>)',
                    500: 'rgb(var(--primary-500) / <alpha-value>)',
                    600: 'rgb(var(--primary-600) / <alpha-value>)',
                    700: 'rgb(var(--primary-700) / <alpha-value>)',
                    800: 'rgb(var(--primary-800) / <alpha-value>)',
                    900: 'rgb(var(--primary-900) / <alpha-value>)',
                    950: 'rgb(var(--primary-950) / <alpha-value>)',
                },
                custom: {
                    50: 'rgba(var(--primary-50), <alpha-value>)',
                    100: 'rgba(var(--primary-100), <alpha-value>)',
                    200: 'rgba(var(--primary-200), <alpha-value>)',
                    300: 'rgba(var(--primary-300), <alpha-value>)',
                    400: 'rgba(var(--primary-400), <alpha-value>)',
                    500: 'rgba(var(--primary-500), <alpha-value>)',
                    600: 'rgba(var(--primary-600), <alpha-value>)',
                    700: 'rgba(var(--primary-700), <alpha-value>)',
                    800: 'rgba(var(--primary-800), <alpha-value>)',
                    900: 'rgba(var(--primary-900), <alpha-value>)',
                    950: 'rgba(var(--primary-950), <alpha-value>)',
                },*/
                /*custom: {
                    50: 'rgba(var(--c-50), <alpha-value>)',
                    100: 'rgba(var(--c-100), <alpha-value>)',
                    200: 'rgba(var(--c-200), <alpha-value>)',
                    300: 'rgba(var(--c-300), <alpha-value>)',
                    400: 'rgba(var(--c-400), <alpha-value>)',
                    500: 'rgba(var(--c-500), <alpha-value>)',
                    600: 'rgba(var(--c-600), <alpha-value>)',
                    700: 'rgba(var(--c-700), <alpha-value>)',
                    800: 'rgba(var(--c-800), <alpha-value>)',
                    900: 'rgba(var(--c-900), <alpha-value>)',
                    950: 'rgba(var(--c-950), <alpha-value>)',
                },*/
                /*danger: {
                    DEFAULT: "rgb(var(--color-danger) / <alpha-value>)",
                    50: 'rgba(var(--danger-50), <alpha-value>)',
                    100: 'rgba(var(--danger-100), <alpha-value>)',
                    200: 'rgba(var(--danger-200), <alpha-value>)',
                    300: 'rgba(var(--danger-300), <alpha-value>)',
                    400: 'rgba(var(--danger-400), <alpha-value>)',
                    500: 'rgba(var(--danger-500), <alpha-value>)',
                    600: 'rgba(var(--danger-600), <alpha-value>)',
                    700: 'rgba(var(--danger-700), <alpha-value>)',
                    800: 'rgba(var(--danger-800), <alpha-value>)',
                    900: 'rgba(var(--danger-900), <alpha-value>)',
                    950: 'rgba(var(--danger-950), <alpha-value>)',
                },
                gray: {
                    50: 'rgba(var(--gray-50), <alpha-value>)',
                    100: 'rgba(var(--gray-100), <alpha-value>)',
                    200: 'rgba(var(--gray-200), <alpha-value>)',
                    300: 'rgba(var(--gray-300), <alpha-value>)',
                    400: 'rgba(var(--gray-400), <alpha-value>)',
                    500: 'rgba(var(--gray-500), <alpha-value>)',
                    600: 'rgba(var(--gray-600), <alpha-value>)',
                    700: 'rgba(var(--gray-700), <alpha-value>)',
                    800: 'rgba(var(--gray-800), <alpha-value>)',
                    900: 'rgba(var(--gray-900), <alpha-value>)',
                    950: 'rgba(var(--gray-950), <alpha-value>)',
                },
                info: {
                    DEFAULT: "rgb(var(--color-info) / <alpha-value>)",
                    50: 'rgba(var(--info-50), <alpha-value>)',
                    100: 'rgba(var(--info-100), <alpha-value>)',
                    200: 'rgba(var(--info-200), <alpha-value>)',
                    300: 'rgba(var(--info-300), <alpha-value>)',
                    400: 'rgba(var(--info-400), <alpha-value>)',
                    500: 'rgba(var(--info-500), <alpha-value>)',
                    600: 'rgba(var(--info-600), <alpha-value>)',
                    700: 'rgba(var(--info-700), <alpha-value>)',
                    800: 'rgba(var(--info-800), <alpha-value>)',
                    900: 'rgba(var(--info-900), <alpha-value>)',
                    950: 'rgba(var(--info-950), <alpha-value>)',
                },
                primary: {
                    DEFAULT: "rgb(var(--color-primary) / <alpha-value>)",
                    50: 'rgba(var(--primary), <alpha-value>)',
                    100: 'rgba(var(--primary-100), <alpha-value>)',
                    200: 'rgba(var(--primary-200), <alpha-value>)',
                    300: 'rgba(var(--primary-300), <alpha-value>)',
                    400: 'rgba(var(--primary-400), <alpha-value>)',
                    500: 'rgba(var(--primary-500), <alpha-value>)',
                    600: 'rgba(var(--primary-600), <alpha-value>)',
                    700: 'rgba(var(--primary-700), <alpha-value>)',
                    800: 'rgba(var(--primary-800), <alpha-value>)',
                    900: 'rgba(var(--primary-900), <alpha-value>)',
                    950: 'rgba(var(--primary-950), <alpha-value>)',
                },
                success: {
                    DEFAULT: "rgb(var(--color-success) / <alpha-value>)",
                    50: 'rgba(var(--success-50), <alpha-value>)',
                    100: 'rgba(var(--success-100), <alpha-value>)',
                    200: 'rgba(var(--success-200), <alpha-value>)',
                    300: 'rgba(var(--success-300), <alpha-value>)',
                    400: 'rgba(var(--success-400), <alpha-value>)',
                    500: 'rgba(var(--success-500), <alpha-value>)',
                    600: 'rgba(var(--success-600), <alpha-value>)',
                    700: 'rgba(var(--success-700), <alpha-value>)',
                    800: 'rgba(var(--success-800), <alpha-value>)',
                    900: 'rgba(var(--success-900), <alpha-value>)',
                    950: 'rgba(var(--success-950), <alpha-value>)',
                },
                warning: {
                    DEFAULT: "rgb(var(--color-warning) / <alpha-value>)",
                    50: 'rgba(var(--warning-50), <alpha-value>)',
                    100: 'rgba(var(--warning-100), <alpha-value>)',
                    200: 'rgba(var(--warning-200), <alpha-value>)',
                    300: 'rgba(var(--warning-300), <alpha-value>)',
                    400: 'rgba(var(--warning-400), <alpha-value>)',
                    500: 'rgba(var(--warning-500), <alpha-value>)',
                    600: 'rgba(var(--warning-600), <alpha-value>)',
                    700: 'rgba(var(--warning-700), <alpha-value>)',
                    800: 'rgba(var(--warning-800), <alpha-value>)',
                    900: 'rgba(var(--warning-900), <alpha-value>)',
                    950: 'rgba(var(--warning-950), <alpha-value>)',
                },*/
            },
            fontFamily: {
                roboto: ["Roboto"],
                'para-worksans': ['"Work Sans", sans-serif'],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
            zIndex: {
                1: '1',
                2: '2',
                3: '3',
                999: '999',
            },
            backgroundImage: {
                "menu-corner":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='259.51' height='259.52' viewBox='0 0 259.51 259.52'%3E%3Cpath id='Path_143' data-name='Path 143' d='M8659.507,423.965c-.167-2.608.05-5.319-.19-8.211-.084-1.012-.031-2.15-.118-3.12-.113-1.25-.1-2.682-.236-4.061-.172-1.722-.179-3.757-.365-5.394-.328-2.889-.478-5.857-.854-8.61-.509-3.714-.825-7.252-1.38-10.543-.934-5.535-2.009-11.312-3.189-16.692-.855-3.9-1.772-7.416-2.752-11.2-1.1-4.256-2.394-8.149-3.687-12.381-1.1-3.615-2.366-6.893-3.623-10.493-1.3-3.739-2.917-7.26-4.284-10.7-1.708-4.295-3.674-8.078-5.485-12.023-1.145-2.493-2.5-4.932-3.727-7.387-1.318-2.646-2.9-5.214-4.152-7.518-1.716-3.16-3.517-5.946-5.274-8.873-1.692-2.818-3.589-5.645-5.355-8.334-2.326-3.542-4.637-6.581-7.039-9.848-2.064-2.809-4.017-5.255-6.088-7.828-2.394-2.974-4.937-5.936-7.292-8.589-3.027-3.411-6.049-6.744-9.055-9.763-2.4-2.412-4.776-4.822-7.108-6.975-3-2.767-5.836-5.471-8.692-7.854-3.332-2.779-6.657-5.663-9.815-8.028-2.958-2.216-5.784-4.613-8.7-6.6-3.161-2.159-6.251-4.414-9.219-6.254-3.814-2.365-7.533-4.882-11.168-6.89-4.213-2.327-8.513-4.909-12.478-6.834-4.61-2.239-9.234-4.619-13.51-6.416-4.1-1.725-8.11-3.505-11.874-4.888-4.5-1.652-8.506-3.191-12.584-4.47-6.045-1.9-12.071-3.678-17.431-5-9.228-2.284-17.608-3.757-24.951-4.9-7.123-1.112-13.437-1.64-18.271-2.035l-2.405-.2c-1.638-.136-3.508-.237-4.633-.3a115.051,115.051,0,0,0-12.526-.227h259.51Z' transform='translate(-8399.997 -164.445)' fill='%23f1f5f8'/%3E%3C/svg%3E%0A\")",
                "menu-corner-dark":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='259.51' height='259.52' viewBox='0 0 259.51 259.52'%3E%3Cpath id='Path_143' data-name='Path 143' d='M8659.507,423.965c-.167-2.608.05-5.319-.19-8.211-.084-1.012-.031-2.15-.118-3.12-.113-1.25-.1-2.682-.236-4.061-.172-1.722-.179-3.757-.365-5.394-.328-2.889-.478-5.857-.854-8.61-.509-3.714-.825-7.252-1.38-10.543-.934-5.535-2.009-11.312-3.189-16.692-.855-3.9-1.772-7.416-2.752-11.2-1.1-4.256-2.394-8.149-3.687-12.381-1.1-3.615-2.366-6.893-3.623-10.493-1.3-3.739-2.917-7.26-4.284-10.7-1.708-4.295-3.674-8.078-5.485-12.023-1.145-2.493-2.5-4.932-3.727-7.387-1.318-2.646-2.9-5.214-4.152-7.518-1.716-3.16-3.517-5.946-5.274-8.873-1.692-2.818-3.589-5.645-5.355-8.334-2.326-3.542-4.637-6.581-7.039-9.848-2.064-2.809-4.017-5.255-6.088-7.828-2.394-2.974-4.937-5.936-7.292-8.589-3.027-3.411-6.049-6.744-9.055-9.763-2.4-2.412-4.776-4.822-7.108-6.975-3-2.767-5.836-5.471-8.692-7.854-3.332-2.779-6.657-5.663-9.815-8.028-2.958-2.216-5.784-4.613-8.7-6.6-3.161-2.159-6.251-4.414-9.219-6.254-3.814-2.365-7.533-4.882-11.168-6.89-4.213-2.327-8.513-4.909-12.478-6.834-4.61-2.239-9.234-4.619-13.51-6.416-4.1-1.725-8.11-3.505-11.874-4.888-4.5-1.652-8.506-3.191-12.584-4.47-6.045-1.9-12.071-3.678-17.431-5-9.228-2.284-17.608-3.757-24.951-4.9-7.123-1.112-13.437-1.64-18.271-2.035l-2.405-.2c-1.638-.136-3.508-.237-4.633-.3a115.051,115.051,0,0,0-12.526-.227h259.51Z' transform='translate(-8399.997 -164.445)' fill='%23232e45'/%3E%3C/svg%3E%0A\")",
                "bredcrumb-chevron-dark":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='1' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right breadcrumb__icon'%3E%3Cpolyline points='9 18 15 12 9 6'%3E%3C/polyline%3E%3C/svg%3E\")",
                "bredcrumb-chevron-light":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23e8eeff' stroke-width='1' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right breadcrumb__icon'%3E%3Cpolyline points='9 18 15 12 9 6'%3E%3C/polyline%3E%3C/svg%3E\")",
                "bredcrumb-chevron-darkmode":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23718096' stroke-width='1' stroke-linecap='round' stroke-linejoin='round' class='feather feather-chevron-right breadcrumb__icon'%3E%3Cpolyline points='9 18 15 12 9 6'%3E%3C/polyline%3E%3C/svg%3E\")",
            },
            keyframes: {
                // Side & simple menu
                "intro-divider": {
                    "100%": {
                        opacity: 1,
                    },
                },
                "intro-menu": {
                    "100%": {
                        opacity: 1,
                        transform: "translateX(0px)",
                    },
                },

                // Top menu
                "intro-top-menu": {
                    "100%": {
                        opacity: 1,
                        transform: "translateY(0px)",
                    },
                },
            },

        },
    },
    plugins: [
        forms,
        plugin(function ({ addBase, matchUtilities }) {
            addBase({
                // Default colors
                ":root": {
                    "--color-primary": toRGB(colors.blue["800"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.lime["500"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["400"]),
                    "--color-pending": toRGB(colors.orange["500"]),
                    "--color-danger": toRGB(colors.red["600"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    //custom for filament
                    "--primary-50":toRGB(colors.blue["50"]),
                    "--primary-100":toRGB(colors.blue["100"]),
                    "--primary-200":toRGB(colors.blue["200"]),
                    "--primary-300":toRGB(colors.blue["300"]),
                    "--primary-400":toRGB(colors.blue["400"]),
                    "--primary-500":toRGB(colors.blue["500"]),
                    "--primary-600":toRGB(colors.blue["600"]),
                    "--primary-700":toRGB(colors.blue["700"]),
                    "--primary-800":toRGB(colors.blue["800"]),
                    "--primary-900":toRGB(colors.blue["900"]),
                    "--primary-950":toRGB(colors.blue["950"]),
                    "--danger-50":toRGB(colors.red["50"]),
                    "--danger-100":toRGB(colors.red["100"]),
                    "--danger-200":toRGB(colors.red["200"]),
                    "--danger-300":toRGB(colors.red["300"]),
                    "--danger-400":toRGB(colors.red["400"]),
                    "--danger-500":toRGB(colors.red["500"]),
                    "--danger-600":toRGB(colors.red["600"]),
                    "--danger-700":toRGB(colors.red["700"]),
                    "--danger-800":toRGB(colors.red["800"]),
                    "--danger-900":toRGB(colors.red["900"]),
                    "--danger-950":toRGB(colors.red["950"]),
                    "--warning-50":toRGB(colors.yellow["50"]),
                    "--warning-100":toRGB(colors.yellow["100"]),
                    "--warning-200":toRGB(colors.yellow["200"]),
                    "--warning-300":toRGB(colors.yellow["300"]),
                    "--warning-400":toRGB(colors.yellow["400"]),
                    "--warning-500":toRGB(colors.yellow["500"]),
                    "--warning-600":toRGB(colors.yellow["600"]),
                    "--warning-700":toRGB(colors.yellow["700"]),
                    "--warning-800":toRGB(colors.yellow["800"]),
                    "--warning-900":toRGB(colors.yellow["900"]),
                    "--warning-950":toRGB(colors.yellow["950"]),
                    "--success-50":toRGB(colors.lime["50"]),
                    "--success-100":toRGB(colors.lime["100"]),
                    "--success-200":toRGB(colors.lime["200"]),
                    "--success-300":toRGB(colors.lime["300"]),
                    "--success-400":toRGB(colors.lime["400"]),
                    "--success-500":toRGB(colors.lime["500"]),
                    "--success-600":toRGB(colors.lime["600"]),
                    "--success-700":toRGB(colors.lime["700"]),
                    "--success-800":toRGB(colors.lime["800"]),
                    "--success-900":toRGB(colors.lime["900"]),
                    "--success-950":toRGB(colors.lime["950"]),
                    "--info-50":toRGB(colors.cyan["50"]),
                    "--info-100":toRGB(colors.cyan["100"]),
                    "--info-200":toRGB(colors.cyan["200"]),
                    "--info-300":toRGB(colors.cyan["300"]),
                    "--info-400":toRGB(colors.cyan["400"]),
                    "--info-500":toRGB(colors.cyan["500"]),
                    "--info-600":toRGB(colors.cyan["600"]),
                    "--info-700":toRGB(colors.cyan["700"]),
                    "--info-800":toRGB(colors.cyan["800"]),
                    "--info-900":toRGB(colors.cyan["900"]),
                    "--info-950":toRGB(colors.cyan["950"]),
                    "--gray-50":toRGB(colors.gray["50"]),
                    "--gray-100":toRGB(colors.gray["100"]),
                    "--gray-200":toRGB(colors.gray["200"]),
                    "--gray-300":toRGB(colors.gray["300"]),
                    "--gray-400":toRGB(colors.gray["400"]),
                    "--gray-500":toRGB(colors.gray["500"]),
                    "--gray-600":toRGB(colors.gray["600"]),
                    "--gray-700":toRGB(colors.gray["700"]),
                    "--gray-800":toRGB(colors.gray["800"]),
                    "--gray-900":toRGB(colors.gray["900"]),
                    "--gray-950":toRGB(colors.gray["950"]),
                },
                // Default dark-mode colors
                ".dark": {
                    "--color-primary": toRGB(colors.blue["700"]),
                    "--color-darkmode-50": "87 103 132",
                    "--color-darkmode-100": "74 90 121",
                    "--color-darkmode-200": "65 81 114",
                    "--color-darkmode-300": "53 69 103",
                    "--color-darkmode-400": "48 61 93",
                    "--color-darkmode-500": "41 53 82",
                    "--color-darkmode-600": "40 51 78",
                    "--color-darkmode-700": "35 45 69",
                    "--color-darkmode-800": "27 37 59",
                    "--color-darkmode-900": "15 23 42",
                },
                // Theme 1 colors
                ".theme-1": {
                    "--color-primary": toRGB(colors.emerald["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.emerald["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["400"]),
                    "--color-pending": toRGB(colors.amber["500"]),
                    "--color-danger": toRGB(colors.rose["600"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.emerald["800"]),
                    },
                },
                // Theme 2 colors
                ".theme-2": {
                    "--color-primary": toRGB(colors.blue["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.teal["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.amber["500"]),
                    "--color-pending": toRGB(colors.orange["500"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.blue["800"]),
                    },
                },
                // Theme 3 colors
                ".theme-3": {
                    "--color-primary": toRGB(colors.cyan["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.teal["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.amber["500"]),
                    "--color-pending": toRGB(colors.amber["600"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.cyan["800"]),
                    },
                },
                // Theme 4 colors
                ".theme-4": {
                    "--color-primary": toRGB(colors.indigo["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.emerald["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["500"]),
                    "--color-pending": toRGB(colors.orange["600"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.indigo["700"]),
                    },
                },
            });

            // Animation delay utilities
            matchUtilities(
                {
                    "animate-delay": (value) => ({
                        "animation-delay": value,
                    }),
                },
                {
                    values: (() => {
                        const values = {};
                        for (let i = 1; i <= 50; i++) {
                            values[i * 10] = `${i * 0.1}s`;
                        }
                        return values;
                    })(),
                }
            );

            // Animation fill mode utilities
            matchUtilities(
                {
                    "animate-fill-mode": (value) => ({
                        "animation-fill-mode": value,
                    }),
                },
                {
                    values: {
                        none: "none",
                        forwards: "forwards",
                        backwards: "backwards",
                        both: "both",
                    },
                }
            );
        }),
    ],
    variants: {
        extend: {
            boxShadow: ["dark"],
        },
    },
    //jetstream
    /*theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],*/
};

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                app: {
                    primary: "#880ff2",
                    secondary: "#98c1d9",
                    tertiary: "#e0fbfc",
                    dark: "#293241",
                    light: "#98c1d9",
                    white: "#e0fbfc",
                },
            },
        },
    },

    plugins: [forms, typography],
};

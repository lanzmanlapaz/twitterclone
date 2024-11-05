import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                twitterChirp: ["TwitterChirp", ...defaultTheme.fontFamily.sans],
                twitterChirpBold: [
                    "TwitterChirp",
                    ...defaultTheme.fontFamily.sans,
                ], 
                twitterChirpExtendedHeavy: [
                    "TwitterChirpExtendedHeavy",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },

    plugins: [require("daisyui"), forms],
};

/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
  ],
  theme: {
      extend: {
          colors: {
              "primary": {
                  50: "#f1f9fa",
                  100: "#daeff3",
                  200: "#badee7",
                  300: "#8ac6d6",
                  400: "#53a6bd",
                  500: "#388aa2",
                  600: "#33758f",
                  700: "#2d5c71",
                  800: "#2c4e5e",
                  900: "#294350",
                  950: "#162a36",
                  DEFAULT: "#33758f", // 600 IS DEFAULT
              },
              "warning": {
                  50: "#fffaf3",
                  100: "#fef2c9",
                  200: "#fdeca0",
                  300: "#fcd576",
                  400: "#fbcf47",
                  500: "#f9b90a",
                  600: "#d49a08",
                  700: "#b17c07",
                  800: "#8f5f06",
                  900: "#754a05",
                  DEFAULT: "#fbcf47", // 400 IS DEFAULT
              },
              "success": {
                  50: "#f3faf6",
                  100: "#d5f2e3",
                  200: "#a9e7cd",
                  300: "#6fd9b3",
                  400: "#3fcf9b",
                  500: "#1abf7f",
                  600: "#0e9f64",
                  700: "#0a8050",
                  800: "#08643e",
                  900: "#074b31",
                  DEFAULT: "#3fcf9b", // 400 IS DEFAULT
              },
              "danger" : {
                  50: "#fff3f3",
                  100: "#fddcdc",
                  200: "#fca3a3",
                  300: "#f86b6b",
                  400: "#f53f3f",
                  500: "#f00",
                  600: "#d40000",
                  700: "#b30000",
                  800: "#910000",
                  900: "#750000",
                  DEFAULT: "#f53f3f", // 400 IS DEFAULT
              },
              "accent-blue": {
                  50: "#f1f9fa",
                  100: "#daeff3",
                  200: "#badee7",
                  300: "#8ac6d6",
                  400: "#53a6bd",
                  500: "#388aa2",
                  600: "#33758f",
                  700: "#2d5c71",
                  800: "#2c4e5e",
                  900: "#294350",
                  950: "#162a36",
                  DEFAULT: "#33758f", // 600 IS DEFAULT
              },
              "accent-green": {
                  50: "#effaf2",
                  100: "#d8f3de",
                  200: "#b5e5c2",
                  300: "#84d19d",
                  350: "#58d185",
                  400: "#4cb472",
                  500: "#2f9a5a",
                  600: "#1f7c46",
                  700: "#19633a",
                  800: "#164f30",
                  900: "#134129",
                  950: "#0a2417",
                  DEFAULT: "#4cb472", // 400 IS DEFAULT
              },
          },
      },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
};

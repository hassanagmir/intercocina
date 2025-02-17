
import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import Product from './components/Product';

// Ensure this runs after the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const productElement = document.getElementById('product');
    if (productElement) {
        const root = createRoot(productElement);
        root.render(
            <React.StrictMode>
                <Product />
            </React.StrictMode>
        );
    }
});

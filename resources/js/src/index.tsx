import React from "react";
import ReactDOM from "react-dom";
import App from "./App";
import { BrowserRouter } from "react-router-dom";
import { ChakraProvider, ColorModeScript } from '@chakra-ui/react'
import { store } from "./store";
import theme from "./theme";

ReactDOM.render(
    <React.StrictMode>
        <BrowserRouter>
            <ChakraProvider>
                <ColorModeScript initialColorMode={theme.config.initialColorMode} />
                <App store={store} />
            </ChakraProvider>
        </BrowserRouter>
    </React.StrictMode>,
    document.getElementById('app')
);

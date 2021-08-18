import React from "react";
import ReactDOM from "react-dom";
import App from "./router";
import { AuthProvider } from "./context/auth";

if (document.getElementById("app")) {
    ReactDOM.render(
        <AuthProvider>
            <App />
        </AuthProvider>,
        document.getElementById("app")
    );
}

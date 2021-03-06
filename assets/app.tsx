/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';


import ReactDOM from 'react-dom';
import React from "react";
import CurrenciesList from "./components/Currency/CurrenciesList";

const App = () => {
    return (
        <React.Fragment>
            <h3>Currencies List:</h3>
            <CurrenciesList/>
        </React.Fragment>
    );
}

ReactDOM.render(<App/>, document.getElementById('app'));

import React, {FunctionComponent, useState, useEffect, Fragment} from "react";
import Currency from "./Currency";
import SearchInput from "../SearchInput";

const CurrenciesList: FunctionComponent = (props) => {
    const [currencies, setCurrencies] = useState([]);
    const [searchedCurrencies, setSearchedCurrencies] = useState([]);

    const fetchCurrencies = async () => {
        const URL = "https://127.0.0.1:8000/api/currencies";
        const response = await fetch(URL);
        const data = await response.json();

        console.log(data['currencies']);
        const currenciesArr = [];
        for (const name in data['currencies']) {
            currenciesArr.push({name, value: data['currencies'][name]})
        }
        console.log(currenciesArr);
        setCurrencies(currenciesArr);
        setSearchedCurrencies(currenciesArr);
    }

    const renderCurrencies = (): Array<any> => {
        return searchedCurrencies.map(c => {
            return <Currency key={c.name} name={c.name} value={c.value}/>
        })
    }

    useEffect(() => {
        fetchCurrencies();
    }, []);

    const searchCurrency = (event) => {
        event.preventDefault();
        const searchedCurrency = event.target.value;
        console.log("ere");
        if (searchedCurrency) {
            setSearchedCurrencies(currencies.filter(c => c.name.startsWith(searchedCurrency.toUpperCase())));
        } else {
            setSearchedCurrencies(currencies);
        }
    }

    return <Fragment>
        <SearchInput onSubmitHandler={searchCurrency.bind(this)}/>
        <table>
            <thead>
            <tr>
                <th>Currency</th>
                <th>1&euro; [EUR]</th>
            </tr>
            </thead>
            <tbody>
            {renderCurrencies()}
            </tbody>
        </table>
    </Fragment>
}

export default CurrenciesList;
import React, {FunctionComponent} from "react";

interface SearchInputProps {
    onSubmitHandler: (event: any) => void;
}

const SearchInput: FunctionComponent<SearchInputProps> = (props) => {
    return <form id="search-currency-form">
        <label id="search-currency-label" htmlFor="searchCurrency">Enter Currency:</label>
        <input id="search-currency-btn" name="search-currency" type="text" onChange={props.onSubmitHandler}/>
    </form>;
}

export default SearchInput;
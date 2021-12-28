import React, {FunctionComponent} from "react";

interface CurrencyProps{
  name: string;
  value: number;
}

const Currency:FunctionComponent<CurrencyProps> = (props) => {
    return <tr>
        <td>{props.name}</td>
        <td>{props.value}</td>
    </tr>
}

export default Currency;
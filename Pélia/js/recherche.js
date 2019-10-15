var options = {
    url: "http://easyautocomplete.com/resources/countries.json",

    getValue: "name",

    list: {
        match: {
            enabled: true
        }
    }
};

$("#provider-json").easyAutocomplete(options);
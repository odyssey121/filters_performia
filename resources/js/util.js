export function removeUrlParameter(url, parameter, encodedUri = true) {
    console.log('url, parameter',parameter)
    //prefer to use l.search if you have a location/link object
    var urlparts = url.split('?');
    if (urlparts.length >= 2) {
        var prefix = encodedUri ? encodeURIComponent(parameter) : (parameter) + '=';
        var pars = urlparts[1].split(/[&;]/g);
        //reverse iteration as may be destructive
        for (var i = pars.length; i-- > 0;) {
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {
                pars.splice(i, 1);
            }
        }

        return urlparts[0] + (pars.length > 0 ? '?' + pars.join('&') : '');
    }
    return url;
}

export function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + escapeRegExp(key) + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    } else {
        return uri + separator + key + "=" + value;
    }
}

export function getQuerySearchParam(query) {
    return query
        ? (/^[?#]/.test(query) ? query.slice(1) : query)
            .split('&')
            .reduce((params, param) => {
                    let [key, value] = param.split('=');
                    params[key] = value ? decodeURIComponent(value.replace(/\+/g, ' ')) : '';
                    return params;
                }, {}
            )
        : {}
}

export function escapeRegExp(text) {
    console.log('text', text)
    return text.replace(/[-[\]{}()*+?.,\\^$|#\s]/g, '\\$&');
}

const environments = {
    local: {
        baseUrl: "https://stcentenariodemos.z20.web.core.windows.net/mapa-valor/"
    },
    qa: {
        baseUrl: "./"
    }
}

let environment = window.location.pathname == '/mapa-valor/' ? environments.qa : environments.local;
export { environment };

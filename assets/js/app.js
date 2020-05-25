// PWA INSTALL

let inputCity = document.querySelector(".input-city");
const submit = document.querySelector(".submit");

const weatherIcons = {
    Rain: "wi wi-day-rain",
    Clouds: "wi wi-day-cloudy",
    Clear: "wi wi-day-sunny",
    Snow: "wi wi-day-snow",
    mist: "wi wi-day-fog",
    Drizzle: "wi wi-day-sleet",
    overcast: "wi-day-sunny-overcast"
};

function capitalize(str) {
    return str[0].toUpperCase() + str.slice(1);
}

async function main(withIP = true) {
    let ville;

    if (withIP) {
        // 1. Chopper l'adresse IP du PC qui ouvre la page:
        // https://api.ipify.org?format=json'

        const ip = await fetch("https://api.ipify.org?format=json")
            .then(resultat => resultat.json())
            .then(json => json.ip);

        // 2. Choper la ville grace à l'adresse IP:
        // https://freegeoip.app/{format}/{IP_or_hostname}

        ville = await fetch("https://freegeoip.app/json/" + ip)
            .then(resultat => resultat.json())
            .then(json => json.city);
    } else {
        // ville = document.querySelector(".city").textContent;
        ville = inputCity.value;
        console.log(ville);
    }
    // 3. Choper les infos météo grâce à la ville:
    //  https://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=1111111111

    const meteo = await fetch(
            `https://api.openweathermap.org/data/2.5/weather?q=${ville}&appid=645a9ce1c30fe4fcc2d821aa1738b958&lang=fr&units=metric`
        )
        .then(resultat => resultat.json())
        .then(json => json);

    // 4. Afficher les informations sur la page

    displayWeatherInfos(meteo);
}

function displayWeatherInfos(data) {
    const name = data.name;
    const temperature = data.main.temp;
    const conditions = data.weather[0].main;
    const description = data.weather[0].description;
    const temperatureMinimum = data.main.temp_min;
    const temperatureMaximum = data.main.temp_max;
    const contry = data.sys.country;
    const feels_like = data.main.feels_like;
    const windSpeed = data.wind.speed;
    const humidity = data.main.humidity;

    document.querySelector(".city").textContent = name;
    document.querySelector(".country").textContent = contry;
    document.querySelector(".temp-celcius").textContent = Math.round(temperature);
    document.querySelector(".min").textContent = Math.round(temperatureMinimum);
    document.querySelector(".max").textContent = Math.round(temperatureMaximum);
    document.querySelector(".feel-like").textContent = Math.round(feels_like);
    document.querySelector(".wind-speed").textContent = windSpeed;
    document.querySelector(".humidity").textContent = Math.round(humidity);

    document.querySelector(".conditions").textContent = capitalize(description);

    document.querySelector("i.wi").className = weatherIcons[conditions];

    document.body.className = conditions.toLowerCase();
}

inputCity.addEventListener("keydown", e => {
    if (e.keyCode === 13) {
        e.preventDefault();
        name.textContent = inputCity;
        main(false);
    }
});

// let inputCity = document.querySelector(".input-city");

// submit.addEventListener("click", () => {
//     main(false);
// });

main();
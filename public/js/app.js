var PRIVATE_API_KEY = "dc270a27679c16a3dd254514fded7f408167f1556a3a8e721641fead42f7673d";
var BASE_URL = "https://api.thegamesdb.net/v1/";

axios.defaults.headers.post['Access-Control-Allow-Origin'] = '*'

function getByGameName(name){
    var url = BASE_URL + "Games/ByGameName?apikey=" + PRIVATE_API_KEY + "&name=" + name;

    axios({
        method: 'get',
        url: url,
    })
        .then(function (response){
            console.log(response)
        })
        .catch(function (error){
            console.log(error)
        });
}


"footer": {
            "tabs": {
                "style": {
                    "background": "rgba(255,255,255,0.8)",
                    "color:disabled": "#cecece",
                    "color": "#009efa"
                },
                "items": [
                    {
                        "image": "https://raw.githubusercontent.com/Jasonette/Twitter-UI-example/master/images/home.png",
                        "text": "Mapa",
                        "style": {
                            "height": "21"
                        },
                        "url": "http://f77d6301.ngrok.io/MiniMapp/public/api/MiniMappMap/{{$global.coord}}/{{$global.username}}"
                    },
                    
                    {
                        "image": "https://raw.githubusercontent.com/Jasonette/Twitter-UI-example/master/images/me.png",
                        "text": "Flags",
                        "style": {
                            "height": "21"
                        },
                        "url": "http://f77d6301.ngrok.io/MiniMapp/public/api/MiniMappFlag/{{$global.username}}"
                    },
                    {
                        "image": "https://raw.githubusercontent.com/Jasonette/Twitter-UI-example/master/images/moments.png",
                        "text": "Usuario",
                        "style": {
                            "height": "21"
                        },
                        "url": "http://f77d6301.ngrok.io/MiniMapp/public/api/MiniMappUser/{{$global.username}}"
                    }
                ]
            }
        }
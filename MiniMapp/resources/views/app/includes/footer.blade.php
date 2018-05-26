"footer": {
            "tabs": {
                "style": {
                    "background": "rgba(255,255,255,0.8)",
                    "color:disabled": "#cecece",
                    "color": "#009efa"
                },
                "items": [
                    {
                        "image": "https://raw.githubusercontent.com/ionic-team/ionicons/master/png/512/map.png",
                        "text": "Mapa",
                        "style": {
                            "height": "21"
                        },
                        "url": "@endpoint/MiniMappMap/@{{$global.coord}}/@{{$global.username}}"
                    },
                    
                    {
                        "image": "https://raw.githubusercontent.com/ionic-team/ionicons/master/png/512/flag.png",
                        "text": "Flags",
                        "style": {
                            "height": "21"
                        },
                        "url": "@endpoint/MiniMappFlag/@{{$global.username}}"
                    },
                    {
                        "image": "https://raw.githubusercontent.com/ionic-team/ionicons/master/png/512/ios7-person.png",
                        "text": "Usuario",
                        "style": {
                            "height": "21"
                        },
                        "url": "@endpoint/MiniMappUser/@{{$global.username}}"
                    }
                ]
            }
        }
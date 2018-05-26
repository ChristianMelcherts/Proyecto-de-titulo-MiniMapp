
        "reload_map" : {
          "type" : "$geo.get",
          "options" : {
            "distance" : "10000"
          },
          "success" : {
            "type" : "$global.set",
            "options" : {
              "coord" : "{{$jason.coord}}"
            },
            "success" : {
              "type" : "$render"
            }
          }
        },
        "$load" : {
          "trigger" : "reload_map"
        }

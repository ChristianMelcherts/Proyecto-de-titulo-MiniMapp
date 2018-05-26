{
  "$jason": {
    "head": {
      "title": "MiniMapp Index",
      "offline": "flase",
      "styles": {
        "input": {
          "align": "center",
          "background": "#ffffff",
          "color": "#3c3c3c",
          "width": "100%",
          "height": "60",
          "font": "HelveticaNeue-Bold"
        }
      }
    },
    "body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "MiniMapp",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
            {
              "type": "space",
              "height": "10"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "image",
                  "url": "http://minimapp.org/app/Assets/Imagenes/map.png",
                  "style": {
                    "align": "center",
                    "width": "200"
                  }
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "space",
              "height": "50"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "username",
                  "placeholder": "Usuario",
                  "class": "input"
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "textfield",
                  "name": "password",
                  "placeholder": "Contraseña",
                  "class": "input",
                  "style": {
                    "secure": "true"
                  }
                },
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "space",
              "height": "5"
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "button",
                  "style": {
                    "width": "100%",
                    "align": "center",
                    "font": "HelveticaNeue-Bold",
                    "size": "12",
                    "padding": "10",
                    "height": "60",
                    "background": "#87b87f",
                    "color": "#ffffff"
                  },
                  "text": "INGRESAR",
                  "action": {
                    "type": "$network.request",
                    "options": {
                      "url": "@endpoint/token",
                      "method": "post",
                      "data": {
                        "login": "@{{$get.username}}",
                        "password": "@{{$get.password}}"
                      }
                    },
                     "success": {
                      "type": "$session.set",
                      "options": {
                        "domain" : "cl.minimapp.app",
                        "header" : {
                          "Authorization" : "Bearer @{{$jason.token}}",
                          "X-Auth-Token"  : "Bearer @{{$jason.token}}"
                        }
                      },
                      "success" : {
                        "type" : "$geo.get",
                        "options" : {
                          "distance" : "10000"
                        },
                        "error" : {
                          "type" : "$util.banner",
                          "options" : {
                            "type" : "error",
                            "title" : "No se encontro geo",
                            "description" : "Error de Coordenadas"
                           }
                        },
                        "success" : {
                          "type" : "$global.set",
                          "options" : {
                            "username" : "@{{$get.username}}",
                            "coord" : "@{{$jason.coord}}"
                          },
                          "success" : {
                            "type" : "$href",
                            "options" : {
                              "transition" : "replace",
                              "url" : "@endpoint/MiniMappMap/@{{$global.coord}}/@{{$global.username}}"
                             }
                          }

                        }
                        
                        
                      }
                    },
                    "error": {
                      "type": "$util.banner",
                      "options": {
                        "type": "error",
                        "title": "Error de Credenciales",
                        "description": "Usuario o contraseña ingresados incorrectamente."
                      }
                    }
                  }
              },
                      
                {
                  "type": "space"
                }
              ]
            },
            {
              "type": "horizontal",
              "components": [
                {
                  "type": "space"
                },
                {
                  "type": "button",
                  "style": {
                    "width": "100%",
                    "align": "center",
                    "font": "HelveticaNeue-Bold",
                    "size": "12",
                    "padding": "10",
                    "height": "60",
                    "background": "#87b87f",
                    "color": "#ffffff"
                  },
                  "text": "CREAR CUENTA",
                  "action": {
                    "type": "$href",
                    "options": {
                      "url": "@endpoint/MiniMappRegistration"
                    }
                  }
              },
                      
                {
                  "type": "space"
                }
              ]
            }
          ]
        }
      ]
    }
  }
}
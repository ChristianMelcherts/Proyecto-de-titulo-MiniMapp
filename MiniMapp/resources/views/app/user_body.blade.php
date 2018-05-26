  "body": {
      "style": {
        "border": "none",
        "background": "#cccccc"
      },
      "header": {
        "title": "{{$user->nombre}}",
        "style": {
          "color": "#ffffff",
          "background": "#404040"
        }
      },
      "sections": [
        {
          "items": [
                {
                  "type" : "space",
                  "style" : {
                    "padding" : "20"
                  }
                },
                {
                  "type" : "horizontal",
                  "style" : {
                    "background" : "#ffffff",
                    "padding" : "10"
                  },
                  "components" : [
                    {
                      "type" : "image",
                      "url" : "https://raw.githubusercontent.com/ionic-team/ionicons/master/png/512/email.png",
                      "style" : {
                        "width": "30",
                        "height" : "30"
                      }
                    },
                    {
                      "type" : "space",
                      "style" : {
                        "width" : "10"
                      }
                    },
                    {
                      "type" : "label",
                      "text" : "{{$user->correo}}"
                    }
                  ]
                },
                {
                  "type" : "horizontal",
                  "components" : [
                  {
                      "type" : "image",
                      "url" : "https://raw.githubusercontent.com/ionic-team/ionicons/master/png/512/ios7-person.png",
                      "style" : {
                        "width": "30",
                        "height" : "30"
                      }
                    },
                    {
                      "type" : "space",
                      "style" : {
                        "width" : "10"
                      }
                    },
                    {
                      "type" : "label",
                      "text" : "{{$user->login}}"
                    }
                  ]
                },
                {
                  "type" : "space",
                  "style" : {
                    "padding" : "30"
                  }
                },
                {
                  "type" : "horizontal",
                  "components" : [
                    {
                      "type" : "space"
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
                      "text": "CERRAR SESIÓN",
                      "action": {
                        "type": "$href",
                        "options": {
                          "url": "@endpoint/MiniMappIndex",
                          "transition" : "replace"
                        }
                      }
                    },
                    
                    {
                      "type" : "space"
                    }
                  ]
                }
          ]
        }
      ],
      @include('app.includes.footer')
    }
      
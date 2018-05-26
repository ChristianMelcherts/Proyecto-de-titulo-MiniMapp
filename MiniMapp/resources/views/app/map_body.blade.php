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
              "type": "map",
              "region": {
                "coord": "{{$latitude}},{{$longitude}}",
                "width": "1500",
                "height": "1500"
              },
              "pins": [
                @foreach($pins as $pin)
                  {
                    "title": "{{$pin->login}} : {{$pin->nombre}}",
                    "description": "",
                    "coord": "{{$pin->latitud}},{{$pin->longitud}}",
                    "style": {
                      "selected": "false"
                    }
                  }
                  @if(!$loop->last)
                  , {{-- separate array items--}}
                  @endif
                @endforeach
              ],
              "style": {
                "width": "100%",
                "height": "80%"
              }
            }
          ]
        }
      ],
      @include('app.includes.footer')
    }
      
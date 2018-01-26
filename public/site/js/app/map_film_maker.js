

  var filmmakers=[
      {
          profilePic: 'img/profile_pics/1.jpg',
          name: 'Mohamed Samir',
          country: 'Egypt',
          country_code: 'eg'
      },

      {
          profilePic: 'img/profile_pics/2.jpg',
          name: 'Pedro Aurellio',
          country: 'Spain',
          country_code: 'es'
      },

      {
          profilePic: 'img/profile_pics/3.jpg',
          name: 'John Doe',
          country: 'United Kingdom',
          country_code: 'gb'
      },

      {
          profilePic: 'img/profile_pics/4.jpg',
          name: 'Elton Smith',
          country: 'United Kingdom',
          country_code: 'gb'
      },

      {
          profilePic: 'img/profile_pics/5.jpg',
          name: 'Patrik Emanuel',
          country: 'France',
          country_code: 'fr'
      },

      {
          profilePic: 'img/profile_pics/6.jpg',
          name: 'Thierry Lillian',
          country: 'France',
          country_code: 'fr'
      }
  ];
jQuery('#vmap').vectorMap({

    // map: 'world_en',
    // backgroundColor: null,
    // color: '#ffffff',
    // hoverOpacity: 0.7,
    // selectedColor: '#666666',
    // enableZoom: true,
    // showTooltip: true,
    // values: sample_data,
    // scaleColors: ['#C8EEFF', '#006491'],
    // normalizeFunction: 'polynomial',
    map: 'world_en',
    backgroundColor: '#a5bfdd',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    color: '#f4f3f0',
    enableZoom: true,
    hoverColor: '#c9dfaf',
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: null,
    showTooltip: true,


    onRegionClick: function (element, code, region) {


    // var message = 'You clicked "'
    //     + region
    //     + '" which has the code: '
    //     + code;
    //
    //
    // alert(message);
      document.getElementById("profile_list").innerHTML = '';
    for (var i = 0; i < filmmakers.length; i++) {
      if (code == filmmakers[i].country_code) {


         var htmlAppear = `<div class="profilewrapper">  <div class="profile">
              <div class="pic">
                  <div class="img"><img class="profile_img" src="`+ filmmakers[i].profilePic + `"/></div>
                  <i class="icon-plus"></i>
                  <i class="icon-ok"></i>
              </div>
              <h4>`+filmmakers[i].name+`</h4>
              <p>Film Director</p>

          </div> </div>`;
           document.getElementById("profile_list").innerHTML += htmlAppear;

    }

        // document.getElementById("profile_list").innerHTML = htmlAppear;
    }
},

});

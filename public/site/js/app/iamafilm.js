/**
 * Created by Mahmoud El Kotoury on 9/15/2016.
 */


    //bio tab
    $("#bio")
        .mouseover(function() {
            $(this).addClass('mouseover');
        })
        .mouseout(function() {
            $(this).removeClass('mouseover');
        });

    $("#bio").click(function(e) {
        // e.preventDefault(); //prevent the link from actually navigating somewhere
        $(this).addClass("clicked");
        $("#film").removeClass("clicked"); //remove the clicked class from all other elements
        $("#submit_film").removeClass("clicked");
    });



    //film tab
    $("#film")
        .mouseover(function() {
            $(this).addClass('mouseover');
        })
        .mouseout(function() {
            $(this).removeClass('mouseover');
        });

    $("#film").click(function(e) {
        // e.preventDefault(); //prevent the link from actually navigating somewhere
        $(this).addClass("clicked");
        $("#bio").removeClass("clicked"); //remove the clicked class from all other elements
        $("#submit_film").removeClass("clicked"); //remove the clicked class from all other elements


    });

    //submit film tab
    $("#submit_film")
        .mouseover(function() {
            $(this).addClass('mouseover');
        })
        .mouseout(function() {
            $(this).removeClass('mouseover');
        });

    $("#submit_film").click(function(e) {
        // e.preventDefault(); //prevent the link from actually navigating somewhere
        $(this).addClass("clicked");
        $("#film").removeClass("clicked"); //remove the clicked class from all other elements
        $("#bio").removeClass("clicked"); //remove the clicked class from all other elements

    });





      $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
          e.preventDefault();
          $(this).siblings('a.active').removeClass("active");
          $(this).addClass("active");
          var index = $(this).index();
          $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
          $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
      });


      // <!-- about , filmography , contact , awards -->


      //about tab
      // $("#about")
      //     .mouseover(function() {
      //         $(this).addClass('mouseover');
      //     })
      //     .mouseout(function() {
      //         $(this).removeClass('mouseover');
      //     });

      $("#about").click(function(e) {
          // e.preventDefault(); //prevent the link from actually navigating somewhere
          // $(this).addClass("clicked");
          $("#filmography").removeClass("clicked"); //remove the clicked class from all other elements
          $("#contact").removeClass("clicked");
          $("#awards").removeClass("clicked");
          $("#about1").addClass("active");
          $("#filmography1").removeClass("active");
          $("#contact1").removeClass("active");
          $("#awards1").removeClass("active");
          $("#filmography1").addClass("hidden");
          $("#contact1").addClass("hidden");
          $("#awards1").addClass("hidden");
          $("#about1").removeClass("hidden");

      });

      // <!-- about , filmography , contact , awards -->


      //filmography tab
      // $("#filmography")
      //     .mouseover(function() {
      //         $(this).addClass('mouseover');
      //     })
      //     .mouseout(function() {
      //         $(this).removeClass('mouseover');
      //     });

      $("#filmography").click(function(e) {
          // e.preventDefault(); //prevent the link from actually navigating somewhere
          // $(this).addClass("clicked");
          $("#about").removeClass("clicked"); //remove the clicked class from all other elements
          $("#contact").removeClass("clicked");
          $("#awards").removeClass("clicked");
          $("#filmography1").addClass("active");
          $("#about1").removeClass("active");
          $("#contact1").removeClass("active");
          $("#awards1").removeClass("active");
          $("#about1").addClass("hidden");
          $("#contact1").addClass("hidden");
          $("#awards1").addClass("hidden");
          $("#filmography1").removeClass("hidden");


      });

      // <!-- about , filmography , contact , awards -->

      //contact tab
      // $("#contact")
      //     .mouseover(function() {
      //         $(this).addClass('mouseover');
      //     })
      //     .mouseout(function() {
      //         $(this).removeClass('mouseover');
      //     });

      $("#contact").click(function(e) {
          // e.preventDefault(); //prevent the link from actually navigating somewhere
          // $(this).addClass("clicked");
          $("#about").removeClass("clicked"); //remove the clicked class from all other elements
          $("#filmography").removeClass("clicked");
          $("#awards").removeClass("clicked");
          $("#contact1").addClass("active");
          $("#about1").removeClass("active");
          $("#filmography1").removeClass("active");
          $("#awards1").removeClass("active");
          $("#about1").addClass("hidden");
          $("#filmography1").addClass("hidden");
          $("#awards1").addClass("hidden");
          $("#contact1").removeClass("hidden");

      });


      // <!-- about , filmography , contact , awards -->

      //awards tab
      // $("#awards")
      //     .mouseover(function() {
      //         $(this).addClass('mouseover');
      //     })
      //     .mouseout(function() {
      //         $(this).removeClass('mouseover');
      //     });

      $("#awards").click(function(e) {
          // e.preventDefault(); //prevent the link from actually navigating somewhere
          // $(this).addClass("clicked");
          $("#about").removeClass("clicked"); //remove the clicked class from all other elements
          $("#filmography").removeClass("clicked");
          $("#awards").removeClass("clicked");
          $("#awards1").addClass("active");
          $("#about1").removeClass("active");
          $("#filmography1").removeClass("active");
          $("#contact1").removeClass("active");
          $("#about1").addClass("hidden");
          $("#filmography1").addClass("hidden");
          $("#contact1").addClass("hidden");
          $("#awards1").removeClass("hidden");

      });

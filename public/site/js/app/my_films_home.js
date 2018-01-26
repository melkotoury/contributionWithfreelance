var box1=$("#card1").outerHeight();
var box2=$("#card2").outerHeight();
console.log(box1);
console.log(box2);
if(box1>box2){
    $("#card2").outerHeight(box1);
    $("#btn1").css("margin-top",box1-box2);
}else if(box2>box1){
        $("#card1").outerHeight(box2);
            $("#btn1").css("margin-top",box2-box1);

}
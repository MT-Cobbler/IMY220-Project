$(() => {
    personalFeedStuff = document.getElementsByClassName("PostCard");
    let newArray = $(".PostCard");
    $("#globalBtn").on("click", () => {
        $("#personalFeed .PostCard").remove();
        $("#personalFeed").load("globalFeed.php");
    })
    $("#personalFeedBtn").on("click", () => {
        $("#personalFeed").empty();
        $("#personalFeed").append(newArray);
    });
});
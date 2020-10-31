$(() => {
    $("div.col-5.details:even").css("margin-left", "5%");
    $("div.col-5.details:odd").addClass("offset-1");
    $("h3").on("click", function changeContent() {
        let parent = $(this).parent();
        let labelInfo = $(parent).find("label").html();

        let spanValue = $(parent).find("span").html();
        let dataValue = $(parent).find("span").data("value");

        $(parent).find("label, span, h3").remove();
        let newLabel = $("<label></label>", {
            html: "Change " + labelInfo
        });
        let breakLine = $("<br/>");

        let newInput = $("<input/>", {
            type: "text",
            name: dataValue,
            value: spanValue,
            class: "form-control"
        });

        let newButton = $("<h3></h3>", {
            id: "newButton",
            html: "Update",
            class: "btn"
        });
        let newElements = [newLabel, breakLine, newInput, newButton];

        $(parent).append(newElements);

        $("#newButton").on("click", function() {

            let uValue = $(parent).find('input').val();
            $(parent).find("label, h3, br, input").remove();

            let label = $("<label></label>", {
                html: labelInfo
            });
            let span = $("<span></span>", {
                html: uValue,
                data: {
                    value: dataValue
                },
                name: dataValue
            });
            let newestButton = $("<h3></h3>", {
                html: "Edit",
                class: "btn"
            });
            let newestElements = [label, " ", span, breakLine, newestButton];

            let findInput = $("[name =" + dataValue + "]").val(uValue);

            $(parent).append(newestElements);
            $(parent).find("h3").on("click", changeContent);

        });

    });
});
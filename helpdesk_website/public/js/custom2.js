import $ from "jquery";

const clickAlert = () => {
    $("#myButton").click(function () {
        alert("Button clicked!");
    });
};

export default clickAlert;
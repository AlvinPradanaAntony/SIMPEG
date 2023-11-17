/*========== SHOW/HIDE PASSWORD INPUT ==========*/
import $ from "jquery";

const customScript = () => {
    $("#passInput").keyup(function () {
        var inputs = $("#passInput").val();
        $("#spanEye").fadeIn("fast");
        if (inputs == "") {
            $("#spanEye").fadeOut("fast");
            $("#spanEye").removeClass("show");
            $("#spanEye").addClass("hidden");
        } else {
            $("#spanEye").fadeIn("fast");
            $("#spanEye").removeClass("hidden");
            $("#spanEye").addClass("show");
        }
    });
    $(".show-hide").click(function () {
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    const searchInput = $(".form-control");
    const accordionItems = $(".accordion-item");
    const createTicketSection = $(".create-tiket");
    // Tambahkan event listener untuk input pencarian
    searchInput.on("input", function () {
        const searchInputValue = $(this).val().toLowerCase();
        let hasMatch = false;

        // Loop melalui setiap item accordion
        accordionItems.each(function () {
            const accordionBody = $(this).find(".accordion-body");
            const accordionCollapse = $(this).find(".accordion-collapse");
            const accordionButton = $(this).find(".accordion-button");
            const accordionText = accordionBody.text().toLowerCase();

            // Periksa apakah teks pencarian cocok dengan konten item
            if (accordionText.includes(searchInputValue)) {
                $(this).css("display", "block");
                accordionButton.removeClass("collapsed");
                accordionCollapse.addClass("show");
                $(".accordion-item").addClass("accordion-shadow");
                hasMatch = true;
            } else {
                $(this).css("display", "none");
                accordionButton.addClass("collapsed");
                accordionCollapse.removeClass("show");
            }
        });

        // Jika tidak ada kecocokan, tampilkan elemen alternatif
        if (!hasMatch) {
            $(".faq-content").removeClass("py-5");
            createTicketSection.css("display", "block");
            createTicketSection.css("padding-top", "6rem");
            createTicketSection[0].scrollIntoView({ behavior: "smooth" });
        } else {
            $(".faq-content").addClass("py-5");
            createTicketSection.css("display", "none");
        }

        // Jika input pencarian kosong, atur kembali tampilan semua item accordion
        if (searchInputValue === "") {
            accordionItems.find(".accordion-button").addClass("collapsed");
            accordionItems.find(".accordion-collapse").removeClass("show");
            $(".accordion-item").removeClass("accordion-shadow");
        }
    });
    $(".accordion-button").click(function () {
        if ($(this).hasClass("collapsed")) {
            $(this).closest(".accordion-item").removeClass("accordion-shadow");
        } else {
            $(this).closest(".accordion-item").addClass("accordion-shadow");
            $(".accordion-item")
                .not($(this).closest(".accordion-item"))
                .removeClass("accordion-shadow");
        }
    });
};

export default customScript;

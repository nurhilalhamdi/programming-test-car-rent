window.selectCar = function () {
    const idCarInput = document.getElementById("id_car");
    document.querySelectorAll("tr").forEach((item, index) => {
        item.addEventListener("click", function () {
            // Remove border from all table rows
            document.querySelectorAll("tr").forEach((otherItem) => {
                otherItem.classList.remove(
                    "bg-gray-200",
                    "ring-black",
                    "rounded-xl",
                    "hover:rounded-xl"
                );
            });
            // Add border to the clicked row
            item.classList.add(
                "bg-gray-200",
                "ring-black",
                "rounded-xl",
                "hover:rounded-xl"
            );
            idCarInput.value = item.dataset.carId;
        });
    });
};
